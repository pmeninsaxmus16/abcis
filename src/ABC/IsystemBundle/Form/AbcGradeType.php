<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class AbcGradeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',array('label'=>'Grade *'))
            ->add('academicOrder','integer',array('label'=>'Academic Order *'))
            ->add('section','entity',
                 array(
		'label'=>'Select a section *',
		'class'=>'ABCIsystemBundle:AbcSections',
                'query_builder' => function(EntityRepository $er) {
				return $er->createQueryBuilder('s')
				->select("s")	
                               	->where('s.weight=:estado')
				->setParameter('estado',1)
				; 
							
				},
		'property'=>'name',
                'multiple' => 'true','required' => false))
            //->add('idCourseSubsession')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcGrade'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcgradetype';
    }
}
