<?php 
// src/WKT/PlatformBundle/Controller/ArticleController.php

namespace WKT\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\Training;
use WKT\PlatformBundle\Form\ArticleType;


class ArticleController extends Controller
{
	public function indexAction()
	{

	}

	public function viewAction(Article $id)
	{

		$articleRepository = $this->getDoctrine()->getManager()->getRepository('WKTPlatformBundle:Article');

		$article = $articleRepository->find($id);

		return $this->render('WKTPlatformBundle:Article:view.html.twig', array('article' => $article));
	}

	public function addAction(Request $request, Training $id)
	{
	  $article = new Article();
	  $article->setTraining($id);
	  $form   = $this->get('form.factory')->create(ArticleType::class, $article);
	  
	  if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
	    $em = $this->getDoctrine()->getManager();
	    $em->persist($article);
	    $em->flush();

	    $request->getSession()->getFlashBag()->add('notice', 'Article bien enregistré.');

	    return $this->redirectToRoute('wkt_platform_article_view', array('id' => $article->getId(), 'slugTraining' => $article->getTraining()->getSlug(), 'slugArticle' => $article->getSlug()));
	  }

	  return $this->render('WKTPlatformBundle:Article:add.html.twig', array(
	    'form' => $form->createView(),
	  ));
	}

}
