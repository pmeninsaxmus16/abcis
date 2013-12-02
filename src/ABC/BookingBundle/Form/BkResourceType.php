<?php

namespace ABC\BookingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BkResourceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('quantity') 
            ->add('timeBeforeBooking')
            ->add('isActive','choice',
                    array(
                        'choices'=>array('t'=>'Active', 'f'=>'Disabled')
                    ))
          // ->add('createdDate')
            ->add('category','entity',
                 array(
                    'label'=>'Select a category *',
                    'class'=>'BookingBundle:BkResourceCategory',
                     'property'=>'name'
		      ))
	    ->add('timetableId','choice',
                    array(
                        'choices'=>array(1=>'Bell Times', 3=>'24/7 Schedule')
                        )) 
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\BookingBundle\Entity\BkResource'
        ));
    }

    public function getName()
    {
        return 'abc_bookingbundle_bkresourcetype';
    }
}
