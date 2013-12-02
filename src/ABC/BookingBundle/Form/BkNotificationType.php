<?php

namespace ABC\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BkNotificationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('resourceId')
            ->add('quantity')
            ->add('bookingId')
            ->add('eventId')
            ->add('performer')
            ->add('activityType')
            ->add('ip')
          //  ->add('updatedDate')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\BookingBundle\Entity\BkNotification'
        ));
    }

    public function getName()
    {
        return 'abc_bookingbundle_bknotificationtype';
    }
}
