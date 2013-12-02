<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AbcGroupsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',array('label'=>'Group name *'))
            
            //->add('createdDate')
            //->add('idCard')
            ->add('group','entity',
                 array(
                'empty_value' => 'Choose a group',
		'label'=>'Select a group *',
		'class'=>'ABCIsystemBundle:AbcGroups',
                
		'property'=>'name'))
            ->add('weight','number',array('label'=>'Weight *'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcGroups'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcgroupstype';
    }
}
