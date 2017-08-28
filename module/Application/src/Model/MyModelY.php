<?php
// In this model example, we pass the $db from module.config.php, then we call functions without passing $db
namespace Application\Model;

class MyModelY {
    
    private $db;
    
    private $var = 1;
    
    public function __construct($db) {
        $this->db = $db;
        $this->var = 2;
    }
    
    public function func1($x) {
        return $x*10;
//        $result = $this->db->query('SELECT * FROM `users`', \Zend\Db\Adapter\Adapter::QUERY_MODE_EXECUTE);
//        readme($result->count());exit;
//        exit;
    }
    
    public function getVar() {
        return $this->var;
    }
    public function setVar($var) {
        $this->var = $var;
    }
    
}