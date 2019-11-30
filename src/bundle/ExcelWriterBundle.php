<?php


namespace ExcelWriterBundle;


use ExcelWriterBundle\DependencyInjection\ExcelWriterExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ExcelWriterBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new ExcelWriterExtension();
    }
}