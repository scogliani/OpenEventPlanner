<?php

namespace DoodlePlus\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{	
	public function findResponseEvent($user) {
		return 
			$this->createQueryBuilder('u')
			->join('e.guestGroup', 'g')
			->join('g.users', 'u')
			->where('u = ?1')
			->setParameter(1, $user)
			->getQuery()
			->getResult();
	}
}