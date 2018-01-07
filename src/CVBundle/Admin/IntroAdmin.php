<?php


namespace CVBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class IntroAdmin extends AbstractAdmin {

    public function getDashboardActions() {
        $actions = parent::getDashboardActions();
        unset($actions['list']);
        unset($actions['create']);

        $actions['edit'] = [
            'label'              => 'Editer',
            'url'                => $this->generateUrl('edit', ['id' => 1]),
            'icon'               => 'edit',
            'translation_domain' => 'SonataAdminBundle', // optional
            'template'           => 'SonataAdminBundle:CRUD:dashboard__action.html.twig', // optional
        ];

        return $actions;
    }


    protected function configureFormFields(FormMapper $formMapper) {

        $formMapper
            ->add('titre', TextType::class, ['label' => 'Titre'])
            ->add('content', TextareaType::class, ['label' => 'Description']);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('titre')->add('content');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('titre', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Intro'
                ])
            ->add('content', 'text',
                [
                    'editable' => true,
                    'class' => 'CVBundle\Entity\Intro'
                ])
            ->add('_action', 'actions',
                [
                    'actions' => [
                        'edit' => [],
                        'delete' => []
                    ]
                ]);

        /**
         * ->add('is_valid', 'boolean',
        [
        'editable' => true,
        'class' => 'BlogBundle\Entity\Comment',
        'label' => 'Est Valide',
        'required' => false
        ])
         */



    }



}