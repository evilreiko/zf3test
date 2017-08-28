<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\MvcEvent;

class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    
    // ### CUSTOM ###
    // this is similar to module's init, but this is called AFTER all modules are dispatched, while init is called BEFORE
    public function onBootstrap($e)
    {
        $application = $e->getApplication();
        $config      = $application->getConfig();// this returns /Application/config/module.config.php
        //$view        = $application->getServiceManager()->get('ViewHelperManager');
        // You must have these keys in you application config
        //$view->headTitle($config['view']['base_title']);

        // This is your custom listener
        //$listener   = new Listeners\ViewListener();
        //$listener->setView($view);
        //$listener->attach($application->getEventManager());
        
        
        
        // My example of getting the db and passing it to our model
        $sm = $application->getServiceManager();// get service manager
        $db = $sm->get(\Zend\Db\Adapter\Adapter::class);// get db connection
        \Application\Model\MyModelX::staticFunc1($db);
        
        
        
        // we can register model in the service manager so later we can just directly use them
//        $mymodelyA = new \Application\Model\MyModelY($db);
//        $sm->setService(\Application\Model\MyModelY::class, $mymodelyA);
        // or like this for shorter: $sm->setService(\Application\Model\MyModelY::class, new \Application\Model\MyModelY($db));
        
        
        
        // or maybe better pass the entire service manager to the model instead of just the $db (if you want to use the service manager in the model), like this: 
        //new \Application\Model\MyModelY($sm);
        
        
        
        // the zend-way (best way) to use service manager setFactory and having custom factory for each model, like this:
//        $this->sm->setFactory(\Application\Model\MyModelZ::class, \Application\Model\Factory\MyModelZFactory::class);// just register all models in the bootstrap
//        $mymodelz = $this->sm->get(\Application\Model\MyModelZ::class);// now the object is created and retrieved
        
        
        
    }
    // ### CUSTOM ###
    
    // ### CUSTOM ###
    // optional
    // Switch layout for all controllers of this module
    // 
    // 
    // 
    // The "init" method is called on application start-up and 
    // allows to register an event listener.
    public function init(ModuleManager $manager)
    {
        // Get event manager.
        $eventManager = $manager->getEventManager();
        $sharedEventManager = $eventManager->getSharedManager();
        // Register the event listener method. 
        $sharedEventManager->attach(__NAMESPACE__, 'dispatch', 
                                    [$this, 'onDispatch'], 100);
    }
    
    // Event listener method.
    public function onDispatch(MvcEvent $event)
    {
        // Get controller to which the HTTP request was dispatched.
        $controller = $event->getTarget();
        // Get fully qualified class name of the controller.
        $controllerClass = get_class($controller);// example outout: "Application\Controller\IndexController" or "Application\Controller\FooController"
        // Get module name of the controller.
        $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));// example outout: "Application"
           
        // Switch layout only for controllers belonging to our module.
        if ($moduleNamespace == __NAMESPACE__) {
            $viewModel = $event->getViewModel();
            $viewModel->setTemplate('layout/layout2');
        }
    }
    // ### CUSTOM ###
    
    // ...
}
