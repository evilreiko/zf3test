<?php 
namespace Application\Model\Factory;
//use \Zend\ServiceManager\Factory\FactoryInterface;
//use \Application\Model\MyModelZ;

// Factory class
class MyModelZFactory implements /*FactoryInterface*/\Zend\ServiceManager\Factory\FactoryInterface
{
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null) {
        // Create an instance of the class.
        $mymodelz = new /*MyModelZ*/\Application\Model\MyModelZ(/*$param*/);// WE CAN PASS PARAMS IN THIS CONSTRUCTOR!
	// we can also play with this object before returning it!
        return $mymodelz;
    }
}