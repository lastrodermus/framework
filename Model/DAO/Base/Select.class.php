<?php
require_once BD . 'BD.class.php';

class Select extends BD{
    
    public function __construct($table, $fields) {
        parent::__construct($table, $fields, array(), 'Select');
    }
    
    private function getDatas($sql){
        $c = Conexao::open();
        try{
            return $c->query($sql);
        } catch (Exception $ex) {
            print_r($ex->getMessage());
        }
    }

    public function selectById($id){
        $sql = 'SELECT ' . $this->getFields() . ' FROM ' . $this->getTable();
        $sql .= ' WHERE id = ' . $id . ';';
        return $this->getDatas($sql);
    }
    
    public function selectAll(){
        $sql = 'SELECT ' . $this->getFields() . ' FROM ' . $this->getTable();
        return $this->getDatas($sql);
    }
}
