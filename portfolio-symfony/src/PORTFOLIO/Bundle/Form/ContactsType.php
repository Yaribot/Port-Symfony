<?php

namespace PORTFOLIO\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Validator\Constraints as Assert;

class ContactsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom', TextType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'Attention, veuillez renseignerau minimum 3 caractères',
                    'max' => 30,
                    'maxMessage' => 'Attention, veuillez renseignerau maximmum 30 caractères'
                )),
            )
        ))
        ->add('prenom', TextType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
                new Assert\Length(array(
                    'min' => 3,
                    'minMessage' => 'Attention, veuillez renseignerau minimum 3 caractères',
                    'max' => 30,
                    'maxMessage' => 'Attention, veuillez renseignerau maximmum 30 caractères'
                )),
            )
        ))
        ->add('email', EmailType::class, array(
            'required' => false, 
            'constraints' => array(
                new Assert\NotBlank(array(
                    'message' => 'Attention, veuillez renseigner ce champs !'
                )),
            )
        ))
        ->add('message', TextareaType::class, array(
            'required' => false, 
            'constraints' => array()
        ))
        ->add('Enregistrer', SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PORTFOLIO\Bundle\Entity\Contacts'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'portfolio_bundle_contacts';
    }


}
