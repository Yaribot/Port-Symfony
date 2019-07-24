<?php

namespace PORTFOLIO\Bundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
// use Symfony\Component\Form\Extension\Core\Type\IntegerType;


use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('ufirstname', TextType::class, array())
        ->add('ulastname', TextType::class, array())
        ->add('uemail', EmailType::class, array())
        // ->add('upassword', PasswordType::class, array())
        ->add('upseudo', TextType::class, array())
        // ->add('statut', IntegerType::class, array())
        ->add('Enregistrer', SubmitType::class);

        if($options['statut'] == 'admin')
        {
            $builder
                ->add('roles');
        }
        else
        {
            $builder
            ->add('upassword',PasswordType::class, array(
            'required' => false
            ));
        }
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PORTFOLIO\Bundle\Entity\User',
            'statut' => 'user'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'portfolio_bundle_user';
    }


}
