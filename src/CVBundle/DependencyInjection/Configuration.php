<?php
/**
 * Created by PhpStorm.
 * User: guillaumeh
 * Date: 07/01/18
 * Time: 01:47
 */

namespace CVBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('root');

        $rootNode
            ->children()
            ->scalarNode('upload_realisation_dir')
            ->defaultValue('/tmp/uploads')// or whatever default value
            ->end()
            ->end();

        $rootNode
            ->children()
            ->scalarNode('upload_competence_dir')
            ->defaultValue('/tmp/uploads')// or whatever default value
            ->end()
            ->end();



        return $treeBuilder;
    }
}