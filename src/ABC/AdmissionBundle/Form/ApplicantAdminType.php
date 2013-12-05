<?php

namespace ABC\AdmissionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ApplicantAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surname')
            ->add('forename')
            ->add('middle')
            //->add('dob')
            //->add('pob')
            //->add('citizenship')
            //->add('gender')
            //->add('religion')
            //->add('firstLanguage')
           // ->add('secondLanguage')
            //->add('status')
            //->add('status', 'entity', array('class'=>'ABCAdmissionBundle:Status','property'=>'name',))
            //->add('createdDate')
            //->add('ip')
            //->add('sessionId')
            //->add('entryGrade')
            //->add('entryYear')
            //->add('living')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\AdmissionBundle\Entity\Applicant'
        ));
    }

    public function getName()
    {
        return 'abc_admissionbundle_applicantadmintype';
    }
}
