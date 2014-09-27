<?php

require_once DAO . 'ConcreteDAO.class.php';
class TesteDAO extends ConcreteDAO{
    public function __construct() {
        parent::__construct('tb_teste');
    }
}
