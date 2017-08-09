<?php

namespace Application\Controller\Factory;

use Application\Controller\MycustomcontController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class MycustomcontControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // ContainerInterface $container is actually the service manager 
        
        // this will return to the Mycustomcont Controller at the constructor, which from here to there, you can pass any parameters
        return new MycustomcontController(
            $container->get(\Zend\Db\Adapter\Adapter::class)
        );
    }
}