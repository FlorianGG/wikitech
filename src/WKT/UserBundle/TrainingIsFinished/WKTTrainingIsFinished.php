<?php
// src/WKT/UserBundle/TrainingIsFinished/WKTTrainingIsFinished.php

namespace WKT\UserBundle\TrainingIsFinished;

use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\Training;
use WKT\PlatformBundle\Summary\WKTSummary;
use WKT\UserBundle\Entity\User;
use WKT\UserBundle\Entity\UserTraining;

class WKTTrainingIsFinished
{
	private $sum;

	public function __construct(WKTSummary $sum)
	{ //Son constructeur avec l'entity manager en paramètre
	        $this->sum = $sum;
	}

	// factorisation fonction qui retourne dans un tableau la liste des articlesl lus pour un user
	public function getArticlesRead(UserTraining $userTraining)
	{
		$user = $userTraining->getUser();
		$training = $userTraining->getTraining();

		$userArticlesRead = $user->getUserArticlesRead();
		$articlesRead = [];

		foreach ($userArticlesRead as $userArticleRead) {
			if ($userArticleRead->getArticle()->getPart()->getTraining() === $training && !$userArticleRead->getUpdated()) {
				$articlesRead[] = $userArticleRead->getArticle();
			}
		}
		return $articlesRead;

	}

	// factorisation fonction qui retourne dans un tableau la liste des articles d'une formation
	private function getArticlesInTraining(UserTraining $userTraining)
	{
		$training = $userTraining->getTraining();
		$articles = $this->sum->getArticlesByTraining($training);

		return $articles;
	}

	public function getFirstArticleNotRead(UserTraining $userTraining)
	{

		$articles = $this->getArticlesInTraining($userTraining);

		$articlesRead = $this->getArticlesRead($userTraining);

		foreach ($articles as $article) {
			if (!in_array($article, $articlesRead)) {
				return $article;
			}
		}
	}

	public function checkTrainingIsFinished(UserTraining $userTraining)
	{
		$articles = $this->getArticlesInTraining($userTraining);

		$articlesRead = $this->getArticlesRead($userTraining);
		$articlesNotRead = [];
		
		foreach ($articles as $article) {
			if (!in_array($article, $articlesRead)) {
				$articlesNotRead[] = $article;
			}
		}

		if (empty($articlesNotRead)) {
			return false;
		}
		return $articlesNotRead;	

	}


	public function listOfTrainingsBeginned(User $user)
	{
		$userTrainings = $user->getUserTrainings();
		$listOfTrainingsBeginned = [];

		foreach ($userTrainings as $userTraining) {
			if (!$userTraining->getFinished() && !$userTraining->getTraining()->getDraft()) {
				$listOfTrainingsBeginned[] = $userTraining->getTraining();
			}
		}
		return $listOfTrainingsBeginned;
	}

	public function getTrainingsBeginnedStatus(array $userTrainings)
	{
		$trainingsBeginned = [];

		foreach ($userTrainings as $userTraining) {
			if (!$userTraining->getFinished() || $userTraining->getUpdated()) {
				$trainingsBeginned[$userTraining->getTraining()->getTitle()] = array(
					'updated' => $userTraining->getUpdated(),
					'finished' => $userTraining->getFinished(),
					'article' => $this->getFirstArticleNotRead($userTraining));
			}else{
				$trainingsBeginned[$userTraining->getTraining()->getTitle()] = array(
					'updated' => $userTraining->getUpdated(),
					'finished' => $userTraining->getFinished());
			}
		}

		return $trainingsBeginned;
	}


}
