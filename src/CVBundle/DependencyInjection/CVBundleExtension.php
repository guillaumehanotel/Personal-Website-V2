<?php
/**
 * Created by PhpStorm.
 * User: guillaumeh
 * Date: 07/01/18
 * Time: 01:52
 */

namespace CVBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class CVBundleExtension extends Extension {

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container) {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('app.path.competence_image', $config['upload_competence_dir']);
        $container->setParameter('app.path.realisation_image', $config['upload_realisation_dir']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }

}