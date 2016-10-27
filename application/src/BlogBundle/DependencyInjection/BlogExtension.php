<?php

namespace BlogBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class BlogExtension
 * @package BlogBundle\DependencyInjection
 */
class BlogExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );

        $loader->load('di/event.listener.yml');
        $loader->load('di/entity.repository.yml');
        $loader->load('di/entity.manager.yml');
        $loader->load('di/entity.event.manager.yml');
        $loader->load('di/service.yml');
    }
}
