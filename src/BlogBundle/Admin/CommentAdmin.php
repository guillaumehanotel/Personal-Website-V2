<?php

namespace BlogBundle\Admin;

use BlogBundle\Entity\Post;
use Sonata\AdminBundle\Admin\AbstractAdmin;
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
            ->add('User', null, ['label' => 'Utilisateur']);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('content')->add('date');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('content')->add('date');
    }

}