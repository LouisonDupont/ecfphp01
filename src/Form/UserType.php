<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class UserType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre adresse mail',
                'attr'  => [
                    'placeholder' => 'Merci de saisir votre adresse mail.',
                    'class' => 'form-control mb-3'
                ],
                'required'    => true
            ])
            ->add('password', RepeatedType::class, [
                'type'            => PasswordType::class,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identique',
                'required'        => true,
                'first_options'   => [
                    'label' => 'Mot de passe',
                    'attr'  => ['placeholder' => 'Merci de saisir votre mot de passe.',
                                'class' => 'form-control mb-3'
                    ]
                ],
                'second_options'  => [
                    'label' => 'Confirmez votre mot de passe',
                    'attr'  => ['placeholder' => 'Merci de confirmer votre mot de passe.',
                                'class' => 'form-control mb-3'
                    ]
                ]
            ])
            ->add('nom', TextType::class, [
                'label'       => 'Votre nom',
                'attr'        => [
                    'placeholder' => 'Merci de saisir votre nom.',
                    'class' => 'form-control mb-3'
                ],
                'required'    => true,
                'constraints' => new Length(
                    [
                        'min' => 2,
                        'max' => 50
                    ]
                )
            ])
            ->add('prenom', TextType::class, [
                'label'       => 'Votre prénom',
                'attr'        => [
                    'placeholder' => 'Merci de saisir votre prénom.',
                    'class' => 'form-control mb-3'
                ],
                'required'    => true,
                'constraints' => [
                    new Length(
                        [
                            'min' => 2,
                            'max' => 50
                        ]
                    )
                ]
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Votre numéro de téléphone',
                'attr'  => [
                    'placeholder' => 'Merci de saisir votre numéro de téléphone.',
                    'class' => 'form-control mb-3'
                ],
                'required'    => true
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Votre adresse',
                'attr'  => [
                    'placeholder' => 'Merci de saisir votre adresse.',
                    'class' => 'form-control mb-3'
                ],
                'required'    => true
            ])
            ->add('ville', TextType::class, [
                'label' => 'Votre ville',
                'attr'  => [
                    'placeholder' => 'Merci de saisir votre ville.',
                    'class' => 'form-control mb-3'
                ],
                'required'    => true
            ])
            ->add('codepostal', TextType::class, [
                'label' => 'Votre code postal',
                'attr'  => [
                    'placeholder' => 'Merci de saisir votre code postal.',
                    'class' => 'form-control mb-3'
                ],
                'required'    => true
            ])
            /*->add('createAt', DateTimeType::class, [
                'input' => 'datetime'
            ])*/
            /*->add('roles', CollectionType::class, [
               'entry_type' => "ROLE_CANDIDAT"
            ])*/
            ->add('register', SubmitType::class, [
                'label' => 'S\'inscrire',
                'attr' => [
                    'class' => 'alde_button'
                ],
            ]);
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
