<?php 
// src/WKT/UserBundle/Controller/UserController.php

namespace WKT\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\Training;
use WKT\UserBundle\Entity\User;
use WKT\UserBundle\Entity\UserArticleRead;
use WKT\UserBundle\Entity\UserTraining;
use WKT\UserBundle\Repository\UserRepository;


class UserController extends Controller
{
	public function promoteUserAction(Request $request, User $id)
	{
		$em = $this->getDoctrine()->getManager();
		$user = $this->getDoctrine()->getRepository("WKTUserBundle:User")->find($id);
		$user->addRole("ROLE_ADMIN");
		$em->persist($user);
		$em->flush();

		$request->getSession()->getFlashBag()->add('notice', 'L\'utilisateur' . $user->getUsername() . ' a bien été promu 🤠');

		return $this->redirectToRoute('wkt_user_index');
	}

	public function demoteUserAction(Request $request, User $id)
	{
		$em = $this->getDoctrine()->getManager();
		$user = $this->getDoctrine()->getRepository("WKTUserBundle:User")->find($id);
		$user->removeRole("ROLE_ADMIN");
		$user->addRole("");
		$em->persist($user);
		$em->flush();

		$request->getSession()->getFlashBag()->add('notice', 'L\'utilisateur' . $user->getUsername() . ' a bien été retrogradé 😡');

		return $this->redirectToRoute('wkt_user_index');
	}

	public function enabledUserAction(Request $request, User $id, int $activate)
	{
		$em = $this->getDoctrine()->getManager();
		$user = $this->getDoctrine()->getRepository("WKTUserBundle:User")->find($id);
		if ($activate === 0) {
			$user->setEnabled(false);
			$request->getSession()->getFlashBag()->add('notice', 'L\'utilisateur' . $user->getUsername() . ' a bien été désactivé 😈');
		}else{
			$user->setEnabled(true);
			$request->getSession()->getFlashBag()->add('notice', 'L\'utilisateur' . $user->getUsername() . ' a bien été activé 🤓');
		}

		$em->persist($user);
		$em->flush();

		return $this->redirectToRoute('wkt_user_index');
	}


	public function indexAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		$users = $em->getRepository('WKTUserBundle:User')->findAll();

		// on crée un tableau contenant tous les users 
		// puis on calcul le confidence Score pour chacun
		$confidenceScores = [];
		foreach ($users as $user) {
			if (!array_key_exists($user->getUsername(), $confidenceScores)) {
				$confidenceScores[$user->getUsername()] = $this->container->get('wkt_user.confidence_score')->getConfidenceScore($user);
			}
		}

