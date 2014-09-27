<?php
require_once BD . 'Conexao.class.php';

class BD {
    private $fields;
    private $values;
    private $table;

    public function __construct($table, $fields, $values) {
        $this->table = $table;
        $this->setFields($fields);
        $this->setValues($values);
    }
    
    protected function setFields(Array $fields){
        foreach ($fields as $f) {
            $this->fields .= $f . ',';
        }
        $this->fields = substr($this->fields, 0, strlen($this->fields) - 1);
    }
    
    protected function setValues(Array $values){
        foreach ($values as $v) {
            $this->values .= $this->checkType($v) . ',';
        }
        $this->values = substr($this->values, 0, strlen($this->values) - 1);
    }
    
    protected function setTable($table){
        
    }
    
    protected function getFields(){
        return $this->fields;
    }
    
    protected function getValues(){
        return $this->values;
    }
    
    protected function getTable(){
        return $this->table;
    }
    
    private function checkType($v) {
        $ret = $v;
        if (is_string($v))
            $ret = "'$v'";
        else if(is_bool($v)){
            if($v == '')
                $ret = 0;
            
        }

        return $ret;
    }

}
