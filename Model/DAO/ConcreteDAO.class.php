<?php

require_once DAO . 'DAO.interface.php';
require_once BD . 'BD.class.php';

class ConcreteDAO implements DAO {

    private $table;

    public function __construct(string $table) {
        $this->table = $table;
    }

    public function deleteById(int $id) {
        
    }

    public function getAll() {
        
    }

    public function getById(int $id) {
        
    }

    public function getByParameter(array $fields, array $values) {
        
    }

    public function insert(Object $obj) {
        var_dump($obj);
    }

    public function update(Object $obj) {
        
    }

}
