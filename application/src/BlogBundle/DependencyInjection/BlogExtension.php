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

        $loader->load('di/event-listener/entity.listener.yml');
        $loader->load('di/event-listener/entity.create.event.listener.yml');
        $loader->load('di/event-listener/entity.update.event.listener.yml');
        $loader->load('di/event-listener/entity.remove.event.listener.yml');

        $loader->load('di/entity-management/entity.repository.yml');
        $loader->load('di/entity-management/entity.manager.yml');
        $loader->load('di/entity-management/management.yml');

        $loader->load('di/service.yml');
    }
}
