<?php

namespace PORTFOLIO\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

// php bin/console generate:doctrine:form PORTFOLIOBundle:Competences

class CompetencesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('cptechnology', TextType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                ))
            )
        ))
        ->add('cplevel', IntegerType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\Type(array(
                    'type' => 'integer',
                    'message' => 'Veuillez renseigner un chiffre'
                ))
            )
        ))
        ->add('Enregistrer', SubmitType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PORTFOLIO\Bundle\Entity\Competences'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'portfolio_bundle_competences';
    }


}
