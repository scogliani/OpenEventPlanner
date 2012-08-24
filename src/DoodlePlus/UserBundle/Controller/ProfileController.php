<?php

namespace DoodlePlus\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DoodlePlus\UserBundle\Entity\User;

class ProfileController extends Controller
{
    public function showAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
		
		$guestGroupEvents = $this->getDoctrine()
                  ->getEntityManager()
                  ->getRepository('DoodlePlusEventBundle:Event')
                  ->findGuestGroupEventFromUser($user);
		
		$infos = array();
		
		foreach($guestGroupEvents as $guestGroupEvent) {
			$responseEvent = $this->getDoctrine()
                  ->getEntityManager()
                  ->getRepository('DoodlePlusEventBundle:Response')
                  ->findResponseEvent($user->getId(), $guestGroupEvent->getId());
				  
			array_push($infos, array('titleEvent' => $guestGroupEvent->getTitle(), 'responseEvent' => $responseEvent));
		}
		
        return $this->container->get('templating')->renderResponse(
		'FOSUserBundle:Profile:show.html.'.$this->container->getParameter('fos_user.template.engine'),
		array('user' => $user,
			  'guestGroupEvents' => $infos));
    }
}