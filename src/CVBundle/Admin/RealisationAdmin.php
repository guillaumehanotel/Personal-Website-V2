<?php

namespace CVBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;


class RealisationAdmin extends AbstractAdmin {

    public function getDashboardActions() {
        $actions = parent::getDashboardActions();
        unset($actions['list']);
        return $actions;
    }


    protected function configureFormFields(FormMapper $formMapper) {

        $formMapper
            ->add('titre', TextType::class, ['label' => 'Titre'])
            ->add('description', TextareaType::class, ['label' => 'Description'])
            ->add('link', TextType::class, ['label' => 'Link'])
            ->add('imageFile', 'file', ['label' => 'Image', 'required' => true]);


    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('titre')
            ->add('description')
            ->add('link');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('titre', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Realisation'
                ])
            ->add('description', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Realisation'
                ])
            ->add('link', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Realisation'
                ])
            ->add('imagePath')
            ->add('_action', 'actions',
                [
                    'actions' => [
                        'edit' => [],
                        'delete' => []
                    ]
                ]);
    }


}