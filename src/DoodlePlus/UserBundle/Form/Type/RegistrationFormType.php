<?php

namespace DoodlePlus\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilder $builder, array $options)
    {		
        $builder->add('firstname')
				->add('lastname')
				->add('email')
				->add('password')
				->add('address')
				->add('phonenumber')
				->add('function')
				->add('reference');
    }

    public function getName()
    {
        return 'doodleplus_user_registration';
    }
}