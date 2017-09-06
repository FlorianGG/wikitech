<?php 
// src/WKT/PlatformBundle/Controller/ArticleController.php

namespace WKT\PlatformBundle\Controller;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\Training;
use WKT\PlatformBundle\Repository\PartRepository;



class ArticleController extends Controller
{
	public function indexAction()
	{

	}

	public function viewAction(Article $id)
	{
		$em = $this->getDoctrine()->getManager();
		$articleRepository = $em->getRepository('WKTPlatformBundle:Article');
		$article = $articleRepository->find($id);


		$idArticleModified = $em->getRepository('WKTPlatformBundle:ArticleModified')->findOneBy(array(
			'article' => $article));
		if (!is_null($idArticleModified)) {
			$idArticleModified = $idArticleModified->getId();
		}else{
			$idArticleModified = 0;
			//on change la valeur de l'attribut à false
			// Pour couvrir le cas ou il y a eu une modification et qu'elle a été supprimé par l'admin
			$article->setIsModifying(false);
		}
		//on récupère l'article précédent et l'article suivant
		$articlePreviousAndFollowing = $this->container->get('wkt_platform.summary')->getFollowingAndPreviousArticle($article);

		//on vérifie si l'article est déjà validé ou pas
		$user = $this->getUser();
		if (!is_null($user)) {
			$articleIfValidate = $em->getRepository('WKTUserBundle:UserArticleRead')->getUserArticleReadByUserAndArticle($user, $article);
		}else{
			$articleIfValidate = null;
		}
		

		return $this->render('WKTPlatformBundle:Article:view.html.twig', array(
			'article' => $article,
			'idArticleModified' => $idArticleModified,
			'articlePreviousAndFollowing' => $articlePreviousAndFollowing,
			'articleIfValidate' => $articleIfValidate,
			));
	}

	public function addAction(Request $request, Training $training)
	{
		$article = new Article();
		$summary = $this->container->get('wkt_platform.summary')->returnSummaryInArray($training);
		
		$form = $this->container->get('wkt_platform.generate_form')->generateFormArticle($article, $training);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($article);
			$em->flush();

			$UserTrainingArticleService = $this->container->get('wkt_user.user_training_article_updated');
			// on change finished de tous les UserTraining de cet article à false
			$UserTrainingArticleService->changeAttributeFinished($training);
			//on change updated de tous les UserTraining liés à cet article
			$UserTrainingArticleService->changeAttributeUpdatedinUserTraining($training);

			$request->getSession()->getFlashBag()->add('notice', 'Article bien enregistré.');

			return $this->redirectToRoute('wkt_platform_article_view', array('id' => $article->getId(), 'slugTraining' => $article->getPart()->getTraining()->getSlug(), 'slugArticle' => $article->getSlug()));
		}

	  return $this->render('WKTPlatformBundle:Article:add.html.twig', array(
	    'form' => $form->createView(),
	    'training' => $training,
	    'summary' => $summary,
	  ));
	}

	public function editAction(Request $request, Article $id)
	{
		$em = $this->getDoctrine()->getManager();
		$articleRepository = $em->getRepository('WKTPlatformBundle:Article');
		$article = $articleRepository->find($id);
		$training = $article->getPart()->getTraining();
		$summary = $this->container->get('wkt_platform.summary')->returnSummaryInArray($training);
		
		$form = $this->container->get('wkt_platform.generate_form')->generateFormArticle($article, $training);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$UserTrainingArticleService = $this->container->get('wkt_user.user_training_article_updated');
			// on change modified de tous les UserArticleRead  de cet article à true
			$UserTrainingArticleService->changeAttributeUpdated($article, true);
			// on change finished de tous les UserTraining de cet article à false
			$UserTrainingArticleService->changeAttributeFinished($training);
			//on change updated de tous les UserTraining liés à cet article
			$UserTrainingArticleService->changeAttributeUpdatedinUserTraining($training);




			$em->persist($article);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Article bien enregistré.');

			return $this->redirectToRoute('wkt_platform_article_view', array('id' => $article->getId(), 'slugTraining' => $article->getPart()->getTraining()->getSlug(), 'slugArticle' => $article->getSlug()));
		}

	  return $this->render('WKTPlatformBundle:Article:edit.html.twig', array(
	  	'articleEdit' => $article,
	    'form' => $form->createView(),
	    'training' => $training,
	    'summary' => $summary,
	  ));
	}


}

// 
