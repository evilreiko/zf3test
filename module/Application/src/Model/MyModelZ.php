<?php
// In this model example without constructor params
namespace Application\Model;

class MyModelZ {
    
    private $var = 1;
    
    public function __construct() {
        //$this->db = $db;
        $this->var = 2;
        readme(222);
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