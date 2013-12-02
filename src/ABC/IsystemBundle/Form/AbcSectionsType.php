<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class AbcSectionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('weight')
            ->add('isActive','choice',array(
		'label'=>'Choose an Status *',
                'empty_value' => 'Choose an option',
		'choices'=> array(
		't' => 'Enabled', 
		'f' => 'Disabled',)))
            ->add('grade','entity',
                 array(
		'label'=>'Select a Grade *',
		'class'=>'ABCIsystemBundle:AbcGrade',
                     'query_builder' => function(EntityRepository $er) {
				return $er->createQueryBuilder('s')
				->select("s")	
                               	->orderBy('s.academicOrder','ASC')
				
				; 
							
				},
                 'multiple' => 'true',
		'property'=>'name'))
            ->add('position','entity',
                 array(
		'label'=>'Select a Positions *',
		'class'=>'ABCIsystemBundle:AbcPosition',
                      'multiple' => 'true',
		'property'=>'name'))
            ->add('section','entity',
                 array(
		'label'=>'Select a Sub-section *',
		'class'=>'ABCIsystemBundle:AbcSections',
                'required' => false,
		'property'=>'name'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcSections'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcsectionstype';
    }
}
