<?php

namespace ABC\IsystemBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class AbcMembersContactsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*->add('member','entity',
			array(
				'label'=>'Student *',
				'class'=>'ABCIsystemBundle:AbcMembers',
				'property'=>'nickname',
                                'query_builder' => function(EntityRepository $er) {
                                return $er->createQueryBuilder('st')
                                ->select("st")
                               ->where("st.idCard like '__02____' and st.status=:estado")
                               ->setParameter('estado','active')
                               ->orderBy('st.lastname, st.firstname ');
                                },
	     ))*/
            ->add('contact','entity',
			array(
				'label'=>'Contact *',
				'class'=>'ABCIsystemBundle:AbcMembers',
				'property'=>'nickname',
                                'query_builder' => function(EntityRepository $er) {
                                return $er->createQueryBuilder('st')
                                ->select("st")
                               ->where("st.idCard like '__04____' and st.status=:estado")
                               ->setParameter('estado','active')
                               ->orderBy('st.lastname, st.firstname ');
                                },
	     ))
            ->add('relationship','entity',
			array(
				'label'=>'Relationship *',
				'class'=>'ABCIsystemBundle:AbcRelationship',
				'property'=>'relationship',
	     ))
            ->add('mainContact','choice',array(
                                'label'=>'Is Main contact *',
                                'empty_value' => 'Choose an option',
                                'choices'=> array(
                                't' => 'Enabled', 
                                'f' => 'Disabled',
              )))                                        

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ABC\IsystemBundle\Entity\AbcMembersContacts'
        ));
    }

    public function getName()
    {
        return 'abc_isystembundle_abcmemberscontactstype';
    }
}
