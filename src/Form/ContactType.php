<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'First name is required'])]
            ])
            ->add('lastName', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Last name is required'])]
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank(['message' => 'Email is required']),
                    new Email(['message' => 'Invalid email address']),
                ]
            ])
            ->add('subject', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Subject is required'])]
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [new NotBlank(['message' => 'Message is required'])]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Send Message'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}
