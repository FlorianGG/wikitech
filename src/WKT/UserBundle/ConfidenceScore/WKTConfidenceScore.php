<?php
// src/WKT/UserBundle/ConfidenceScore/WKTConfidenceScore.php

namespace WKT\UserBundle\ConfidenceScore;

use Doctrine\ORM\EntityManager;
use WKT\PlatformBundle\Entity\Training;
use WKT\UserBundle\Entity\User;

class WKTConfidenceScore
{
	private $em;

	public function __construct(EntityManager $em)
	{ //Son constructeur avec l'entity manager en paramètre
	        $this->em = $em;
	}

	public function getConfidenceScore(User $user = null)
	{
		$commitRepository = $this->em->getRepository('WKTPlatformBundle:Commit');
		$userRepository = $this->em->getRepository('WKTUserBundle:User');
		$nbCommitNull = 0;
		$nbCommitValid = 0;
		$nbCommitNotValid = 0;

		if (is_null($user)) {
			return 'Pas de user';
		}
		$commits = $commitRepository->findBy(array('user' => $user));
		if (empty($commits)) {
			return 'first';
		}
		foreach ($commits as $commit) {
			if (is_null($commit->getIsValidate())) {
				$nbCommitNull++;
			}elseif (!$commit->getIsValidate()) {
				$nbCommitNotValid++;
			}else{
				$nbCommitValid++;
			}
		}
		$nbStrike = $user->getNbStrike();
		if ($nbCommitValid + $nbCommitNotValid === 0 && $nbCommitNull > 1) {
			return 'waiting';
		}elseif ($nbCommitValid + $nbCommitNotValid === 0 && $nbCommitNull === 1) {
			return 'first';
		}
		$confidenceScore = ($nbCommitValid/($nbCommitValid + $nbCommitNotValid) * 100) - (($nbStrike/($nbCommitValid + $nbCommitNotValid))* 10);

		return $confidenceScore;	
	}

	public function getContributionScoreByUserAndByTraining(User $user)
	{
		$commits= $this->em->getRepository('WKTPlatformBundle:Commit')->getCommitsValidateByUser($user);;

		if (is_null($commits)) {
			return null;
		}

		$commitsByTraining = [];
		foreach ($commits as $commit) {
			$training = $commit->getArticleModified()->getPart()->getTraining()->getTitle();
			if (!array_key_exists($training, $commitsByTraining)) {
				$commitsByTraining[$training] = array(
					'training' => $training,
					'score' => $commit->getScore());
			}else{
				$commitsByTraining[$training] = array(
					'training' => $training,
					'score' => $commitsByTraining[$training]['score'] + $commit->getScore());
			}
		}
		return $commitsByTraining;
	}

}
