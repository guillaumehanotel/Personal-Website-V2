<?php

namespace BlogBundle\DependencyInjection;

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
            ->scalarNode('upload_avatar_dir')
            ->defaultValue('/tmp/uploads')// or whatever default value
            ->end()
            ->end();

        return $treeBuilder;
    }

}