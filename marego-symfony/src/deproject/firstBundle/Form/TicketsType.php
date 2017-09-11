<?php

namespace deproject\firstBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TicketsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
        	->add('tid',null,array('label' => 'Ticket ID','attr' =>array('style' => 'width:300px')))
        	->add('tname',null,array('label' => 'Ticket Name','attr' =>array('style' => 'width:300px')))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'deproject\firstBundle\Entity\Tickets'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'deproject_firstbundle_tickets';
    }
}
