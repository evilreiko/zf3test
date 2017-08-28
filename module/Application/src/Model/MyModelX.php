<?php
// In this model example, we pass the $db from controller (or from anywhere) to each function (since the class is abstract)
namespace Application\Model;

abstract class MyModelX {
    
    public static function staticFunc1($db) {
//        $result = $db->query('SELECT * FROM `users`', \Zend\Db\Adapter\Adapter::QUERY_MODE_EXECUTE);
//        readme($result->count());exit;
//        exit;
    }
    
}