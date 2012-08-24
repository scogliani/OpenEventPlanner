<?php

namespace DoodlePlus\EmailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class EmailController extends Controller {	
	public function sendAction() {
	
		$events = $this->getDoctrine()
                       ->getEntityManager()
                       ->getRepository('DoodlePlusEventBundle:Event')
                       ->findGuestGroupWithCurrentDate();

		$repository = $this->getDoctrine()->getRepository('DoodlePlusEmailBundle:Email');
					   
		$tpl_engine = $this->get('twigstring');
		$router = $this->get('router');
					   
		foreach ($events as $event) {
			$title = $event->getTitle();
			
			$emailGuest = $repository->find($event->getEmailGuest()->getId());
		
			foreach($event->getGuestGroup()->getUsers() as $user) {
			
				$vars = array(
					'lastname'  => $user->getLastname(),
					'firstname' => $user->getFirstname(),
					'event'     => $event
				);
				
				$message = $emailGuest->getContent();
				
				$message .= "
				
<a style='background-color: green; text-decoration: none; color: white; border: 1px solid black; padding: 2px' href='" .
				$router->generate("saving_answer_event", array("user" => $user->getId(), "event" => $event->getId(), "answerUser" => 1), true) . "'>I am going to be present</a>
				
<a style='background-color: red; text-decoration: none; color: white; border: 1px solid black; padding: 2px' href='" .
				$router->generate("saving_answer_event", array("user" => $user->getId(), "event" => $event->getId(), "answerUser" => 0), true) . "'>I am not going to be present</a>";
				
				$emailTitle = $emailGuest->getTitle();
				eval("\$emailTitle = \"$emailTitle\";");
			
				$email = \Swift_Message::newInstance()
					->setSubject($emailTitle)
					->setFrom('postmaster@openeventplanner.net')
					->setTo($user->getEmail())
					->setBody($tpl_engine->render(nl2br($message), $vars), "text/html");
				
				$this->get('mailer')->send($email);
			}
		}
					
		echo $message;
					
		return new Response('Emails have been sent');
	}
	
	/**
	 * Inserts the answer into the database
	 * @param $idUser
	 * @param $answerUser
	 * @return redirection to the profile of the user
	 */
	public function answerAction($user, $event, $answerUser, $withPartner) {
		$em = $this->getDoctrine()->getEntityManager();
		
		$response = new \DoodlePlus\EventBundle\Entity\Response();
		
		$response->setIdUser($em->getRepository('DoodlePlusUserBundle:User')->find($user));
		$response->setIdEvent($em->getRepository('DoodlePlusEventBundle:Event')->find($event));
		$response->setAnswerUser($answerUser);
		$response->setWithPartner($withPartner);
		
		$em->persist($response);
		$em->flush();
		
		return $this->redirect($this->generateUrl('fos_user_profile_show', array()));
	}
}

?>