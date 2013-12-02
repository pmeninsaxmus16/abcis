<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AbcMemberMediaCommunicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('media')
            //->add('createdDate')
            ->add('mediaType','entity',
			array(
				'label'=>'Type *',
				'class'=>'ABCIsystemBundle:AbcMediaCommunication',
				'property'=>'mediaType',  
			))
            //->add('member')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcMemberMediaCommunication'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcmembermediacommunicationtype';
    }
}
