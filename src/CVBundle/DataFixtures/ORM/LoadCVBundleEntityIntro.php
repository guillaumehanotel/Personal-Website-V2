<?php

namespace CVBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use CVBundle\Entity\Intro;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Generated by Webonaute\DoctrineFixtureGenerator.
 *
 */
class LoadCVBundleEntityIntro extends Fixture implements OrderedFixtureInterface, ContainerAwareInterface
{

    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }

    /**
     * Set loading order.
     *
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }


    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $manager->getClassMetadata(Intro::class)->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);

        $em = $this->container->get('doctrine')->getEntityManager();
        $em->getConnection()->exec('ALTER TABLE intro AUTO_INCREMENT = 1');

        $item1 = new Intro();
        $this->addReference('_reference_CVBundleEntityIntro1', $item1);
        $item1->setTitre("DÉVELOPPEUR JAVA JUNIOR | ÉTUDIANT EN INFORMATIQUE À INGÉSUP BORDEAUX");
        $item1->setContent("Sérieux et autonome, je suis actuellement en 2ème année de Bachelor à Ingésup Bordeaux. L'informatique est un domaine qui me passionne car la création et la logique sont au cœur de cette discipline en constante évolution, c'est également la transition pour le monde de demain. Je suis motivé pour apprendre toutes technologies qui me permettrait d'être polyvalent et de me professionnaliser dans le domaine. J'ai effectué 2 années de Licence Informatique à l'Université de La Rochelle. J'ai choisi d'approfondir et élargir mes compétences en intégrant Ingésup qui offre une formation très riche et intéressante.");

        $manager->persist($item1);

    
        $manager->flush();
    }

}
