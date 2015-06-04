<?php

namespace JC\ZencoderApiClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('jc_zencoder_api_client');

        $root_node
            ->children()
                ->scalarNode('secret')
                ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('host')
                    ->defaultValue('api.zencoder.com')
                    ->cannotBeEmpty()
                ->end()
                ->booleanNode('debug')
                    ->beforeNormalization()
                        ->always()
                        ->then(function ($value) { return (bool) $value; })
                    ->end()
                    ->defaultFalse()
                ->end()
                ->scalarNode('ca_path')
                    ->defaultValue(null)
                ->end()
                ->scalarNode('ca_file')
                    ->defaultValue(null)
                ->end();

        return $tree_builder;
    }
}