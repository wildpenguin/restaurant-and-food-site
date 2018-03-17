<?php
// src/AppBundle/Repository/MenuRepository.php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class MenuRepository extends EntityRepository
{
	public function findNextAvailablePosition($name)
	{
		return $this->createQueryBuilder('t')
			->andWhere('t.name = :name')
			->setParameter('name', $name)
			->select('COUNT(t.id) as position')
			->getQuery()
			->getOneOrNullResult();
	}
}