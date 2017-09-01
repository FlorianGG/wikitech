<?php
// src/WKT/UserBundle/TrainingIsFinished/WKTTrainingIsFinished.php

namespace WKT\UserBundle\TrainingIsFinished;

use Doctrine\ORM\EntityManager;
use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\Training;
use WKT\PlatformBundle\Summary\WKTSummary;
use WKT\UserBundle\Entity\User;

class WKTTrainingIsFinished
{
	private $em;
	private $sum;

	public function __construct(EntityManager $em, WKTSummary $sum)
	{ //Son constructeur avec l'entity manager en paramètre
	        $this->em = $em;
	        $this->sum = $sum;
	}

	public function getTrainingIsNotFinished(User $user, Training $id)
	{
		$articles = $this->sum->getArticlesByTraining($id);

		$articlesRead = $user->getUserArticlesRead();

		foreach ($articles as $article) {
			if (!$this->loopInArticlesRead($articlesRead, $article)) {
				return $article;
			}
		}

		return false;
	}

	private function loopInArticlesRead($articlesRead, Article $article)
	{
		$articles =[];
		foreach ($articlesRead as $articleRead) {
			if ($articleRead->getUpdated()) {
				return false;
			}
			$articles[] = $articleRead->getArticle();
		}
		if (in_array($article, $articles)) {
				return true;
		}
		return false;
	}

}
