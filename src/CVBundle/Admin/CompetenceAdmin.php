<?php

namespace CVBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class CompetenceAdmin extends AbstractAdmin {

    public function getDashboardActions() {
        $actions = parent::getDashboardActions();
        unset($actions['list']);
        return $actions;
    }


    protected function configureFormFields(FormMapper $formMapper) {

        $formMapper
            ->add('intitule', TextType::class, ['label' => 'Intitulé'])
            ->add('imageFile', 'file', ['label' => 'Image', 'required' => true]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('intitule');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('intitule', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Competence'
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