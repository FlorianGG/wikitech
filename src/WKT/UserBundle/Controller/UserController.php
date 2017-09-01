<?php 
// src/WKT/UserBundle/Controller/UserController.php

namespace WKT\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WKT\PlatformBundle\Entity\Article;
use WKT\UserBundle\Entity\User;
use WKT\UserBundle\Entity\UserArticleRead;
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

		return $this->render('WKTUserBundle:User:viewProfile.html.twig', array(
			'user' => $user,));
	}

	public function articleIsReadAction(Request $request, Article $id)
	{
		$em = $this->getDoctrine()->getManager();

		$user = $this->getUser();
		$article = $em->getRepository('WKTPlatformBundle:Article')->find($id);

		if (!is_null($article)) {
			$userArticleRead = new UserArticleRead();
			$userArticleRead->setUser($user)->setArticle($article);
			$em->persist($userArticleRead);
			$em->flush();
			$trainingId = $article->getPart()->getTraining();
			$articles = $this->container->get('wkt_platform.summary')->getArticlesByTraining($trainingId);
			$key = array_search($article, $articles);
			$nextKey = $key + 1;
			$testTrainingIsNotFinished = $this->container->get('wkt_user.training_is_finished')->getTrainingIsNotFinished($user, $trainingId);

			//On verifie si la formation est terminée
			if (!$testTrainingIsNotFinished) {
				$request->getSession()->getFlashBag()->add('notice', 'Bravo !! 👏🎉 Vous avez terminé la formation ' . $trainingId->getTitle() . '. Vous pouvez dés maintenant en commencer une nouvelle 😁');
				return $this->redirectToRoute('wkt_platform_index');
			}else{
				$request->getSession()->getFlashBag()->add('notice', 'Et une page de terminée 🤓');
				return $this->redirectToRoute('wkt_platform_article_view', array('id' => $testTrainingIsNotFinished->getId(), 'slugTraining' => $trainingId->getSlug(), 'slugArticle' => $testTrainingIsNotFinished->getSlug()));
			}
			$request->getSession()->getFlashBag()->add('notice', 'Et une page de terminée 🤓');
			if (array_key_exists($nextKey, $articles)) {
				return $this->redirectToRoute('wkt_platform_article_view', array('id' => $articles[$nextKey]->getId(), 'slugTraining' => $articles[$nextKey]->getPart()->getTraining()->getSlug(), 'slugArticle' => $articles[$nextKey]->getSlug()));
			}

		}
		$request->getSession()->getFlashBag()->add('alert', 'Aïe ! Aïe ! Quelque chose c\'est mal passé 😳 Peut-être qu\'une nouvelle page a été rajoutée dans la formation. N\'hésitez pas à retourner voir 😁' );
		return $this->redirectToRoute('wkt_platform_index');

	}

}
