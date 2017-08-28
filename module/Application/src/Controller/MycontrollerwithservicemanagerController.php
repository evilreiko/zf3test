<?php
// this class demonstrate how to get the db connection set in the config and used in this controller WITH custom controller factory



/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MycontrollerwithservicemanagerController extends AbstractActionController
{
    
    private $sm;
    
    public function __construct($sm)
    {
        $this->sm = $sm;
        $this->db = $this->sm->get(\Zend\Db\Adapter\Adapter::class);// get $db connection
    }

    public function indexAction()
    {
        
        // method 1 (pure php)
        // normal way
        // create new MyModelY and pass the $db at the constructor. 
//        $mymodely = new \Application\Model\MyModelY($this->db);
//        readme($mymodely->func1(111));
//        exit;
        
        
        
        // method 2: pure php + register the object model and get it with service manager (aka was called zend registry)
        // the above line is ok, but with service manager we can avoid re-creating the object model again and again. just like zf1 zend registry (we create the object, and set it to registry, the get it when needed), and reuse the same object instead of recreating it
//        $mymodelyA = new \Application\Model\MyModelY($this->db);
//        readme($mymodelyA->getVar());// 2
//        $mymodelyA->setVar(3);// 2=>3
//        readme($mymodelyA->getVar());//3
//        $this->sm->setService(\Application\Model\MyModelY::class, $mymodelyA);// Save the instance to service manager.
//        $mymodelyB = $this->sm->get(\Application\Model\MyModelY::class);// $mymodelyB is the same object as $mymodely, not new object
//        readme($mymodelyB->getVar());//3
//        $mymodelyA->setVar(4);//3=>4
//        readme($mymodelyA->getVar());//4
//        readme($mymodelyB->getVar());//4
//        $this->xxx();// try getting the same object model from different function scope, which still works
//        
//        
//        readme('destroying');
//        unset($mymodelyA);
//        unset($mymodelyB);
//        $this->xxx();// (for 2nd time) try getting the same object model from different function scope, which still works. because the reference in service manager still exist
//        
//        
//        exit;
        
        
        
        
        // NOTE: maybe it's better to pass the service manager to the model constructor if you want to use it or register other models
//        $mymodelyA = new \Application\Model\MyModelY($this->sm);
        
        
        
        
        
        // method 1: create on get (but can't pass params to constructor)
        //$this->sm->setInvokableClass(\Application\Model\MyModelZ::class);// this is similar as setService() but without passing the object. the class is registered instead, but not instantiated yet. when you call the get() for first time, it will be created
        //$mymodelz = $this->sm->get(\Application\Model\MyModelZ::class);// now the object is created and retrieved
        // OR method 2: create on get (but can't pass params to constructor yet): you can rewrite the above line like this (method 2 is only here to show you how to do method 3):
        //$this->sm->setFactory(\Application\Model\MyModelZ::class, \Zend\ServiceManager\Factory\InvokableFactory::class);
        //$mymodelz = $this->sm->get(\Application\Model\MyModelZ::class);// now the object is created and retrieved
        // OR method 3: create on get + pass params to constructor: we will rewrite it like method 2 but use our own factory for this model, by doing this, we can inject dependencies (other classes) before/after creating the object, THEN we return the object
        //$this->sm->setFactory(\Application\Model\MyModelZ::class, \Application\Model\Factory\MyModelZFactory::class);
        //$mymodelz = $this->sm->get(\Application\Model\MyModelZ::class);// now the object is created and retrieved
        // USE METHOD 3 ALWAYS
        
        
        
        
        
        return new ViewModel();
    }
    
    public function xxx() {
        // try getting the same object model from different function scope, which still works
        $mymodelyC = $this->sm->get(\Application\Model\MyModelY::class);
        readme($mymodelyC->getVar());//4
        $mymodelyC->setVar(5);//4=>5
        readme($mymodelyC->getVar());//6
    }
}
