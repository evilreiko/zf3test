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

use Zend\Db\Adapter\Adapter;

class MycustomcontController extends AbstractActionController
{
    
    private $db;
    private $renderer;
    
    public function __construct($db, $renderer)
    {
        $this->db = $db;
        $this->renderer = $renderer;
    }

    public function indexAction()
    {
        // using the db in the controller
//        $stmt = $this->db->query('SELECT * FROM `users`');// returns statement, not result yet. returned: Zend\Db\Adapter\Driver\Pdo\Statement
//        $stmt->getSql();// to see the query
//        $result = $stmt->execute();// to execute the statment. returned: Zend\Db\Adapter\Driver\Pdo\Result
//        $result = $this->db->query('SELECT * FROM `users`', Adapter::QUERY_MODE_EXECUTE);// this will make the statement and execute, some dbs don't support preparation, so you can only exeecute directly
//        readme($result->count());// total result fetched (int)
//        readme($result->current());// current row selected (which is first row), if no row found will return null
//        readme($result->next());// bring next row (pointer moves forward). it will not return the row
//        readme($result->current());// current row selected (which is 2nd row), if no row found will return null
//        
//        $currentRow = $result->current();
//        
//        // get specific column from row (row is object)
//        readme($currentRow->id);
//        // or convert object to associative array first then use
//        $currentRowArr = (array)$currentRow;
//        readme($currentRowArr['id']);
//        exit;
        
        
        
        // using the renderer to fetch a view's html in the controller's action
        // WITHOUT layout
//        $secondView = $this->mycustomactAction();
//        //$secondView = $this->mycustomactAction(['myvar'=>'myval']);// my technique: (optionally) we can pass associative array of parameters in the action, but you must add that parameter in the action's function
//        $secondView->setTemplate('application/mycustomcont/mycustomact');// you can set the template here or in the action itself before returning the viewmodel
//        $html = $this->renderer->render($secondView/*, $arr*/);// returns the html of the view without the layout. zend technique: (optionally) we can pass 2nd parameter as associative array of variables for the action
//        readme($html);exit;
        
        // WITH layout
        $secondView = $this->mycustomactAction();
        $secondView->setTemplate('application/mycustomcont/mycustomact');// you can set the template here or in the action itself before returning the viewmodel
        $viewHtml = $this->renderer->render($secondView/*, $arr*/);// returns just the html of the view (without the layout yet)
        $fullHtml = $this->renderer->render('layout/layout', [
            'content' => $viewHtml,
        ]);// returns just the html of the layout (we pass the content of the layout as a variable to the layout! i guess we can pass more parameters of the layout here if we want)
        readme($fullHtml);exit;
        
        
        
        return new ViewModel();
    }
    
    public function mycustomactAction(/*$arr = null*/)// we're adding this so the action accepts our custom parameters we pass in the first action
    {
        $viewModel = new ViewModel(/*$arr*/);// $arr here is optionally we're adding it
        $viewModel->setTemplate('application/mycustomcont/mycustomact');// here, it's optional to set the template or not. but if fetched from another action, you must set the template of the viewmodel here before returning it or there after getting it
        return $viewModel;
        //return new ViewModel();
    }
}
