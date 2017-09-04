<?php
// src/WKT/PlatformBundle/Summary/WKTSummary.php

namespace WKT\PlatformBundle\Summary;

use Doctrine\ORM\EntityManager;
use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\Training;

class WKTSummary
{
	private $em;

	public function __construct(EntityManager $em)
	{ //Son constructeur avec l'entity manager en paramètre
	        $this->em = $em;
	}

	private function getParts(Training $id)
	{
		return $this->em->getRepository('WKTPlatformBundle:Part')->getPartsByTraining($id);
	}
	public function returnSummaryInArray(Training $id)
	{
		$summary = [];
		
		$parts = $this->getParts($id);

		for ($i=0; $i < sizeof($parts); $i++) { 
			$j = $i-1;
			if ($j < 0) {
				$summary[$parts[$i]->getTitle()]['Part'] = array(
					'entity' => $parts[$i],
					'order' => $parts[0]->getOrderInTraining() - 1);
				$articles = $parts[$i]->getArticles();
				for ($x=0; $x < sizeof($parts[$i]->getArticles()); $x++) {
					$y = $x-1;
					if ($y < 0) {
						$summary[$parts[$i]->getTitle()]['Article'][] = array(
							'entityArticle' => $articles[$x],
							'orderArticle' => $articles[0]->getOrderInPart()-1);
					}else{
						$summary[$parts[$i]->getTitle()]['Article'][] = array(
							'entityArticle' => $articles[$x],
							'orderArticle' => ($articles[$x]->getOrderInPart() + $articles[$x-1]->getOrderInPart())/2);
					}

				}

			}else{
				$summary[$parts[$i]->getTitle()]['Part'] = array(
					'entity' => $parts[$i],
					'order' => ($parts[$i]->getOrderInTraining() + $parts[$i-1]->getOrderInTraining())/2);
				$articles = $parts[$i]->getArticles();
				for ($x=0; $x < sizeof($parts[$i]->getArticles()); $x++) { 
					$y = $x-1;
					if ($y < 0) {
						$summary[$parts[$i]->getTitle()]['Article'][] = array(
							'entityArticle' => $articles[$x],
							'orderArticle' => $articles[0]->getOrderInPart()-1);
					}else{
						$summary[$parts[$i]->getTitle()]['Article'][] = array(
							'entityArticle' => $articles[$x],
							'orderArticle' => ($articles[$x]->getOrderInPart() + $articles[$x-1]->getOrderInPart())/2);
					}
				}
			}
			
		}
		return $summary;
	}

	public function getArticlesByTraining(Training $id)
	{
		$parts = $this->getParts($id);
		$articles = [];

		foreach ($parts as $part) {
			$articlesInPart = $part->getArticles();
			foreach ($articlesInPart as $article) {
				$articles[] = $article;
			}
		}

		return $articles;
	}

	public function getFollowingAndPreviousArticle(Article $article)
	{
		$training = $article->getPart()->getTraining();

		$articles = $this->getArticlesByTraining($training);
		$previousAndFollowingArticles = array(
			'previous' => null,
			'following' => null);

		for ($i=0; $i < sizeof($articles); $i++) {
			$j = $i + 1; 
			$k = $i - 1;

			if ($k >= 0) {
				if ($articles[$i]->getId() === $article->getId()) {
					$previousAndFollowingArticles['previous'] = $articles[$k];
				}
			}
			if ($j < sizeof($articles)) {
				if ($articles[$i]->getId() === $article->getId()) {
					$previousAndFollowingArticles['following'] = $articles[$j];
				}
			}
			
		}
		return $previousAndFollowingArticles;

	}

}
