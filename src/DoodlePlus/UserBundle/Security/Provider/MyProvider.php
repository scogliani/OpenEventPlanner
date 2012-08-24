<?php

namespace DoodlePlus\UserBundle\Security\Provider;

use FOS\UserBundle\Model\UserManagerInterface;

use DoodlePlus\UserBundle\Security\Core\Exception\EmailNotFoundException;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class MyProvider implements UserProviderInterface
{
    private $userManager;

    public function __construct(UserManagerInterface $userManager)
    {
        $this->userManager = $userManager;
    }

    public function loadUserByUsername($email)
    {
        $user = $this->userManager->findUserByEmail($email);

        if (!$user) {
            throw new EmailNotFoundException(sprintf('No user with email "%s" was found.', $email));
        }

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        return $this->userManager->refreshUser($user);
    }

    public function supportsClass($class)
    {
        return $this->userManager->supportsClass($class);
    }
}