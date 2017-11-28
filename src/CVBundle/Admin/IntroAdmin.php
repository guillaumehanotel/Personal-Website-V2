<?php


namespace CVBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class IntroAdmin extends AbstractAdmin {


    protected function configureFormFields(FormMapper $formMapper) {

        $formMapper
            ->add('titre', TextType::class, ['label' => 'Titre'])
            ->add('content', TextareaType::class, ['label' => 'Description']);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('titre')->add('content');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('titre')->add('content');
    }



}