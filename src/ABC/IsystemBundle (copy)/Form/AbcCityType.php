<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AbcCityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           
            //->add('createdDate')
            ->add('department','entity',
                 array(
		'label'=>'Select a department *',
		'class'=>'ABCIsystemBundle:AbcDepartment',
                
		'property'=>'name'))
            ->add('name','text',
                 array(
		'label'=>'City *'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcCity'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abccitytype';
    }
}
