<?php

namespace WKT\PlatformBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * PartRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PartRepository extends EntityRepository
{
	public function getPartsByTraining($id)
	{
		$qb = $this->createQueryBuilder('p')
			->where('p.training = :id')
			->setParameter('id', $id)
			->orderBy('p.orderInTraining', 'ASC');

		return $qb->getQuery()->getResult();
	}
}
