<?php 
// src/WKT/PlatformBundle/Controller/ArticleModifiedController.php

namespace WKT\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;
use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\ArticleModified;
use WKT\PlatformBundle\Entity\Commit;
use WKT\PlatformBundle\Entity\Training;
use WKT\PlatformBundle\Entity\Video;
use WKT\PlatformBundle\Form\Type\ArticleModifiedType;



class ArticleModifiedController extends Controller
{

	public function viewAction(Request $request, ArticleModified $id)
	{
		$em = $this->getDoctrine()->getManager();

		$articleModified = $em->getRepository('WKTPlatformBundle:ArticleModified')->find($id);

		//on récupère la liste des articlesModified pour la même page article
		$articlesModified = $this->returnArticlesModifiedArray($articleModified);

		//on récupère la liste des commits pour cet articleModified
		$commits = $this->returnCommits($articleModified);


		return $this->render('WKTPlatformBundle:ArticleModified:view.html.twig', array(
			'articleModified' => $articleModified,
			'articlesModified' => $articlesModified,
			'commits' => $commits,
			));
	}

	//fonction qui valide un articleModified et le converti en article
	// Peut également passer en Enabled une Part crée par un user
	// Converti le statut du commit en true
	// attribue des points au user
	public function validationAction(Request $request, ArticleModified $id)
	{
		$em = $this->getDoctrine()->getManager();

		$articleModified = $em->getRepository('WKTPlatformBundle:ArticleModified')->find($id);
		if (is_null($articleModified->getArticle())) {
			$article = new Article;
		}else{
			$article = $em->getRepository('WKTPlatformBundle:Article')->find($articleModified->getArticle()->getId());
		}
		
		$article
			->setTitle($articleModified->getTitle())
			->setIntroduction($articleModified->getIntroduction())
			->setContent($articleModified->getContent())
			->setModifiedAt(new \DateTime)
			->setOrderInPart($articleModified->getOrderInPart())
			->setPart($articleModified->getPart());
		//on récupère la liste des commits pour cet articleModified
		$commits = $this->returnCommits($articleModified);

		//on récupère le sommaire de la formation
		$trainingId = $articleModified->getPart()->getTraining();
		$summary = $this->container->get('wkt_platform.summary')->returnSummaryInArray($trainingId);

		if (end($commits)->getTypeOfModification()->getType() == 'Création page') {
			$form = $this->container->get('wkt_platform.generate_form')->generateFormArticleValidation($article, $trainingId);
		}else{
			$form = $this->container->get('wkt_platform.generate_form')->generateFormArticleValidationWithoutPart($article, $trainingId);
		}
		

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

			//on vérifie si la partie de l'article a un status IsEnabled true sinon on l'active
			if (!$article->getPart()->getIsEnabled()) {
				$article->getPart()->setIsEnabled(true);
			}

			// on change dans l'article le statut IsModifying à false
			$article->setIsModifying(false);

			// on change le statut IsValidate pour le commit
			$commits[0]->setIsValidate(true);

			$UserTrainingArticleService = $this->container->get('wkt_user.user_training_article_updated');

			if (!is_null($article->getId())) {
				// on change modified de tous les UserArticleRead  de cet article à true
				$UserTrainingArticleService->changeAttributeUpdated($article, true);
			}
			
			// on change finished de tous les UserTraining de cet article à false
			$UserTrainingArticleService->changeAttributeFinished($trainingId);
			//on change updated de tous les UserTraining liés à cet article
			$UserTrainingArticleService->changeAttributeUpdatedinUserTraining($training);

			
			if (!is_null($commits[0]->getUser())) {
				//on attribut les points du dernier commit de l'articleModified à son User
				$user = $commits[0]->getUser();
				$multiplicateur = $form->get('coefScore')->getData();
				$score = $user->getNbPoint() + ( $commits[0]->getScore() * $multiplicateur );
				$user->setNbPoint($score);
				$em->persist($user);
			}
			$em->persist($commits[0]);
			$em->persist($article);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Le nouvel article a bien remplacé l\'ancien 😄');

