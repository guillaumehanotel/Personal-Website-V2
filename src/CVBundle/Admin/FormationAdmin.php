<?php

namespace CVBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class FormationAdmin extends AbstractAdmin {

    public function getDashboardActions() {
        $actions = parent::getDashboardActions();
        unset($actions['list']);
        return $actions;
    }


    protected function configureFormFields(FormMapper $formMapper) {

        $formMapper
            ->add('anneeDebut', DateType::class, ['label' => 'Année Début'])
            ->add('anneeFin', DateType::class, ['label' => 'Année Fin'])
            ->add('anneeCourante', TextType::class, ['label' => 'Année courante'])
            ->add('intitule', TextType::class, ['label' => 'Intitulé'])
            ->add('ecole', TextType::class, ['label' => 'Ecole'])
            ->add('ville', TextType::class, ['label' => 'Ville'])
            ->add('codepostal', NumberType::class, ['label' => 'Code postal'])
            ->add('description', TextareaType::class, ['label' => 'Description'])
            ->add('lien', TextType::class, ['label' => 'Lien']);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('anneeDebut')
            ->add('anneeFin')
            ->add('anneeCourante')
            ->add('intitule')
            ->add('ecole')
            ->add('ville')
            ->add('codepostal')
            ->add('description')
            ->add('lien');

    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('anneeDebut', 'date',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Formation'
                ])
            ->add('anneeFin', 'date',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Formation'
                ])
            ->add('anneeCourante', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Formation'
                ])
            ->add('intitule', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Formation'
                ])
            ->add('ecole', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Formation'
                ])
            ->add('ville', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Formation'
                ])
            ->add('codepostal', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Formation'
                ])
            ->add('description', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Formation'
                ])
            ->add('lien', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Formation'
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