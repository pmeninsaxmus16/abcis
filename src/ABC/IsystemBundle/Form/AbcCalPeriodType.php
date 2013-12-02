<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class AbcCalPeriodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('deadline',null,array(

                'widget' => 'choice',
                'format' => 'dd-MM-yyyy',
		'label'=>'Deadline dd-mm-Y *',
                'empty_value' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day'),
                ))
            ->add('isCative','choice',array(
		'label'=>'Choose an Status *',
                'empty_value' => 'Choose an option',
		'choices'=> array(
		't' => 'Enabled', 
		'f' => 'Disabled',)))
            ->add('cal','entity',
                 array(
		'label'=>'Select a Cal *',
		'class'=>'ABCIsystemBundle:AbcCal',
                
		'property'=>'name'))
            ->add('section','entity',
                 array(
		'label'=>'Select a section *',
		'class'=>'ABCIsystemBundle:AbcSections',
                'query_builder' => function(EntityRepository $er) {
				return $er->createQueryBuilder('s')
				->select("s")	
                               	->where('s.weight=:estado')
				->setParameter('estado',2)
				; 
							
				},
		'property'=>'name',
                ))
            ->add('sy','entity',
                 array(
		'label'=>'Select a SY *',
		'class'=>'ABCIsystemBundle:AbcSchoolYear',
                
		'property'=>'name'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcCalPeriod'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abccalperiodtype';
    }
}
