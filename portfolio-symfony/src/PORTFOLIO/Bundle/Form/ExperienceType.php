<?php

namespace PORTFOLIO\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Constraints as Assert;

class ExperienceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('xpyear1', IntegerType::class, array(
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
        ->add('xpyear2', IntegerType::class, array(
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
        ->add('xpfunction', TextType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'Attention, veuillez renseigner au minimum 3 caractères',
                    'max' => 100,
                    'maxMessage' => 'Attention, veuillez renseigner au maximmum 100 caractères'
                ))
            )
        ))
        ->add('xpemployer', TextType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'Attention, veuillez renseigner au minimum 3 caractères',
                    'max' => 100,
                    'maxMessage' => 'Attention, veuillez renseigner au maximmum 100 caractères'
                ))
            )
        ))
        ->add('xpresume', TextType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'Attention, veuillez renseigner au minimum 3 caractères',
                    'max' => 250,
                    'maxMessage' => 'Attention, veuillez renseigner au maximmum 250 caractères'
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
            'data_class' => 'PORTFOLIO\Bundle\Entity\Experience'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'portfolio_bundle_experience';
    }


}