			return $this->redirectToRoute('wkt_platform_commit_index');
		}


		return $this->render('WKTPlatformBundle:ArticleModified:validation.html.twig', array(
			'form' => $form->createView(),
			'articleModified' => $articleModified,
			'commits' => $commits,
			'summary' => $summary,
			'training' => $trainingId,
			));
	}

	public function rejectionAction(Request $request, ArticleModified $id, $strike)
	{
		$em = $this->getDoctrine()->getManager();

		$repoArticleModified = $em->getRepository('WKTPlatformBundle:ArticleModified');

		$articleModified = $repoArticleModified->find($id);

		// on verifie s'il y a d'autres articleModified pour cette l'article
		// sinon on change le status IsModifying à false
		if (!is_null($articleModified->getArticle())) {
			$articlesModified = $repoArticleModified->findBy(array('article' => $articleModified->getArticle()));
			if (sizeof($articlesModified) === 1 && $articlesModified[0]->getId() === $articleModified->getId()) {
				$article = $articleModified->getArticle();
				$article->setIsModifying(false);
				$em->persist($article);
			}
		}

		//on récupère la liste des commits pour cet articleModified
		$commits = $this->returnCommits($articleModified);

		// on change le status isValidate du dernier commit à false
		$commits[0]->setIsValidate(false);

		//si le paramètre url strike est renseigné on ajoute 1 au champ nbStrike du user
		if ($strike) {
			if (!is_null($commits[0]->getUser())) {
				$user = $commits[0]->getUser();
				$user->setNbStrike($user->getNbStrike() + 1);
				$em->persist($user);
			}
		}

		// on change le status isRejected de l'articleModified à true
		$articleModified->setIsRejected(true);

		$em->persist($articleModified);
		$em->persist($commits[0]);
		$em->flush();

		$request->getSession()->getFlashBag()->add('notice', 'La contribution a bien été refusée 🤔');

		return $this->redirectToRoute('wkt_platform_commit_index');
	}

	public function addAction(Request $request, Article $id)
	{
		$em = $this->getDoctrine()->getManager();

		$articleModified = new ArticleModified();

		$article = $em->getRepository('WKTPlatformBundle:Article')->find($id);

		// on set les attributs de articleModified avec le contenu de l'article
		$articleModified->setArticle($id)->setTitle($article->getTitle())->setIntroduction(strip_tags($article->getIntroduction()))->setContent($article->getContent())->setUser($this->getUser())->setPart($article->getPart())->setOrderInPart($article->getOrderInPart());

		if (!is_null($article->getVideo())) {
			$video = new Video;
			$video->setUrl('https://www.youtube.com/watch?v=' . $article->getVideo()->getUrl())->setAuthor($article->getVideo()->getAuthor());
			$articleModified->setVideo($video);
		}

		//On récupère la liste des articlesModified pour cet article
		$articlesModified = $this->returnArticlesModifiedArray($articleModified);

		//on capture les données originales pour les comparer avec celles qui seront postées
		$origin = $this->getValues($articleModified);
		
		$form   = $this->get('form.factory')->create(ArticleModifiedType::class, $articleModified);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

			//On récupère les nouvelles valeurs d'articleModified
			$new = $this->getValues($articleModified);

			// on verifie qu'il y a bien eu des modifications effectuées sinon on renvoi un message d'erreur
			if ($this->checkValues($origin, $new)) {
				$request->getSession()->getFlashBag()->add('alert', 'Votre nouvelle modification n\'a pas été prise en compte car aucun des champs n\'a été modifié');

				return $this->redirectToRoute('wkt_platform_article_view', array('id' => $article->getId(), 'slugTraining' => $article->getPart()->getTraining()->getSlug(), 'slugArticle' => $article->getSlug()));
			}

			// On crée le commit relatif à cette création de modification
			$commit = $this->createCommit($articleModified, $form);

			// on change dans l'article le statut IsModifying à true
			$article->setIsModifying(true);

			$em = $this->getDoctrine()->getManager();
			$em->persist($articleModified);
			$em->persist($commit);
			$em->persist($article);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Votre modification a été enregistrée');

			return $this->redirectToRoute('wkt_platform_article_modified_view', array('id' => $articleModified->getId()));
		}

		  return $this->render('WKTPlatformBundle:ArticleModified:add.html.twig', array(
		    'form' => $form->createView(),
		    'articleModified' => $articleModified,
		    'articlesModified' => $articlesModified,
		  ));
	}

	public function editAction(Request $request, ArticleModified $id)
	{
		$em = $this->getDoctrine()->getManager();

		$articleModified = $em->getRepository('WKTPlatformBundle:ArticleModified')->find($id);
		$articleModified->setIntroduction(strip_tags($articleModified->getIntroduction()));

		//on récupère la liste des articlesModified pour la même page article
		$articlesModified = $this->returnArticlesModifiedArray($articleModified);

		//on récupère la liste des commits pour cet articleModified
		$commits = $this->returnCommits($articleModified);
		
		//on capture les données originales pour les comparer avec celles qui seront postées
		$origin = $this->getValues($articleModified);

		$form  = $this->get('form.factory')->create(ArticleModifiedType::class, $articleModified);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			//On récupère les nouvelles valeurs d'articleModified
			$new = $this->getValues($articleModified);

			// On ajout le nouveau commit à l'ancien avec une chaine permettant d'explode le commit
			if ($this->checkValues($origin, $new)) {
				$request->getSession()->getFlashBag()->add('alert', 'Votre modification n\'a pas été prise en compte car aucun des champs n\'a été modifié');

				return $this->redirectToRoute('wkt_platform_article_modified_view', array('id' => $articleModified->getId()));
			}

			// On crée le commit relatif à cette modification
			$commit = $this->createCommit($articleModified, $form);

			//On valide le précédent commit
			// car on part du principe qu'une modification modifiée 
			// est considérée comme présentant de l'intérêt
			$commits[0]->setIsValidate(true);

			//on attribut la moitié des points au user qui a créer la modification qui n'est pas une création de page
			// si ce n'est pas celui qui crée la nouvelle
			if ($commit->getTypeOfModification()->getType() !== 'Création page' && !is_null($commits[0]->getUser())) {
				$user = $commits[0]->getUser();
				if ($user != $this->getUser()) {
					$score = $user->getNbPoint() + ceil(($commits[0]->getScore())/2);
					$user->setNbPoint($score);
				}

				$em->persist($user);
			}
			
			$articleModified->setModifiedAt(new \Datetime);
			$em->persist($articleModified);
			$em->persist($commits[0]);
			$em->persist($commit);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Votre modification a été enregistrée');

			return $this->redirectToRoute('wkt_platform_article_modified_view', array('id' => $articleModified->getId()));

		}
		return $this->render('WKTPlatformBundle:ArticleModified:edit.html.twig', array(
			'form' => $form->createView(),
			'articleModified' => $articleModified,
			'articlesModified' => $articlesModified,
			'commits' => $commits,
		));


	}

	//function qui permet à l'utilisateur de créer une nouvelle page
	public function addNewArticleAction(Request $request, Training $id)
	{
		$em = $this->getDoctrine()->getManager();

		$articleModified = new ArticleModified();

		$summary = $this->container->get('wkt_platform.summary')->returnSummaryInArray($id);
		$training = $em->getRepository('WKTPlatformBundle:Training')->find($id);
		$typeOfModification = $em->getRepository('WKTPlatformBundle:TypeOfModification')->findOneBy(array('type' => 'Création page'));

		$articleModified->setUser($this->getUser());
		
		$form = $this->container->get('wkt_platform.generate_form')->generateFormArticleModified($articleModified, $id);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			// on appelle le service qui s'occupe du score et la fonction qui va le générer

			$score = $this->container->get('wkt_platform.score')->getScore($articleModified);
			
			//création du commit associé à la création de page
			$commit = new Commit();
			$commit
				->setContent(null)
				->setTypeOfModification($typeOfModification)
				->setUser($this->getUser())
				->setArticleModified($articleModified)
				->setScore($score);

			$em->persist($articleModified);
			$em->persist($commit);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Merci pour votre contribution 🤗 . Votre proposition de page a bien été enregistrée. Elle sera visible après validation par WikiTech');

			return $this->redirectToRoute('wkt_platform_view', array('id' => $training->getId(), 'slugTraining' => $training->getSlug()));
		}

	  return $this->render('WKTPlatformBundle:ArticleModified:addNewArticle.html.twig', array(
	    'form' => $form->createView(),
	    'training' => $id,
	    'summary' => $summary,
	  ));
	}


	public function deleteAction(Request $request, ArticleModified $id)
	{
		
	}

	//fonction getValues qui permet de récupérer le contenu de l'entité en objet
	private function getValues($item)
	{
		$orignal = [];

		$orignal['title'] = $item->getTitle();
		$orignal['introduction'] = $item->getIntroduction();
		$orignal['content'] = $item->getContent();
		if (!is_null($item->getVideo())) {
			$orignal['video'] = 'url:' . $item->getVideo()->getUrl() . ', author:' . $item->getVideo()->getAuthor();
		}else{
			$orignal['video'] = null;
		}

		return $orignal;
	}

	//fonction checkValues qui permet la factorisation de la fonctionnalité check avant et après
	// pour éviter des ajouts ou des modifications sans changement
	private function checkValues(array $origin, array $new)
	{
		if ($origin['title'] === $new['title'] && $origin['content'] === $new['content'] && $origin['introduction'] === $new['introduction'] && $origin['video'] === $new['video']) {

			return true;
		}
	}

	//factorisation de la fonction qui récupère tous les articlesModified d'un article
	private function returnArticlesModifiedArray(ArticleModified $articleModified)
	{
		//On récupère la liste des articlesModified pour cet article
		if (!is_null($articleModified->getArticle())) {
			return $this->getDoctrine()->getManager()->getRepository('WKTPlatformBundle:ArticleModified')->getArticlesModifiedNotRejectedByArticle($articleModified->getArticle());
		}
		
	}

	//factorisation de la fonction qui génére un tableau de commits avec explode du commit en bd
	private function returnCommits($articleModified)
	{
		//On récupère la liste des commits pour cet articleModified
		return $this->getDoctrine()->getManager()->getRepository('WKTPlatformBundle:Commit')->findBy(array('articleModified' => $articleModified), array('id' => 'DESC'));
	}

	//factorisation de la fonction qui crée à nouveau commit avec le CommitEntity mapped false
	private function createCommit(ArticleModified $articleModified, Form $form)
	{
		$formCommit = $form->get('commit')->getData();

		$commit = new Commit();
		$commit
			->setUser($this->getUser())
			->setArticleModified($articleModified)
			->setTypeOfModification($formCommit->getTypeOfModification())
			->setScore($formCommit->getTypeOfModification()->getValue());

		if (is_null($formCommit->getContent())) {
			$commit->setContent('L\'utilisateur n\'a pas donné d\'explication');
		}else{
			$commit->setContent($formCommit->getContent()); 
		}

		return $commit;

	}

}
