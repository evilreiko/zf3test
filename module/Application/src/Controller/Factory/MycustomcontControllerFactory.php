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
        
        // pass db connection to controller
        // this will return to the Mycustomcont Controller at the constructor, which from here to there, you can pass any parameters
        //return new MycustomcontController(
        //    $container->get(\Zend\Db\Adapter\Adapter::class)
        //);
        
        // pass db connection and renderer(used to fetch a view's html inside the controller) to controller
        $db = \Zend\Db\Adapter\Adapter::class;
        $renderer = $container->get('Zend\View\Renderer\PhpRenderer');
        $controller = new MycustomcontController($db, $renderer);
        return $controller;
    }
}