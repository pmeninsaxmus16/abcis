<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AbcPhotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('img','file', array(
                'data_class' => null ))
            //->add('weight')
            //->add('type')
            //->add('size')
            //->add('ip')
            //->add('photoname')
            ->add('member','entity',
			array(
				'label'=>'member *',
				'class'=>'ABCIsystemBundle:AbcMembers',
				'property'=>'nickname',
	     ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcPhoto'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcphototype';
    }
}
