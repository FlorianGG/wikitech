<?php 
// src/WKT/PlatformBundle/Controller/ArticleModifiedController.php

namespace WKT\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\ArticleModified;
use WKT\PlatformBundle\Entity\Training;
use WKT\PlatformBundle\Entity\Video;
use WKT\PlatformBundle\Form\ArticleModifiedType;


class ArticleModifiedController extends Controller
{

	public function indexAction(Request $request)
	{
		
	}

	public function indexByArticleAction(Request $request, Article $id)
	{
		
	}

	public function viewAction(Request $request, ArticleModified $id)
	{
		$em = $this->getDoctrine()->getManager();

		$articleModified = $em->getRepository('WKTPlatformBundle:ArticleModified')->find($id);

		//on explode le commit de l'articleModified pour en tirer un tableau
		$commits = $this->returnCommitsInArray($articleModified->getCommit());

		$articlesModified = $em->getRepository('WKTPlatformBundle:ArticleModified')->findBy(array('article' => $articleModified->getArticle()), array('id' => 'DESC'));

		return $this->render('WKTPlatformBundle:ArticleModified:view.html.twig', array(
			'articleModified' => $articleModified,
			'articlesModified' => $articlesModified,
			'commits' => $commits,
			));
	}

	public function addAction(Request $request, Article $id)
	{
		$em = $this->getDoctrine()->getManager();

		$articleModified = new ArticleModified();

		
		$article = $em->getRepository('WKTPlatformBundle:Article')->find($id);

		$articleModified->setArticle($id)->setTitle($article->getTitle())->setIntroduction($article->getIntroduction())->setContent($article->getContent())->setUser($this->getUser());
		if (!is_null($article->getVideo())) {
			$video = new Video;
			$video->setUrl('https://www.youtube.com/watch?v=' . $article->getVideo()->getUrl())->setAuthor($article->getVideo()->getAuthor());
			$articleModified->setVideo($video);
		}

		//on capture les données originales pour les comparer avec celles qui seront postées
		$origin = $this->getValues($articleModified);

		$articlesModified = $articlesModified = $this->returnArticlesModifiedArray($articleModified);
		
		$form   = $this->get('form.factory')->create(ArticleModifiedType::class, $articleModified);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			if (is_null($articleModified->getCommit())) {
				$articleModified->setCommit('L\'utilisateur n\'a pas donné d\'explication');
			}
			//On récupère les nouvelles valeurs d'articleModified
			$new = $this->getValues($articleModified);

			// On ajout le nouveau commit à l'ancien avec une chaine permettant d'explode le commit
			if ($this->checkValues($origin, $new)) {
				$request->getSession()->getFlashBag()->add('alert', 'Votre nouvelle modification n\'a pas été prise en compte car aucun des champs n\'a été modifié');

				return $this->redirectToRoute('wkt_platform_article_view', array('id' => $article->getId(), 'slugTraining' => $article->getPart()->getTraining()->getSlug(), 'slugArticle' => $article->getSlug()));
			}
			$article->setIsModifying(true);

			$em = $this->getDoctrine()->getManager();
			$em->persist($articleModified);
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

		//on stock le commit  qui est en bd avant le post
		$commit = $articleModified->getCommit();

		//on explode le commit pour en tirer un tableau
		$commits = $this->returnCommitsInArray($commit);

		//on capture les données originales pour les comparer avec celles qui seront postées
		$origin = $this->getValues($articleModified);


		//On récupère la liste des articlesModified pour cet article
		$articlesModified = $this->returnArticlesModifiedArray($articleModified);

		$form   = $this->get('form.factory')->create(ArticleModifiedType::class, $articleModified);

		//Possibilité de garder l'ancien commit et d'ajouter un nouveau lors de la modification de l'articleModified


		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

			// On ajout le nouveau commit à l'ancien avec une chaine permettant d'explode le commit
			$articleModified->setCommit($commit . '/n Edit :' . $articleModified->getCommit());

			//On récupère les nouvelles valeurs d'articleModified
			$new = $this->getValues($articleModified);

			// On ajout le nouveau commit à l'ancien avec une chaine permettant d'explode le commit
			if ($this->checkValues($origin, $new)) {
				$request->getSession()->getFlashBag()->add('alert', 'Votre modification n\'a pas été prise en compte car aucun des champs n\'a été modifié');

				return $this->redirectToRoute('wkt_platform_article_modified_view', array('id' => $articleModified->getId()));
			}
			$articleModified->setModifiedAt(new \Datetime);
			$em = $this->getDoctrine()->getManager();
			$em->persist($articleModified);
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
		if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
		  // Sinon on déclenche une exception « Accès interdit »
		  throw new AccessDeniedException('Accès limité aux utilisateurs connectés.');
		}

		$em = $this->getDoctrine()->getManager();
		$articleModified = new ArticleModified();
		$summary = $this->container->get('wkt_platform.summary')->returnSummaryInArray($id);
		$training = $em->getRepository('WKTPlatformBundle:Training')->find($id);
		$typeOfModification = $em->getRepository('WKTPlatformBundle:TypeOfModification')->findOneBy(array('type' => 'Création page'));

		$articleModified->setTypeOfModification($typeOfModification)->setUser($this->getUser());
		
		$form = $this->container->get('wkt_platform.generate_form')->generateFormArticleModified($articleModified, $id);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$em->persist($articleModified);
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

	private function returnAlertInEdit(Request $request, $id)
	{
		$request->getSession()->getFlashBag()->add('alert', 'Votre modification n\'a pas été prise en compte car aucun des champs n\'a été modifiée');

		return $this->redirectToRoute('wkt_platform_article_modified_view', array('id' => $id));
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
	private function returnArticlesModifiedArray(ArticleModified $aM)
	{
		//On récupère la liste des articlesModified pour cet article
		return $this->getDoctrine()->getManager()->getRepository('WKTPlatformBundle:ArticleModified')->findBy(array('article' => $aM->getArticle()), array('id' => 'DESC'));
	}

	//factorisation de la fonction qui génére un tableau de commits avec explode du commit en bd
	private function returnCommitsInArray($commit)
	{
		if (!is_null($commit)) {
			return explode('/n Edit :', $commit);
		}else{
			return null;
		}
	}


}
