<?php

namespace DoodlePlus\EventBundle\Repository;

use Doctrine\ORM\EntityRepository;

class EventRepository extends EntityRepository
{
	public function findGuestGroupWithCurrentDate() {	
		$date = new \DateTime();
		return 
			$this->createQueryBuilder('e')
			->join('e.guestGroup', 'b')
			//->where('e.send BETWEEN ?1 AND ?2')
			//->setParameter(1, $date->format('Y-m-d 00'))
			//->setParameter(2, $date->format("Y-m-d 23"/*, mktime(date("H")-1, 0, 0, date("m"), date("d"), date("Y")))*/))
			->addSelect('b')
			->getQuery()
            ->getResult();
	}
	
	public function findGuestGroupEventFromUser($user) {
		return 
			$this->createQueryBuilder('e')
			->join('e.guestGroup', 'g')
			->join('g.users', 'u')
			->where('u = ?1')
			->setParameter(1, $user)
			->getQuery()
			->getResult();
	}
}