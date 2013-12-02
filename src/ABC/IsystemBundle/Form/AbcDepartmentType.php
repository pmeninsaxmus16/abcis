<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AbcDepartmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text',array('label'=>'Department Name *'))
            //->add('createdDate')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcDepartment'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcdepartmenttype';
    }
}
