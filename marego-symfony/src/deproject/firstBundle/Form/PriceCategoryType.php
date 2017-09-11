<?php

namespace deproject\firstBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PriceCategoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        	->add('Cid',null,array('label' => 'Category ID'))
            ->add('cName',null,array('label' => 'Category Name'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'deproject\firstBundle\Entity\PriceCategory'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'deproject_firstbundle_pricecategory';
    }
}
