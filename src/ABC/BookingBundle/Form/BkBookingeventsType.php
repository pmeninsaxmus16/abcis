<?php

namespace ABC\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BkBookingeventsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity')
            ->add('startTime')
            ->add('endTime')
          //  ->add('bdate')
            ->add('booking','entity',
                    array(
                        'label'=>'Select a booking *',
                        'class'=>'BookingBundle:BkBookingheader',
                        'property'=>'owner'
                    ))
            ->add('resource','entity',
                    array(
                    'label'=>'Select a resource *',
                    'class'=>'BookingBundle:BkResource',
                    'property'=>'name'
                    ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\BookingBundle\Entity\BkBookingevents'
        ));
    }

    public function getName()
    {
        return 'abc_bookingbundle_bkbookingeventstype';
    }
}
