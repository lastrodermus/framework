<?php
require_once BD . 'BD.class.php';

class Update extends BD{

    private $setValues = '';
    
    public function __construct($table, $fields, $values) {
        parent::__construct($table, $fields, $values, 'Update');
    }
    
    public function atualizar($where){
        $sql = 'UPDATE ' . $this->getTable() . ' SET ';
        $sql .= $this->getValues();
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
