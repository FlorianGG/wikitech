<?php 
// src/WKT/PlatformBundle/Controller/ArticleController.php

namespace WKT\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use WKT\PlatformBundle\Entity\Article;



class ArticleController extends Controller
{

	public function viewAction(Request $request, $slugArticle)
	{
		$em = $this->getDoctrine()->getManager();
		$articleRepository = $em->getRepository('WKTPlatformBundle:Article');
		$article = $articleRepository->findOneBy(array('slug' => $slugArticle));


		$idArticleModified = $em->getRepository('WKTPlatformBundle:ArticleModified')->getArticlesModifiedNotRejectedByArticle($article);
		if (!empty($idArticleModified)) {
			$idArticleModified = $idArticleModified[0]->getId();
		}else{
			$idArticleModified = 0;
			//on change la valeur de l'attribut à false
			// Pour couvrir le cas ou il y a eu une modification et qu'elle a été supprimé par l'admin
			$article->setModified(false);
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
		
		//on récupère le sommaire de l'article
		$summaryArticle = $this->container->get('wkt_platform.summary')->summaryArticle($article->getContent());

		return $this->render('WKTPlatformBundle:Article:view.html.twig', array(
			'article' => $article,
			'idArticleModified' => $idArticleModified,
			'articlePreviousAndFollowing' => $articlePreviousAndFollowing,
			'articleIfValidate' => $articleIfValidate,
			'summaryArticle' => $summaryArticle,
			));
	}
}

// 
