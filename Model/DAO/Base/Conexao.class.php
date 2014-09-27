<?php

require_once BD . 'PdoConfig.class.php';

class Conexao {

    private $con;

    public static function open() {
        try {
            $con = new PdoConfig();
        } catch (Exception $e) {
            echo 'Erro de conexão: ' . $e->getMessage();
        }
        return $con;
    }

}
