<?php

namespace ABC\AdmissionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
class ApplicantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surname')
            ->add('forename')
            ->add('middle')
            ->add('dob')
            ->add('pob','entity',
                 array(
		'empty_value'=>'Select a place of birth *',
		'class'=>'ABCIsystemBundle:AbcCountry',
                'query_builder' => function(EntityRepository $er) {
				return $er->createQueryBuilder('s')
				->select("s")	
                               	; 
				},
		'property'=>'country_name',
            ))
            ->add('citizenship','entity',
                 array(
		'empty_value'=>'Select a citizenship *',
		'class'=>'ABCIsystemBundle:AbcCountry',
                'query_builder' => function(EntityRepository $er) {
				return $er->createQueryBuilder('s')
				->select("s")	
                               	; 
				},
		'property'=>'country_name',
            ))
            ->add('gender','choice', array(
                'choices'=>array('empty_value'=>'Choose a gender', 'm'=>'Male-Masculino', 'f'=>'Female-Femenino'),
                'required'=>true,
            ))
            ->add('religion', 'choice', array(
                'choices'=>array(
                    'empty_value'=>'Choose a religion',
                    'catolico'=>'Catholic-Católico',
                    'evangelico'=>'Evangelical Christian-Evangelico',
                    'testigo'=>'Jehova Witness-Testigo de Jehova',
                    'adventista'=>'Adventista',
                    'ninguna'=>'No Religion-Ninguna',
                    'otro'=>'Other-Otro'
                    ),
                'required'=>true,
            ))
            ->add('firstLanguage','choice',array(
                'choices'=>array(
                    'empty_value'=>'Select a language',
                    'Albanian'=>'Albanian', 'Arabic'=>'Arabic', 'Basque'=>'Basque','Bulgarian'=>'Bulgarian', 'Catalan'=>'Catalan',
                    'Chinese'=>'Chinese', 'Croatian'=>'Croatian', 'Danish'=>'Danish', 'English'=>'English', 'Fijian'=>'Fijian',
                    'French'=>'French', 'Galician'=>'Galician', 'German'=>'German', 'Herero'=>'Herero', 'Hindi'=>'Hindi',
                    'Indonesian'=>'Indonesian', 'Italian'=>'Italian', 'Japanese'=>'Japanese', 'Javanese'=>'Javanese','Korean'=>'Korean',
                    'Latin'=>'Latin', 'Persian'=>'Persian', 'Polish'=>'Polish', 'Portuguese'=>'Portuguese', 'Romanian'=>'Romanian',
                    'Russian'=>'Russian', 'Sindhi'=>'Sindhi', 'Slovenian'=>'Slovenian', 'Spanish'=>'Spanish', 'Tamil'=>'Tamil',
                    'Telugu'=>'Telugu', 'Turkish'=>'Turkish', 'Ukrainia'=>'Ukrainia','Vietnamese'=>'Vietnamese',),
                'required'=>true,
            ))
            ->add('secondLanguage','choice',array(
                'choices'=>array(
                    'empty_value'=>'Select a language',
                    'Albanian'=>'Albanian', 'Arabic'=>'Arabic', 'Basque'=>'Basque','Bulgarian'=>'Bulgarian', 'Catalan'=>'Catalan',
                    'Chinese'=>'Chinese', 'Croatian'=>'Croatian', 'Danish'=>'Danish', 'English'=>'English', 'Fijian'=>'Fijian',
                    'French'=>'French', 'Galician'=>'Galician', 'German'=>'German', 'Herero'=>'Herero', 'Hindi'=>'Hindi',
                    'Indonesian'=>'Indonesian', 'Italian'=>'Italian', 'Japanese'=>'Japanese', 'Javanese'=>'Javanese','Korean'=>'Korean',
                    'Latin'=>'Latin', 'Persian'=>'Persian', 'Polish'=>'Polish', 'Portuguese'=>'Portuguese', 'Romanian'=>'Romanian',
                    'Russian'=>'Russian', 'Sindhi'=>'Sindhi', 'Slovenian'=>'Slovenian', 'Spanish'=>'Spanish', 'Tamil'=>'Tamil',
                    'Telugu'=>'Telugu', 'Turkish'=>'Turkish', 'Ukrainia'=>'Ukrainia','Vietnamese'=>'Vietnamese',
                    ),
                'required'=>true,
            ))
            ->add('createdDate','date',array(
                'widget'=>'single_text',
                'format'=>'dd-MM-yyyy',
            ))
        //    ->add('ip')
        //    ->add('sessionId')
            ->add('entryGrade','entity',
                 array(
		'empty_value'=>'Select a grade *',
		'class'=>'ABCIsystemBundle:AbcGrade',
                'query_builder' => function(EntityRepository $er) {
				return $er->createQueryBuilder('s')
				->select("s")	
                               	; 
				},
		'property'=>'name',
            ))
            ->add('entryYear','entity',
                 array(
		'empty_value'=>'Select a year *',
		'class'=>'ABCIsystemBundle:AbcGrade',
                'query_builder' => function(EntityRepository $er) {
				return $er->createQueryBuilder('s')
				->select("s")	
                               	; 
				},
		'property'=>'name',
	    ))
          
           /* ->add('status','entity',
                  array('label'=>'Select a status *',
                        'class'=>'ABCAdmissionBundle:Results',
                        'property'=>'name'
                  ))
       */    ->add('living','entity',
                 array('label'=>'Select a relation *',
                       'class'=>'ABCAdmissionBundle:Relationship',
                       'property'=>'name'
                 ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\AdmissionBundle\Entity\Applicant'
        ));
    }

    public function getName()
    {
        return 'abc_admissionbundle_applicanttype';
    }
}
