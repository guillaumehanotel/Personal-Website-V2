<?php
/**
 * Created by PhpStorm.
 * User: guillaumeh
 * Date: 05/01/18
 * Time: 02:06
 */

namespace BlogBundle\Form;


use BlogBundle\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class CommentType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add('content', TextareaType::class,
                ['required' => true,
                    'attr' => ['placeholder' => 'Votre commentaire', 'rows' => 4]
                ])
            ->add('name', TextType::class,
                [
                    'attr' => ['placeholder' => 'Votre nom']
                ]);

    }

    public function setDefaultOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'error_bubbling' => true
        ));
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Comment::class,
        ));
    }


    public function getName() {
        return 'comment_form';
    }

}