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

		return $this->render('WKTPlatformBundle:Article:view.html.twig', array(
			'article' => $article,
			'idArticleModified' => $idArticleModified,
			));
	}

	public function addAction(Request $request, Training $id)
	{
		$article = new Article();
		$summary = $this->container->get('wkt_platform.summary')->returnSummaryInArray($id);
		
		$form = $this->container->get('wkt_platform.generate_form')->generateFormArticle($article, $id);

		if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($article);
			$em->flush();

			$request->getSession()->getFlashBag()->add('notice', 'Article bien enregistré.');

			return $this->redirectToRoute('wkt_platform_article_view', array('id' => $article->getId(), 'slugTraining' => $article->getPart()->getTraining()->getSlug(), 'slugArticle' => $article->getSlug()));
		}

	  return $this->render('WKTPlatformBundle:Article:add.html.twig', array(
	    'form' => $form->createView(),
	    'training' => $id,
	    'summary' => $summary,
	  ));
	}

}

// 
