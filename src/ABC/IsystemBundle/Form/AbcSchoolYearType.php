<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AbcSchoolYearType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',array('label'=>'School Year *'))
            ->add('code')
            ->add('startDate',null,array(
                'widget' => 'choice',
                'format' => 'dd-MMM-yyyy',
		'label'=>'Start date dd-mm-Y *',
                'empty_value' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day'),
                ))
            ->add('endDate',null,array(
                'widget' => 'choice',
                'format' => 'dd-MMM-yyyy',
		'label'=>'End date dd-mm-Y *',
                'empty_value' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day'),
                ))
            ->add('active','choice',array(
		'label'=>'Choose an Status *',
                'empty_value' => 'Choose an option',
		'choices'=> array(
		't' => 'Enabled', 
		'f' => 'Disabled',)))
            ->add('nextYear','choice',array(
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
            'data_class' => 'ABC\IsystemBundle\Entity\AbcSchoolYear'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcschoolyeartype';
    }
}
