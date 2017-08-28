<?php
// src/WKT/PlatformBundle/Score/WKTScore.php

namespace WKT\PlatformBundle\Score;

use Doctrine\ORM\EntityManager;
use WKT\PlatformBundle\Entity\ArticleModified;

class WKTScore
{
	private $em;
	private $text = 1;
	private $mots = 20;
	private $video = 5;
	private $image = 2;

	public function __construct(EntityManager $em)
	{ //Son constructeur avec l'entity manager en paramètre
	        $this->em = $em;
	}

	public function getScore(ArticleModified $articleModified)
	{
		$scoreFortext = ceil($this->scoreForText($articleModified)/$this->mots) * $this->text;
		$scoreForImage = $this->scoreForImage($articleModified) * $this->image;
		$scoreForVideo = '';
		if ($this->scoreForVideo($articleModified)) {
			$scoreForVideo = $this->video;
		}else{
			$scoreForVideo = 0;
		}

		return $scoreFortext + $scoreForImage + $scoreForVideo;
	}

	//retourne le nombre d'images incluses dans la partie content
	private function scoreForImage(ArticleModified $articleModified)
	{
		return substr_count($articleModified->getContent(), '<p><img src="');
	}

	// retourne un booléean selon la présence d'une vidéo ou nom
	private function scoreForVideo(ArticleModified $articleModified)
	{
		if (!is_null($articleModified->getVideo())) {
			return true;
		}
		return false;
	}

	// retourne le nombre de mots des parties introduction et content
	private function scoreForText(ArticleModified $articleModified)
	{
		return str_word_count(strip_tags($articleModified->getIntroduction())) + str_word_count(strip_tags($articleModified->getContent()));
	}

}
