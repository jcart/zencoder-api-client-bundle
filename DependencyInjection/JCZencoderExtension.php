<?php

namespace JC\ZencoderApiClientBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class JCZencoderApiClientExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('jc_zencoder_api_client.secret', $config['secret']);
        $container->setParameter('jc_zencoder_api_client.host', $config['host']);
        $container->setParameter('jc_zencoder_api_client.debug', $config['debug']);
        $container->setParameter('jc_zencoder_api_client.ca_path', $config['ca_path']);
        $container->setParameter('jc_zencoder_api_client.ca_file', $config['ca_file']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
