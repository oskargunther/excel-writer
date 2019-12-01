<?php


namespace ExcelWriterBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $config = new TreeBuilder();

        $config
            ->root('excel_writer')
            ->children()->end();

        return $config;
    }
}