<?php

namespace BlogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class PostAdmin extends AbstractAdmin {

    public function getDashboardActions() {
        $actions = parent::getDashboardActions();
        unset($actions['list']);
        return $actions;
    }


    protected function configureFormFields(FormMapper $formMapper) {

        $formMapper
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('content', TextareaType::class, ['label' => 'Contenu'])
            ->add('User', null, ['label' => 'Utilisateur', 'required' => true]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('title')
            ->add('content')
            ->add('date');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('title', 'text',
                [
                    'editable' => true,
                    'class' => 'BlogBundle\Entity\Post'
                ])
            ->add('content', 'text',
                [
                    'editable' => true,
                    'class' => 'BlogBundle\Entity\Post'
                ])
            ->add('date', 'date',
                [
                    'editable' => true,
                    'class' => 'BlogBundle\Entity\Post'
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