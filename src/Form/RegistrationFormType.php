<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('full_name')
            ->add('full_name', TextType::class,[
                'label' => 'full_name',
                'attr' => ['placeholder' => 'full_name'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vous devez entrer votre nom et prénom',
                    ]),
                ],
            ])
            ->add('username', TextType::class,[
                'label' => 'Pseudo',
                'attr' => ['placeholder' => 'Pseudo'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vous devez entrer un pseudo',
                    ]),
                ],
            ])
            ->add('email', EmailType::class,[
                'label' => 'Email',
                'attr' => ['placeholder' => 'Email'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vous devez entrer un Email',
                    ]),
                ],
            ])

            ->add('plainPassword', RepeatedType::class, [
                'mapped' => false,
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passes doivent être identiques.',
//                'options' => ['attr' => ['class' => 'password-field']],
//                'required' => true,
                'first_options'  => ['attr' => ['placeholder' => 'Mot de passe']],
                'second_options' => ['attr' => ['placeholder'  => 'Confirmer le mot de passe']],
//                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
