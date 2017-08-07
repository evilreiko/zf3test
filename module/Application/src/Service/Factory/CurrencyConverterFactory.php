<?php 
use Zend\ServiceManager\Factory\FactoryInterface;
use Application\Service\CurrencyConverter;

// Factory class
class CurrencyConverterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, 
                     $requestedName, array $options = null) 
    {
        // Create an instance of the class.
        $service = new CurrencyConverter();
        return $service;
    }
}