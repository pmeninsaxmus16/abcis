<?php

namespace ABC\AdmissionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surname')
            ->add('middle')
            ->add('forename')
            ->add('idType')
            ->add('idNumber')
            ->add('citizenship')
            ->add('languagesSpoken')
            ->add('schoolAttended')
            ->add('abcPromotionyear')
            ->add('homePhonenumber')
            ->add('mobilePhonenumber')
            ->add('employer')
            ->add('responsible')
            ->add('position')
            ->add('eMail')
            ->add('createdDate')
            ->add('ip')
            ->add('isPayer')
            ->add('applicant')
            ->add('maritalStatus')
            ->add('relationship')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\AdmissionBundle\Entity\Contact'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'abc_admissionbundle_contact';
    }
}
