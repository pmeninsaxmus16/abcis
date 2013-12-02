<?php

namespace ABC\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BkLinkResourceRoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           // ->add('createdDate')
            ->add('resource','entity',
                  array(
                      'label'=>'Select a resource *',
                      'class'=>'BookingBundle:BkResource',
                      'property'=>'name'
                  ))
            ->add('room','entity',
                  array(
                      'label'=>'Select a room *',
                      'class'=>'BookingBundle:BkRoom',
                      'property'=>'name'
                  ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\BookingBundle\Entity\BkLinkResourceRoom'
        ));
    }

    public function getName()
    {
        return 'abc_bookingbundle_bklinkresourceroomtype';
    }
}
