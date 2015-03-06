<?php
require_once BD . 'BD.class.php';

class Delete extends BD{
    public function __construct($table) {
        parent::__construct($table);
    }
    
    public function deletar($where){
        $sql = 'DELETE FROM ' . $this->getTable();
        $sql .= ' WHERE ' . $where . ';';
        $c = Conexao::open();
        $stmt = $c->prepare($sql);
        try{
            $c->beginTransaction();
            $stmt->execute();
            $c->commit();

        } catch (Exception $ex) {
            $c->rollBack();
            print_r($ex->getMessage());
        }
    }
}
