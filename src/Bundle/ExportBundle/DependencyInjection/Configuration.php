<?php

declare(strict_types=1);

namespace App\Bundle\ExportBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    private $kernelProjectDir;

    public function __construct(string $kernelProjectDir)
    {
        $this->kernelProjectDir = $kernelProjectDir;
    }

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $builder = new TreeBuilder('export');

        $builder->getRootNode()
            ->children()
                ->scalarNode('export_path')->defaultValue($this->kernelProjectDir . '/exports')
            ->end();

        return $builder;
    }
}
