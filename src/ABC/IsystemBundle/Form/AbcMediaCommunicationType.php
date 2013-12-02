<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AbcMediaCommunicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mediaType','text',array('label'=>'Media Type *'))
            //->add('createdDate')
            //->add('idCard')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcMediaCommunication'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcmediacommunicationtype';
    }
}
