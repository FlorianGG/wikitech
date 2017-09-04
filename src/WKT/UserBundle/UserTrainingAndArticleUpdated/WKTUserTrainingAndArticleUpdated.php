<?php
// src/WKT/UserBundle/UserTrainingAndArticleUpdated/WKTUserTrainingAndArticleUpdated.php

namespace WKT\UserBundle\UserTrainingAndArticleUpdated;

use Doctrine\ORM\EntityManager;
use WKT\PlatformBundle\Entity\Article;
use WKT\PlatformBundle\Entity\Training;

class WKTUserTrainingAndArticleUpdated
{
	private $em;

	public function __construct(EntityManager $em)
	{ //Son constructeur avec l'entity manager en paramètre
	        $this->em = $em;
	}

	public function changeAttributeUpdated(Article $article, bool $booleen)
	{
		$userArticlesRead = $this->em->getRepository('WKTUserBundle:UserArticleRead')->findBy(array('article' => $article));

		if (!empty($userArticlesRead)) {
			foreach ($userArticlesRead as $userArticleRead) {
				$userArticleRead->setUpdated($booleen);
				$this->em->persist($userArticleRead);
			}
			$this->em->flush();
			return true;
		}else{
			return null;
		}

		
	}

	public function changeAttributeFinished(Training $training)
	{
		$userTrainings = $this->em->getRepository('WKTUserBundle:UserTraining')->findBy(array('training' => $training));

		if (!is_null($userTrainings)) {
			foreach ($userTrainings as $userTraining) {
				if ($userTraining->getFinished()) {
					$userTraining->setFinished(false);
					$this->em->persist($userTraining);
				}
			}
			$this->em->flush();
		}
	}

	public function changeAttributeUpdatedinUserTraining(Training $training)
	{
		$userTrainings = $this->em->getRepository('WKTUserBundle:UserTraining')->findBy(array('training' => $training));

		foreach ($userTrainings as $userTraining) {
			$userTraining->setUpdated(true);
			$this->em->persist($userTraining);
		}

		$this->em->flush();

	}

}
