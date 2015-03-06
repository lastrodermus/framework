<?php

require_once BD . 'Insert.class.php';
require_once BD . 'Update.class.php';
require_once BD . 'Delete.class.php';
require_once BD . 'Select.class.php';

class ConcreteDAO {

    private $table;
    private $fields = array();
    private $values = array();

    public function __construct($table) {
        $this->table = $table;
    }

    protected function getAll($obj) {
        $this->setFields($obj);
        $select = new Select($this->table, $this->fields);
        return $select->selectAll();
    }

    protected function getById($obj, $id) {
        $this->setFields($obj);
        $select = new Select($this->table, $this->fields);
        return $select->selectById($id);
    }

    protected function getByParameter(array $fields, array $values) {
        
    }

    private function setFields($obj) {
        foreach ($obj as $field => $value) {
            if (strstr($field, 'f_'))
                array_push($this->fields, str_replace('f_', '', $field));
        }
    }
    
    private function setValues($obj) {
        foreach ($obj as $field => $value) {
            if (strstr($field, 'f_'))
                array_push($this->values, utf8_decode($value));
        }
    }

    protected function insert($obj) {
        $this->setFields($obj);
        $this->setValues($obj);
        $insert = new Insert($this->table, $this->fields, $this->values);
        $insert->inserir();
    }

    protected function update($obj, $where) {
        $this->setFields($obj);
        $this->setValues($obj);
        $update = new Update($this->table, $this->fields, $this->values);
        $update->atualizar($where);
    }

    protected function delete($where) {
        $delete = new Delete($this->table);
        $delete->deletar($where);
    }

}
