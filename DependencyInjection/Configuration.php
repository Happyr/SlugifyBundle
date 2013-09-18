<?php

namespace HappyR\SlugifyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode=$treeBuilder->root('happy_r_slugify');

        $rootNode
            ->children()
            ->booleanNode('twig')->defaultTrue()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
