<?php


namespace deproject\firstBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class PriceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
          $builder
            ->add('ticketid',null,array('label' => 'Ticket'))
            ->add('categoryid',null,array('label' => 'Category'))
            ->add('priceperticket',null,array('label' => 'Price/ticket'))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
        	'data_class' => 'deproject\firstBundle\Entity\Price'
            
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'deproject_firstbundle_price';
    }
}
