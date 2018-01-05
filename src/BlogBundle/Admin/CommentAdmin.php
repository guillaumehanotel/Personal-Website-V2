<?php

namespace BlogBundle\Admin;

use BlogBundle\Entity\Post;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;


class CommentAdmin extends AbstractAdmin {


    protected function configureFormFields(FormMapper $formMapper) {

        $formMapper
            ->add('Post', null, ['label' => 'Article'])
            ->add('content', TextareaType::class, ['label' => 'Contenu'])
            ->add('User', null, ['label' => 'Utilisateur'])
            ->add('is_valid', CheckboxType::class, ['label' => 'Est valide', 'required' => false]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('content')->add('date')->add('is_valid');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('User')
            ->add('name')
            ->addIdentifier('content')
            ->add('date')
            ->add('is_valid', 'boolean',
                [
                    'editable' => true,
                    'class' => 'BlogBundle\Entity\Comment',
                    'label' => 'Est Valide',
                    'required' => false
                ]);
    }

}