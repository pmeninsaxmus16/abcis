<?php

namespace ABC\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BkTimetableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('nickname')
            ->add('description')
            ->add('headerId','entity',
                    array(
                        'label'=>'Select a booking header *',
                        'class'=>'BookingBundle:BkBookingheader',
                        'property'=>'subject'
                    ))
            ->add('startTime')
            ->add('endTime')
          //  ->add('createdDate')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\BookingBundle\Entity\BkTimetable'
        ));
    }

    public function getName()
    {
        return 'abc_bookingbundle_bktimetabletype';
    }
}
