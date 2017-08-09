<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
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
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            
            
            
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
            // example route with variable id (there is no controller and action here, just an example for the route)
            'news' => [
                'type'    => 'segment',
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
