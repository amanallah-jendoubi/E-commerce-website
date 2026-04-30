<?php

// src/Form/SignUpType.php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;

class SignUpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void //like a constructor function
    {
        $builder
            ->add('name', TextType::class, [ //the child part is used in twig by vars object that generates the id and the name for you (except the type)
                'label' => 'Name',
                'constraints' => [
                    new NotBlank(['message' => 'Name is required']),
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',//visible text label displayed above/beside the form field in the HTML output.
                'constraints' => [
                    new NotBlank(['message' => 'Email is required']),
                    new Email(['message' => 'Invalid email address']),
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Password',
                'constraints' => [
                    new NotBlank(['message' => 'Password is required']),
                    new Length(['min' => 6, 'minMessage' => 'Password must be at least 6 characters']),
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Create Account'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void //linking to entity
    {
        $resolver->setDefaults([
            'data_class' => User::class, // linked to User entity
        ]);
    }
}