		return $this->render('WKTUserBundle:User:user.html.twig', array(
			'users' => $users,
			'confidenceScores' => $confidenceScores));
	}

	public function viewProfileAction(Request $request, User $id)
	{
		$em = $this->getDoctrine()->getManager();
		$user = $em->getRepository('WKTUserBundle:User')->find($id);

		// on récupère ses liens
		$links = $em->getRepository('WKTUserBundle:Link')->findBy(array('user' => $user));

		// on récupère les points de contributions par formation du user
		$contributionScoreByTraining = $this->container->get('wkt_user.confidence_score')->getContributionScoreByUserAndByTraining($user);

		return $this->render('WKTUserBundle:User:viewProfile.html.twig', array(
			'user' => $user,
			'links' => $links,
			'score' => $contributionScoreByTraining));
	}

	public function cancelIsReadAction(Request $request, Article $id)
	{
		$em = $this->getDoctrine()->getManager();

		$user = $this->getUser();
		$article = $em->getRepository('WKTPlatformBundle:Article')->find($id);
		$training = $article->getPart()->getTraining();

		if (!is_null($article)) {
			//On verifie qu'il existe un userArticleRead
			// si oui on change la valeur de l'attribut updated
			$userArticleRead = $em->getRepository('WKTUserBundle:UserArticleRead')->getUserArticleReadByUserAndArticle($user, $article);

			//on verifie que le userArticleRead existe
			//pour le supprimer
			//sinon on retourne sur la page de la formation
			//avec un message d'erreur
			if (is_null($userArticleRead)) {
				$request->getSession()->getFlashBag()->add('alert', 'Ooops il y a un bug dans la matrice !! 🤔' );
				return $this->redirectToRoute('wkt_platform_view', array('id'=> $training->getId(), 'slugTraining'=> $training->getSlug()));
			}else{
				$em->remove($userArticleRead);
				$userTraining = $em->getRepository('WKTUserBundle:UserTraining')->getUserTrainingByUserAndTraining($user,$training);
				if ($userTraining->getFinished()) {
					$userTraining->setFinished(false);
				}
				$userArticleReads = $this->container->get('wkt_user.training_is_finished')->getArticlesRead($userTraining);
				if (sizeof($userArticleReads) === 1) {
					$em->remove($userTraining);
				}
				$em->flush();

				$request->getSession()->getFlashBag()->add('notice', 'Cet article est de nouveau non-validé ! 🤓' );

				return $this->redirectToRoute('wkt_platform_article_view', array('id' => $article->getId(), 'slugTraining' => $training->getSlug(), 'slugArticle' => $article->getSlug()));
			}
		}
	}

	public function articleIsReadAction(Request $request, Article $id)
	{
		$em = $this->getDoctrine()->getManager();

		$user = $this->getUser();
		$article = $em->getRepository('WKTPlatformBundle:Article')->find($id);
		$training = $article->getPart()->getTraining();

		if (!is_null($article)) {
			//On verifie qu'il existe un userArticleRead
			// si oui on change la valeur de l'attribut updated
			$userArticleRead = $em->getRepository('WKTUserBundle:UserArticleRead')->getUserArticleReadByUserAndArticle($user, $article);

			if (is_null($userArticleRead)) {
				$userArticleRead = new UserArticleRead();
				$userArticleRead->setUser($user)->setArticle($article);
				$em->persist($userArticleRead);
			}else{
				$userArticleRead->setUpdated(false);
			}

			$userTraining = $em->getRepository('WKTUserBundle:UserTraining')->getUserTrainingByUserAndTraining($user, $training);
			if (is_null($userTraining)) {
				$userTraining = new UserTraining;
				$userTraining->setUser($user)->setTraining($training);
				$user->addUserTraining($userTraining);
			}else{
				$userTraining->setUpdated(false);
			}
			$em->persist($userTraining);
			$em->flush();			

			// On verifie si la formation est terminée
			// et on retourne la bonne page
			return $this->returnAfterValidation($request, $training, $article, $user);

		}
		$request->getSession()->getFlashBag()->add('alert', 'Aïe ! Aïe ! Quelque chose c\'est mal passé 😳 Peut-être qu\'une nouvelle page a été rajoutée dans la formation. N\'hésitez pas à retourner voir 😁' );
		return $this->redirectToRoute('wkt_core_home');

	}

	//factorisation fonction qui return sur la bonne page avec le bon message
	private function returnAfterValidation(Request $request, Training $training, Article $article, User $user)
	{
		$em = $this->getDoctrine()->getManager();
		$userTraining =  $em->getRepository('WKTUserBundle:UserTraining')->getUserTrainingByUserAndTraining($user, $training);
		//On verifie si la formation est terminée
		$testTraningIsFinished = $this->container->get('wkt_user.training_is_finished')->checkTrainingIsFinished($userTraining);


		$request->getSession()->getFlashBag()->add('notice', 'Et une page de terminée 🤓');
		$articles = $this->container->get('wkt_platform.summary')->getArticlesByTraining($training);
		$key = array_search($article, $articles);
		$nextKey = $key + 1;
		if ($testTraningIsFinished === false) {
			$userTraining->setFinished(true);
			$em->persist($userTraining);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Bravo !! 👏🎉 Vous avez terminé la formation ' . $training->getTitle() . '. Vous pouvez dés maintenant en commencer une nouvelle 😁');
			return $this->redirectToRoute('wkt_core_home');
		}else{
			if (isset($articles[$nextKey]) && in_array($articles[$nextKey], $testTraningIsFinished)) {
				return $this->redirectToRoute('wkt_platform_article_view', array('id' => $articles[$nextKey]->getId(), 'slugTraining' => $articles[$nextKey]->getPart()->getTraining()->getSlug(), 'slugArticle' => $articles[$nextKey]->getSlug()));
			}else{
				return $this->redirectToRoute('wkt_platform_article_view', array('id' => $testTraningIsFinished[0]->getId(), 'slugTraining' => $training->getSlug(), 'slugArticle' => $testTraningIsFinished[0]->getSlug()));
			}
		}
	}
}
