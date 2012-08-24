<?php

namespace DoodlePlus\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DoodlePlusUserBundle extends Bundle {
	public function getParent() {
        return 'FOSUserBundle';
    }
}
