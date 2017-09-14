<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\Router\Http\Method;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'application' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application/index[/:action]',// u can remove index if you don't want it, you can actually write anything here that will be your route
                    'defaults' => [
                        'controller' => Controller\IndexController::class,// or hardcoded string as "Application\Controller\IndexController"
                        'action'     => 'index',
                    ],
                ],
            ],
            
            
            // ### CUSTOM ###
            'applicationzzz' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/:foo[/:bar]',// or '/:foo' or '/xxx/:foo[/:bar]', values inside brackets are optional, and values starting with ":" are variables
                    'defaults' => [
                        'controller' => Controller\IndexController::class,// or hardcoded string as "Application\Controller\IndexController"
                        'action'     => 'index',
                    ],
                ],
            ],
            // ### CUSTOM ###
            
            
            
            // ### CUSTOM ###
            // TO ADD A CONTROLLER, ADD THIS..
            // This will add controller Foo which can be accessed in browser by /application/foo or /application/foo/index or application/foo/bar
            // Add this route for the FooController
            'foo' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application/foo[/:action]',// set the route to your controller to access the controller's actions. it can be '/foo[/:action]' or even anything
                    'defaults' => [
                        'controller'    => Controller\FooController::class,
                        'action'        => 'index',// default action if no action set in that route
                    ],
                ],
            ],
            // ### CUSTOM ###
            
            
            
            // ### CUSTOM ###
            // TO ADD A CONTROLLER, ADD THIS..
            // This will add controller Mycustomcont which can be accessed in browser by /application/mycustomcont or /application/mycustomcont/index or application/mycustomcont/mycustomact
            // Add this route for the MycustomcontController
            'mycustomcont' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application/mycustomcont[/:action]',// set the route to your controller to access the controller's actions. it can be '/mycustomcont[/:action]' or even anything
                    'defaults' => [
                        'controller'    => Controller\MycustomcontController::class,
                        'action'        => 'index',// default action if no action set in that route
                    ],
                ],
            ],
            // ### CUSTOM ###
            
            
            
            // ### CUSTOM ###
            // TO ADD A CONTROLLER, ADD THIS..
            // This will add controller Mycustomcontx which can be accessed in browser by /application/mycustomcontx or /application/mycustomcontx/index or application/mycustomcontx/mycustomactx
            // Add this route for the MycustomcontxController
            'mycustomcontx' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application/mycustomcontx[/:action]',// set the route to your controller to access the controller's actions. it can be '/mycustomcontx[/:action]' or even anything
                    'defaults' => [
                        'controller'    => Controller\MycustomcontxController::class,
                        'action'        => 'index',// default action if no action set in that route
                    ],
                ],
            ],
            // ### CUSTOM ###
            
            
            
            // ### CUSTOM ###
            'mycustomcontxa' => [// any "put" request to any route will be routed to MycustomcontxController's hiAction()
                'type'    => Method::class,
                'options' => [
                    'verb'     => 'put',// you can include comma for mulitple like "get,post,put"
                    'defaults' => [
                        'controller'    => Controller\MycustomcontxController::class,
                        'action'        => 'hi',
                    ],
                ],
            ],
            // ### CUSTOM ###
            
            
            // ### CUSTOM ###
            // adding child routes
            'mycustomcontxxx' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/application/mycustomcontx/myaction1',
                    'defaults' => [
                        'controller'    => Controller\MycustomcontxController::class,
                        'action'        => 'myaction1',
                    ],
                ],
                'may_terminate' => true,// this is required for route with "child_routes". If true, parent route alone will match + parent/child route will match (example ok routes: "/parent" + "/parent/child"). If false, parent route will not match, only parent/child route will match (example ok routes: "/parent/child")
                'child_routes' => [// 2 examples in 1:
                    // the first child will match "/application/mycustomcontx/myaction1" AND GET request, which will be handled by MycustomcontxController's myaction1Action()
                    'mycustomcontxsubxxx' => [// <<< name
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'get',
                            'defaults' => [
                                'controller'    => Controller\MycustomcontxController::class,//in child route, controller is optional if it's already same controller
                                'action'        => 'myaction1',
                                // if both controller and action are not given, it will take parent route
                            ],
                        ],
                    ],
                    // the 2nd child will match "/application/mycustomcontx/myaction1/sub" AND ANY request method, which will be handled by IndexController's myrefAction()
                    'subaction' => [
                        'type'    => Literal::class,
                        'options' => [
                            'route'    => '/sub',
                            'defaults' => [
                                'controller'    => Controller\IndexController::class,//in child route, controller is optional if it's already same controller
                                'action'        => 'myref',
                                // if both controller and action are not given, it will take parent route
                            ],
                        ],
                    ],
                ],
            ],
            // ### CUSTOM ###
            
            
            
            
            // ### CUSTOM ###
            'somerandomroutename' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/xxx/yyy/zzz',
                    'defaults' => [
                        'controller'    => Controller\IndexController::class,
                        'action'        => 'index',
                    ],
                ],
                'may_terminate' => false,// this is required for route with "child_routes". If true, parent route alone will match + parent/child route will match (example ok routes: "/parent" + "/parent/child"). If false, parent route will not match, only parent/child route will match (example ok routes: "/parent/child")
                'child_routes' => [// 2 examples in 1:
                    // the first child will match "/application/mycustomcontx/myaction1" AND GET request, which will be handled by MycustomcontxController's myaction1Action()
                    'somerandomroutenamewithget' => [// <<< name
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'get',
                            'defaults' => [
                                'controller'    => Controller\IndexController::class,//in child route, controller is optional if it's already same controller
                                'action'        => 'myget',
                                // if both controller and action are not given, it will take parent route
                            ],
                        ],
                    ],
                    'somerandomroutenamewithpost' => [// <<< name
                        'type' => Method::class,
                        'options' => [
                            'verb' => 'post',
                            'defaults' => [
                                'controller'    => Controller\IndexController::class,//in child route, controller is optional if it's already same controller
                                'action'        => 'mypost',
                                // if both controller and action are not given, it will take parent route
                            ],
                        ],
                    ],
                ],
            ],
            // ### CUSTOM ###
            
            
            
            // ### CUSTOM ###
            // TO ADD A CONTROLLER, ADD THIS..
            // This will add controller Mycontrollerwithservicemanager which can be accessed in browser by /application/mycontrollerwithservicemanager or /application/mycontrollerwithservicemanager/index or application/mycontrollerwithservicemanager/mycustomactx
            // Add this route for the MycontrollerwithservicemanagerController
            'mycontrollerwithservicemanager' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/application/mycontrollerwithservicemanager[/:action]',// set the route to your controller to access the controller's actions. it can be '/mycontrollerwithservicemanager[/:action]' or even anything
                    'defaults' => [
                        'controller'    => Controller\MycontrollerwithservicemanagerController::class,
                        'action'        => 'index',// default action if no action set in that route
                    ],
                ],
            ],
            // ### CUSTOM ###
            
            
            
            // ### CUSTOM ###
            // example route with variable id (there is no controller and action here, just an example for the route)
            'news' => [
                'type'    => Segment::class,
                'options' => [
                    'route'       => '/news[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        'controller' => 'news',
                        'action'     => 'index',
                    ],
                ],
            ],
            // ### CUSTOM ###
            
            
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            
            
            
            // ### CUSTOM ###
            // TO ADD A CONTROLLER, ADD THIS..
            Controller\FooController::class => InvokableFactory::class,
            // ### CUSTOM ###
            
            
            
            
            // ### CUSTOM ###
            // TO ADD A CONTROLLER, ADD THIS..
            // this controller will will add a custom factory for it so we can pass the db (from the service manager) to the controller, through custom controller's factory (1. from config, 2. to controller's factory 3. to controller's constructor 4. then we set it as a private variable and can use it in any action)
            Controller\MycustomcontController::class => Controller\Factory\MycustomcontControllerFactory::class,
            // ### CUSTOM ###
            
            
            
            
            // ### CUSTOM ###
            // TO ADD A CONTROLLER, ADD THIS..
            // this controller will will add a custom factory for it so we can pass the db (from the service manager) to the controller, WIHTOUT the need to add/use custom controller's factory
            Controller\MycustomcontxController::class => function($container) {// $container is actually the service manager
                //return new Controller\MycustomcontxController($container);// we can return the service manager
                return new Controller\MycustomcontxController(
                    $container->get(\Zend\Db\Adapter\Adapter::class)
                );// this will pass the db adapter to the controller's constructor
            },
            // ### CUSTOM ###
            
            
            
            
            // ### CUSTOM ###
            // TO ADD A CONTROLLER, ADD THIS..
            // this controller will will add a custom factory for it so we can pass the db (from the service manager) to the controller, WIHTOUT the need to add/use custom controller's factory
            Controller\MycontrollerwithservicemanagerController::class => function($container) {// $container is actually the service manager
                //return new Controller\MycontrollerwithservicemanagerController($container);// we can return the service manager
                return new Controller\MycontrollerwithservicemanagerController(
                    $container
                );// this will pass the entire service manager to the controller's constructor
            },
            // ### CUSTOM ###
            
                    
            
            
        ],
    ],
    'view_manager' => [
        
        
        // ### CUSTOM ###
        // in production, set display_not_found_reason & display_exceptions to false
        // ### CUSTOM ###
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        // ### CUSTOM ###
        // views for the errors
        // ### CUSTOM ###
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            // ### CUSTOM ###
            // views for the errors
            // ### CUSTOM ###
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        
        
        
        
        // ### CUSTOM ###
        // TO BE ABLE TO RETURN JSON, ADD THIS..
        'strategies' => [
            'ViewJsonStrategy',
        ],
        // ### CUSTOM ###
        
        
        
    ],
];
