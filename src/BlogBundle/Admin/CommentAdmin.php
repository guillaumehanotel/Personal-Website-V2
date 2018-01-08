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
use Symfony\Component\Form\Extension\Core\Type\TextType;


class CommentAdmin extends AbstractAdmin {

    public function getDashboardActions() {
        $actions = parent::getDashboardActions();
        unset($actions['list']);
        return $actions;
    }

    protected function configureFormFields(FormMapper $formMapper) {

        $formMapper
            ->add('Post', null, ['label' => 'Article'])
            ->add('content', TextareaType::class, ['label' => 'Contenu'])
            ->add('User', null, ['label' => 'Utilisateur'])
            ->add('name', TextType::class, ['label' => 'Nom', 'required' => false])
            ->add('is_valid', CheckboxType::class, ['label' => 'Est valide', 'required' => false]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('User')
            ->add('date')
            ->add('name')
            ->add('is_valid');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('User')
            ->add('name')
            ->add('Post')
            ->add('content')
            ->add('date')
            ->add('is_valid', 'boolean',
                [
                    'editable' => true,
                    'class' => 'BlogBundle\Entity\Comment',
                    'label' => 'Est Valide',
                    'required' => false
                ])
            ->add('_action', 'actions',
                [
                    'actions' => [
                        'edit' => [],
                        'delete' => []
                    ]
                ]);
    }

}