<?php

declare(strict_types=1);

namespace App\Bundle\ExportBundle\DependencyInjection;

use App\Bundle\ExportBundle\Command\ExportCommand;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use function dirname;

final class ExportExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration(
            $this->getConfiguration($configs, $container),
            $configs
        );

        $loader = new YamlFileLoader(
            $container,
            new FileLocator(dirname(__DIR__) . '/Resources/config')
        );

        $loader->load('services.yaml');

        $container
            ->getDefinition(ExportCommand::class)
            ->setArgument('$exportPath', $config['export_path']);
    }

    public function getConfiguration(array $config, ContainerBuilder $container)
    {
        return new Configuration($container->getParameter('kernel.project_dir'));
    }
}
