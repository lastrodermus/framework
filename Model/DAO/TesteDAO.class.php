<?php

                                require_once DAO . "ConcreteDAO.class.php";
                                class TesteDAO extends ConcreteDAO{
                                    private $all;
                                    public function __construct() {
                                        parent::__construct("tb_teste");
                                        $this->all = array();
                                    }
                                public function set_f_id($value){$this->f_id = $value;}public function get_f_id(){return $this->f_id;}public function set_f_booleano($value){$this->f_booleano = $value;}public function get_f_booleano(){return $this->f_booleano;}public function set_f_numero($value){$this->f_numero = $value;}public function get_f_numero(){return $this->f_numero;}public function set_f_nome($value){$this->f_nome = $value;}public function get_f_nome(){return $this->f_nome;}public function set_f_descr($value){$this->f_descr = $value;}public function get_f_descr(){return $this->f_descr;}public function set_f_casa_decimal($value){$this->f_casa_decimal = $value;}public function get_f_casa_decimal(){return $this->f_casa_decimal;}public function inserir($obj){$this->insert($obj);}public function atualizar($obj, $where){$this->update($obj, $where);}public function deletar($where){$this->delete($where);}private function setObject($array) {
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
    }}