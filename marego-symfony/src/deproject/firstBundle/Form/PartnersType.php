<?php

namespace deproject\firstBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PartnersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pName',null,array('label' => 'Partner Name','attr' =>array('style' => 'width:400px')))
            ->add('strasse',null,array('label' => 'Strasse','attr' =>array('style' => 'width:400px')))
            ->add('city',null,array('label' => 'City','attr' =>array('style' => 'width:400px')))
            ->add('zipcode',null,array('label' => 'Zipcode','attr' =>array('style' => 'width:400px')))
            ->add('fName',null,array('label' => 'First Name','attr' =>array('style' => 'width:400px')))
            ->add('lName',null,array('label' => 'Last Name','attr' =>array('style' => 'width:400px')))
            ->add('title',null,array('label' => 'Title','attr' =>array('style' => 'width:400px')))
            ->add('iban',null,array('label' => 'Iban','attr' =>array('style' => 'width:400px')))
            ->add('phone',null,array('label' => 'Phone/Mobile','attr' =>array('style' => 'width:400px')))
            ->add('mail',null,array('label' => 'E-Mail','attr' =>array('style' => 'width:400px')))
            ->add('username',null,array('label' => 'Username','attr' =>array('style' => 'width:400px')))
            ->add('securitypassword',null,array('label' => 'Password','attr' =>array('style' => 'width:400px')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'deproject\firstBundle\Entity\Partners'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'deproject_firstbundle_partners';
    }
}
