<?php

namespace deproject\firstBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
//use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;






class SoldticketsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	//$transformer = new DateTimeToStringTransformer();
    	
          $builder
            ->add('ticket')
            ->add('category')
            ->add('partner')
            ->add('granttype',null,array('label' => 'Grant'))
            ->add('quantity')
            ->add('date'
);
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'deproject\firstBundle\Entity\Soldtickets'
        	
        	
        	
        	
        	
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'deproject_firstbundle_soldtickets';
    }
}
