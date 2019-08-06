<?php

namespace PORTFOLIO\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Constraints as Assert;

class FormationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('formtitre', TextType::class, array(
            'required' => false,
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'Attention veuillez renseigner au minimum 3 caractères',
                    'max' => 100,
                    'maxMessage' => 'Attention veuillez renseigner au maximum 100 caractères'
                )),
                new Assert\Regex(array(
                    'pattern' => '/^[a-zA-Z-_0-9]+$/',
                    'message' => 'Veuillez utiliser les lettres de A à Z et les chiffres de 0 à 9'
                ))
            )
        ))
        ->add('formsoustitre', TextType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'Attention, veuillez renseigner au minimum 3 caractères',
                    'max' => 150,
                    'maxMessage' => 'Attention, veuillez renseigner au maximmum 20 caractères'
                )),
                // new Assert\Regex(array(
                //     'pattern' => '/^[a-zA-Z-_0-9]+$/',
                //     'message' => 'Veuillez utiliser les lettres de A à Z et les chiffres de 0 à 9'
                //  ))
            )
        ))
        ->add('formdate', IntegerType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\Length(array(
                    'min' => 4,
                    'minMessage' => 'Attention, veuillez renseigner au minimum 4 caractères',
                    'max' => 4,
                    'maxMessage' => 'Attention, veuillez renseigner au maximmum 4 caractères'
                )),
                new Assert\Type(array(
                    'type' => 'integer',
                    'message' => 'Veuillez renseigner un chiffre'
                ))
            ), 
            'attr' => array(
                'placeholder' => 'Ex : 2020',
                'class' => 'form-control'
            )
        ))
        ->add('formdescription', TextType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'Attention, veuillez renseigner au minimum 3 caractères',
                    'max' => 200,
                    'maxMessage' => 'Attention, veuillez renseigner au maximmum 200 caractères'
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
            'data_class' => 'PORTFOLIO\Bundle\Entity\Formation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'portfolio_bundle_formation';
    }


}
