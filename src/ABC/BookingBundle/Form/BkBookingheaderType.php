<?php

namespace ABC\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BkBookingheaderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject')
            ->add('location')
            ->add('description')
            ->add('owner')
            ->add('isActive')
            ->add('ip')
            //->add('createdDate')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\BookingBundle\Entity\BkBookingheader'
        ));
    }

    public function getName()
    {
        return 'abc_bookingbundle_bkbookingheadertype';
    }
}
