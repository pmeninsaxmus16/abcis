<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AbcPositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',array('label'=>'Position Name *'))
            
            //->add('createdDate')
            //->add('idCard')
            //->add('section')
            ->add('position','entity',
                 array(
                'empty_value' => 'Choose a position',
		'label'=>'Position Parent *',
		'class'=>'ABCIsystemBundle:AbcPosition',
                
		'property'=>'name'))
            ->add('primaryPosition','choice',array(
		'label'=>'Choose an Status *',
                'empty_value' => 'Choose an option',
		'choices'=> array(
		't' => 'Enabled', 
		'f' => 'Disabled',)))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcPosition'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcpositiontype';
    }
}
