<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('email',TextType::class,array(
            'attr'=> array(
                "class"=>"input-text"
            )
                   ))
            ->add('telephone',TextType::class,array(
            'attr'=> array(
                "class"=>"input-text"
            )
                    ))

            ->add('sujet',TextType::class,array(
            
            'attr'=> array(
                "class"=>"input-text"
            )
                    ))
            ->add('message',TextAreaType::class,array(
            'attr'=> array(
                "class"=>"input-textarea"
            )
            ));
           
    }
}