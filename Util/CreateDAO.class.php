<?php

require_once BD . 'Conexao.class.php';

class CreateDAO {

    private $className;
    private $fileName;
    private $tableName;
    private $defaultString;
    private $endString = '}';
    private $con;
    private $attributes = array();
    private $settersGetters;
    private $fields;
    private $bdMethods;

    public function criarDAO(Array $tables = array()) {
        if (count($tables) > 0) {
            
        } else {
            $sql = 'SHOW TABLES';
        }
        $this->con = Conexao::open();
        $stmt = $this->con->prepare($sql);
        try {
            $this->con->beginTransaction();
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $r) {
                $this->createFile($r[0]);
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    private function createFile($table) {
        $this->tableName = $table;
        $this->setClassName($table);
        $this->setFileName();
        $this->setDefaultString();
        $this->setAttributes();
        $this->setSettersGettersString();
        $this->setBDMethods();
        if (!file_exists(DAO . $this->fileName)) {
            $this->makeFile();
        } else {
            unlink(DAO . $this->fileName);
            $this->makeFile();
        }
    }

    private function makeFile() {
        $handle = fopen(DAO . $this->fileName, 'x+');
        fwrite($handle, $this->getFileString());
        fclose($handle);
    }

    private function setAttributes() {
        unset($this->attributes);
        $sql = 'DESC ' . $this->tableName;
        $stmt = $this->con->prepare($sql);
        try {
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $r) {
                $this->attributes[] = 'f_' . $r[0];
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    private function setClassName($name) {
        $this->className = substr($name, 3);
        $this->className = str_replace('_', ' ', $this->className);
        $this->className = ucwords($this->className);
        $this->className = str_replace(' ', '', $this->className) . 'DAO';
    }

    private function setFileName() {
        $this->fileName = $this->className . '.class' . '.php';
    }

    private function setDefaultString() {
        $this->defaultString = '<?php

                                require_once DAO . "ConcreteDAO.class.php";
                                class ' . $this->className . ' extends ConcreteDAO{
                                    private $all;
                                    public function __construct() {
                                        parent::__construct("' . $this->tableName . '");
                                        $this->all = array();
                                    }
                                ';
    }

    private function setSettersGettersString() {
        $strSet = 'public function set_';
        $strGet = 'public function get_';
        $this->settersGetters = '';
        foreach ($this->attributes as $a) {
            $this->settersGetters .= $strSet . $a . '($value){'
                    . '$this->' . $a . ' = $value;'
                    . '}'
                    . $strGet . $a . '(){'
                    . 'return $this->' . $a . ';'
                    . '}';
        }
    }

    private function setFields() {
        $this->fields = 'private $fields = array(';
        foreach ($this->attributes as $a) {
            $this->fields .= "'" . $a . "', ";
        }
        $this->fields = substr($this->fields, 0, strlen($this->fields) - 1);
        $this->fields .= ');';
    }

    private function setBDMethods() {
        $this->bdMethods = 'public function inserir($obj){'
                . '$this->insert($obj);'
                . '}'
                . 'public function atualizar($obj, $where){'
                . '$this->update($obj, $where);'
                . '}'
                . 'public function deletar($where){'
                . '$this->delete($where);'
                . '}'
                . 'private function setObject($array) {
        foreach ($array as $field => $value) {
            if (!is_int($field)) {
                $strFunction = "set_f_" . $field;
                $this->$strFunction($value);
            }
        }
    }
    
    private function setArrayObject($array){
        $keys = array();
        $values = array();
        foreach ($array as $field => $value) {
            if (!is_int($field)) {
                $strFunction = "get_f_" . $field;
                $strKeys = "f_" . $field;
                array_push($keys, $strKeys);
                array_push($values, $this->$strFunction());
            }
        }
        array_push($this->all, array_combine($keys, $values));
    }

    public function getObject($obj) {
        $res = $this->getById($obj, $this->get_f_id());
        $this->setObject($res->fetch(PDO::FETCH_ASSOC));
    }

    public function getAllObjects($obj) {
        $res = $this->getAll($obj, $this->get_f_id());
        $r = $res->fetchAll();
        foreach ($r as $index => $result) {
            $this->setObject($result);
            $this->setArrayObject($result);
        }
        return $this->all;
    }';
    }

    private function getFileString() {
        $fileString = $this->defaultString
                . $this->fields
                . $this->settersGetters
                . $this->bdMethods
                . $this->endString;
        return $fileString;
    }

}
