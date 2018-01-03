<?php

namespace CVBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('nom', TextType::class,
                [
                    'attr' => ['placeholder' => 'Nom'],
                    'constraints' => [new NotBlank(['message' => 'Veuillez fournir un \'Nom\''])]
                ])
            ->add('email', EmailType::class,
                [
                    'attr' => ['placeholder' => 'Adresse Mail'],
                    'constraints' => [
                        new NotBlank(['message' => 'Veuillez fournir une \'Adresse Mail\'']),
                        new Email(['message' => 'Votre Adresse Mail n\'est pas valide'])
                    ]
                ])
            ->add('sujet', TextType::class,
                [
                    'attr' => ['placeholder' => 'Sujet'],
                    'constraints' => [new NotBlank(['message' => 'Veuillez fournir un \'Sujet\''])]
                ])
            ->add('message', TextareaType::class,
                [
                    'attr' => ['placeholder' => 'Votre message', 'rows' => 6],
                    'constraints' => [new NotBlank(['message' => 'Veuillez fournir un \'Message\''])]
                ]);


    }

    public function setDefaultOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'error_bubbling' => true
        ));
    }

    public function getName() {
        return 'contact_form';
    }


}