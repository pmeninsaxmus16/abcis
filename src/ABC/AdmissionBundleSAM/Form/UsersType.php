<?php

namespace ABC\admissionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            // ->add('idCard')
            ->add('username')
            ->add('password','password')
				->add('emailAddress', 'text', array('label'=>'E-mail'))
	        ->add('UserRoles','entity', array(
								'label'=>'Role',
								'class'=>'ABCadmissionBundle:Roles',
								'multiple'=>'true',
								))

        ;
    }

    public function getName()
    {
        return 'abc_admissionbundle_userstype';
    }
}
