<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class FooController extends AbstractActionController
{
    const MY_CONST = 'MY_CONST_VAL';
    
    public function indexAction()
    {
        return new ViewModel();
    }
    
    public function barAction()
    {
        return new ViewModel(['someFooBarVar' => 'someFooBarVal']);      
    }
    
    public static function my_nonstatic_function($var) {
        return 'HELLO'.$var;
    }
    
    public static function MY_STATIC_FUNCTION($var) {
        return 'HELLO'.$var;
    }
}
