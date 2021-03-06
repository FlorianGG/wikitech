<?php

namespace WKT\UserBundle\Repository;

use WKT\PlatformBundle\Entity\Article;
use WKT\UserBundle\Entity\User;

/**
 * UserArticleReadRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserArticleReadRepository extends \Doctrine\ORM\EntityRepository
{
	public function getUserArticleReadByUserAndArticle(User $user, Article $article)
	{
		return $this->createQueryBuilder('uar')
			->where('uar.user = :user')
			->setParameter('user', $user->getId())
			->andWhere('uar.article = :article')
			->setParameter('article', $article->getId())
			->getQuery()
			->getOneOrNullResult();
	}
}
