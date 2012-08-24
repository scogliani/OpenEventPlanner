<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Simon Cogliani <simon.cogliani@ecole.ensicaen.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DoodlePlus\UserBundle\Security\Core\Exception;

use Symfony\Component\Security\Core\Exception\AuthenticationException;

/**
 * EmailNotFoundException is thrown if a User cannot be found by its username.
 *
 * @author Simon Cogliani <simon.cogliani@ecole.ensicaen.fr>
 */
class EmailNotFoundException extends AuthenticationException
{
}
