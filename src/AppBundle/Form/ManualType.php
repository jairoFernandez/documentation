<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ManualType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',null,array(
                'label'=>'MSG.name'
            ))
            ->add('description', null, array(
                'label'=>'MSG.description'
            ))
            ->add('cover',null,array(
                'label' => 'MSG.cover'
            ))
            ->add('createdBy', null, array(
                'label' => 'MSG.createdBy'
            ))
            ->add('isActive',null, array(
                'label' => 'MSG.isActive'
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Manual'
        ));
    }
}
