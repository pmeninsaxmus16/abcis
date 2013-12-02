<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use ABC\IsystemBundle\Entity\AbcMembersGroups;
use ABC\IsystemBundle\Form\AbcMembersGroupsType;

use ABC\IsystemBundle\Entity\AbcMemberMediaCommunication;
use ABC\IsystemBundle\Form\AbcMemberMediaCommunicationType;


class AbcMembersStudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idCard','text',array('label'=>'IDCARD','read_only'=>true))
            ->add('admonCode','text',array('label'=>'ADMON CODE','required'=>false))
            ->add('lastname','text',array('label'=>'Lastname *'))
            ->add('firstname','text',array('label'=>'Fistname *'))
            ->add('middlename','text',array('label'=>'Middlename','required'=>false))
            ->add('birthdate', 'date', array(
                                'widget' => 'single_text',
                                'format' => 'dd-MM-yyyy'))
            ->add('gender','choice',array(
				'label'=>'Choose a gender *',
				'empty_value' => 'Choose a gender',
				'choices'=> array(
				'female' => 'Female', 
				'male' => 'Male',
			)))
            ->add('placeOfBirthdate')
            ->add('nickname')
            ->add('login','text',array('read_only'=>true))
            ->add('sitewideLogin')
            ->add('status','choice',array(
				'label'=>'Choose an Status *',
				'empty_value' => 'Choose an option',
				'choices'=> array(
				'active' => 'Active', 
				'no_active' => 'No Active',
	    )))
            //->add('createdDate')
            //->add('password')
            //->add('salt')
            ->add('saludation','entity',
			array(
				'label'=>'Saludation *',
				'class'=>'ABCIsystemBundle:AbcSadulation',
				'property'=>'abbreviationEn',
	     ))
             /*->add('groups', 'collection', array(
                'type'           => new AbcMembersGroupsType(),
                'label'          => 'Groups',
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
              
            ))  
             ->add('contacts', 'collection', array(
                'type'           => new AbcMembersContactsType(),
                'label'          => 'Contact',
                'allow_add'    => true,
                'allow_delete' => true,
                'by_reference' => false,
              
            ))  */
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcMembers'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcmembersstudenttype';
    }
}
