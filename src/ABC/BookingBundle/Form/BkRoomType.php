<?php

namespace ABC\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BkRoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
          //  ->add('createdDate')
            ->add('section','entity',
                  array(
                      'label'=>'Select a section *',
                      'class'=>'BookingBundle:BkSection',
                      'property'=>'name'
                  ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\BookingBundle\Entity\BkRoom'
        ));
    }

    public function getName()
    {
        return 'abc_bookingbundle_bkroomtype';
    }
}
