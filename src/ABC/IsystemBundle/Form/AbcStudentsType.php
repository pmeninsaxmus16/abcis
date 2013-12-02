<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AbcStudentsType extends AbstractType
{
     public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('tribe','entity',
			array(
				'class'=>'ABCIsystemBundle:AbcTribe',
                                'label'=>'Select a tribe *',
				'property'=>'name',  
			))
            ->add('classYear','text',array('label'=>'Class year *'))
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcStudents'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcstudentstype';
    }
}
?>
