<?php

namespace PORTFOLIO\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Constraints as Assert;

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
                )),
                new Assert\Length(array(
                    'max' => 20,
                    'maxMessage' => 'Attention, veuillez renseignerau maximmum 20 caractères'
                )),
                new Assert\Regex(array(
                    'pattern' => '/^[a-zA-Z-_0-9]+$/',
                    'message' => 'Veuillez utiliser les lettres de A à Z et les chiffres de 0 à 9'
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
            ),
            'attr' => array(
                'placeholder' => 'Ex : 50',
                'class' => 'form-control'
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
