<?php

namespace BlogBundle\Admin;

use BlogBundle\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Model\UserManagerInterface;

class UserAdmin extends AbstractAdmin {

    public function getDashboardActions() {
        $actions = parent::getDashboardActions();
        unset($actions['list']);
        return $actions;
    }


    // protected $formOptions = ['validation_groups' => ['Profile']];

    public function preUpdate($object) {

        $Password = $object->getPassword();
        if (!empty($Password)) {
            $salt = md5(time());
            $encoderservice = $this->getConfigurationPool()->getContainer()->get('security.encoder_factory');
            $encoder = $encoderservice->getEncoder($object);
            $encoded_pass = $encoder->encodePassword($object->getPassword(), $salt);
            $object->setSalt($salt);
            $object->setPassword($encoded_pass);
        }
    }


    protected function configureFormFields(FormMapper $formMapper) {

        $passwordoptions = array('type' => 'password',
            'required' => true,
            'invalid_message' => 'The password fields must match.',
            'options' => array('attr' => array('class' => 'password-field')),
            'first_options' => array('label' => 'Password'),
            'second_options' => array('label' => 'Confirm password'),
            'translation_domain' => 'FOSUserBundle'
        );


        $formMapper
            ->add('firstname', TextType::class, ['label' => 'Prénom'])
            ->add('lastname', TextType::class, ['label' => 'Nom'])
            ->add('username', TextType::class, ['label' => 'Pseudo'])
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('password', 'repeated', $passwordoptions)
            ->add('imageFile', 'file', ['label' => 'Avatar', 'required' => false]);

        //->add('password', PasswordType::class, ['label' => 'Mot de Passe', 'required' => false]);
        //->add('roles', 'choice', array('choices'=>$this->getConfigurationPool()->getContainer()->getParameter('config.sonata_admin.security.roles')));


    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('username')
            ->add('lastname')
            ->add('firstname')
            ->add('email')
            ->add('password')
            ->add('roles');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
            ->add('username')
            ->add('lastname')
            ->add('firstname')
            ->add('email', 'email',
                [
                    'editable' => true,
                    'class' => 'BlogBundle\Entity\User'
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


    public function prePersist($object) {
        $Password = $object->getPassword();
        if (!empty($Password)) {
            $salt = md5(time());
            $encoderservice = $this->getConfigurationPool()->getContainer()->get('security.encoder_factory');
            $encoder = $encoderservice->getEncoder($object);
            $encoded_pass = $encoder->encodePassword($object->getPassword(), $salt);
            $object->setSalt($salt);
            $object->setPassword($encoded_pass);
        }
    }

}