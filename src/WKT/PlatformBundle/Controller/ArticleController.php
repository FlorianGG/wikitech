<?php 
// src/WKT/PlatformBundle/Controller/ArticleController.php

namespace WKT\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use WKT\PlatformBundle\Entity\Training;
use WKT\PlatformBundle\Entity\Article;


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

	public function addAction()
	{

	}

	public function summaryAction($id)
	{
		$em = $this->getDoctrine()->getManager();
		$summary = [];

		$articles = $em->getRepository('WKTPlatformBundle:Article')->summaryById($id);

		foreach ($articles as $article) {
			if (array_key_exists($article->getPart()->getTitle(), $summary)) {
				$summary[$article->getPart()->getTitle()]['articleTitle'][]= array(
					'page' => $article->getTitle(),
					'id' => $article->getId(),
					'slugTraining' => $article->getTraining()->getSlug(),
					'slugArticle' => $article->getSlug());
			}else{
				$summary[] = $article->getPart()->getTitle();
				$summary[$article->getPart()->getTitle()]['partTitle'] = $article->getPart()->getTitle();

				$summary[$article->getPart()->getTitle()]['articleTitle'][]= array(
					'page' => $article->getTitle(),
					'id' => $article->getId(),
					'slugTraining' => $article->getTraining()->getSlug(),
					'slugArticle' => $article->getSlug());

			}
		}
		$request = $this->get('request_stack')->getMasterRequest();
		return $this->render('WKTPlatformBundle:Article:summary.html.twig', array('summary' => $summary, 'request' => $request));
	}
}
