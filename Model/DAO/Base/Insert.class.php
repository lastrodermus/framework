<?php

require_once BD . 'BD.class.php';

class Insert extends BD{

    public function __construct($table, $fields, $values) {
        parent::__construct($table, $fields, $values, 'Insert');
    }

    public function inserir() {
        $sql = 'INSERT INTO ' . $this->getTable() . ' (' . $this->getFields() . ') values (' . $this->getValues() . ');';
        $c = Conexao::open();
        $stmt = $c->prepare($sql);
        try{
            $c->beginTransaction();
            $stmt->execute();
            $id = $c->lastInsertId('id');
            $c->commit();
            return $id;

        } catch (Exception $ex) {
            $c->rollBack();
            print_r($ex->getMessage());
        }
        
    }
}
