<?php

namespace HandMadeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProductType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null,array(
                'label' => 'Product name'
                ))
            ->add('price', null, array(
                'label' => 'Product price'
                ))
            ->add('description', null ,array(
                'label' => 'Product description'
                ))
            ->add('category', 'entity', array(
                'class'=>'HandMadeBundle:Category',
                'label' => 'Choose category',
                'choice_label'=>'name'
            ))
            ->add('imageFile', 'file')
            ->add('extraImages', 'collection', array(
                'entry_type' => new ProductImagesType(),
                'prototype' => true,
                'allow_add' => true,
                'allow_delete' => true,
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HandMadeBundle\Entity\Product'
        ));
    }

     /**
     * @return string
     */
    public function getName()
    {
        return 'handmadebundle_product';
    }
}
