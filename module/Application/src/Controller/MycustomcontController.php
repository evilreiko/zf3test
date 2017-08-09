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
    
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function indexAction()
    {
//        $stmt = $this->db->query('SELECT * FROM `users`');// returns statement, not result yet. returned: Zend\Db\Adapter\Driver\Pdo\Statement
//        $stmt->getSql();// to see the query
//        $result = $stmt->execute();// to execute the statment. returned: Zend\Db\Adapter\Driver\Pdo\Result
        $result = $this->db->query('SELECT * FROM `users`', Adapter::QUERY_MODE_EXECUTE);// this will make the statement and execute, some dbs don't support preparation, so you can only exeecute directly
        readme($result->count());// total result fetched (int)
        readme($result->current());// current row selected (which is first row), if no row found will return null
        readme($result->next());// bring next row (pointer moves forward). it will not return the row
        readme($result->current());// current row selected (which is 2nd row), if no row found will return null
        return new ViewModel();
    }
    
    public function mycustomactAction()
    {
        return new ViewModel();      
    }
}
