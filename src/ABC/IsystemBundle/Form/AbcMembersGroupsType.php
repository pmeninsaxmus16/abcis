<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AbcMembersGroupsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            //->add('createdDate')
            ->add('group','entity',array(
				'label'=>'Group *',
				'class'=>'ABCIsystemBundle:AbcGroups',
				'property'=>'name',
                               
			))
            ->add('primaryGroup','choice',array(
                        'label'=>'Is an Primary Group *',
                        'empty_value' => 'Choose an option',
                        'choices'=> array(
                        't' => 'yes', 
                        'f' => 'no',)))
            /*->add('member','entity',
			array(
				'label'=>'Member *',
				'class'=>'ABCIsystemBundle:AbcMembers',
				'property'=>'nickname',
			))*/
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcMembersGroups'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcmembersgroupstype';
    }
}
