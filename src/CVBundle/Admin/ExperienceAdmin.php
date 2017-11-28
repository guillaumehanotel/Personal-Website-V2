<?php
/**
 * Created by PhpStorm.
 * User: guillaumeh
 * Date: 28/11/17
 * Time: 10:30
 */

namespace CVBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;


class ExperienceAdmin extends AbstractAdmin {


    protected function configureFormFields(FormMapper $formMapper) {

        $formMapper
            ->add('dateDebut', DateType::class, ['label' => 'Date Début'])
            ->add('dateFin', DateType::class, ['label' => 'Date Fin'])
            ->add('ville', TextType::class, ['label' => 'Ville'])
            ->add('codepostal', NumberType::class, ['label' => 'Code postal'])
            ->add('intitule', TextType::class, ['label' => 'Intitulé'])
            ->add('description', TextareaType::class, ['label' => 'Description'])
            ->add('entreprise', TextType::class, ['label' => 'Entreprise'])
            ->add('type', TextType::class, ['label' => 'Type'])
            ->add('ordre', NumberType::class, ['label' => 'Ordre']);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
            ->add('dateDebut')
            ->add('dateFin')
            ->add('ville')
            ->add('codepostal')
            ->add('intitule')
            ->add('description')
            ->add('entreprise')
            ->add('type')
            ->add('ordre');

    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->addIdentifier('dateDebut')
            ->add('dateFin')
            ->add('ville')
            ->add('codepostal')
            ->add('intitule')
            ->add('description')
            ->add('entreprise')
            ->add('type')
            ->add('ordre');

    }

}