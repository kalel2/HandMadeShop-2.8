<?php

namespace HandMadeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array(
                'label' => 'Title'
            ))
            ->add('shortDescription', null, array(
                'label' => 'Short description'
            ))
            ->add('fullDescription', 'textarea', array(
                'label' => 'Full description'
            ))
            ->add('imageFile', 'file', array(
                'label' => 'Image',
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HandMadeBundle\Entity\Article'
        ));
    }
}
