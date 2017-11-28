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
            ->addIdentifier('anneeDebut')
            ->add('anneeFin')
            ->add('anneeCourante')
            ->add('intitule')
            ->add('ecole')
            ->add('ville')
            ->add('codepostal')
            ->add('description')
            ->add('lien');
    }

}