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
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
        ->add('email',TextType::class,array(
            'attr'=> array(
                "class"=>"input-text",
                'placeholder'=>'Email',
              
            ),
            
                   ))
            ->add('telephone',TextType::class,array(
            'attr'=> array(
                "class"=>"input-text",
                'placeholder'=> 'Téléphone',

            )
                    ))

            ->add('sujet',TextType::class,array(
            
            'attr'=> array(
                "class"=>"input-text",
                'placeholder'=> 'Objet',


            )
                    ))
            ->add('message',TextAreaType::class,array(
            'attr'=> array(
                "class"=>"input-textarea",
                'placeholder'=> 'Votre message...',

            )
            ));
           
    }
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }
    public function getBlockPrefix() {
        return null;
    }
}