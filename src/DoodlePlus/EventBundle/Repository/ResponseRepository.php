<?php

namespace DoodlePlus\EventBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ResponseRepository extends EntityRepository
{	
	public function findResponseEvent($idUser, $idEvent) {
		return 
			$this->createQueryBuilder('r')
			->where('r.idUser = ?1')
			->andWhere('r.idEvent = ?2')
			->setParameter(1, $idUser)
			->setParameter(2, $idEvent)
			->getQuery()
			->getOneOrNullResult();
	}
}