<?php

namespace AppBundle\Form;

use AppBundle\Entity\Categorie;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\FileType;


class ProduitType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')
        ->add('titre',TextType::class,array(
            'attr'=> array(
                "class"=>"form-control"
            )
                   ))
            ->add('poids',TextType::class,array(
            'attr'=> array(
                "class"=>"form-control"
            )
                    ))

            // ->add('categorie',EntityType::class,array(
            // 'class'=> 'AppBundle\Entity\Categorie',
            // 'choice_label' => 'category',
            // 'choices'=>getCategory(),
            // 'attr'=> array(
            //     "class"=>"form-control"
            // )
            //         ))
            ->add('prix',TextType::class,array(
            'attr'=> array(
                "class"=>"form-control"
            )
            ))
            ->add('imagefile',FileType::class,array(
                'attr'=> array(
                    "class"=>"btn"
                )
                    ));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Produit'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_produit';
    }


}
