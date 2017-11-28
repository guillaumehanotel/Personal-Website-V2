<?php

namespace BlogBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class PostAdmin extends AbstractAdmin {


    protected function configureFormFields(FormMapper $formMapper) {

        $formMapper
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('content', TextareaType::class, ['label' => 'Contenu'])
            ->add('User', null, ['label' => 'Utilisateur']);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('title')->add('content');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('title')->add('content');
    }

}