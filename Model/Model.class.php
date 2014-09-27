<?php

require_once BD . 'Insert.class.php';
require_once BD . 'Update.class.php';
require_once BD . 'Delete.class.php';
class Model {
    protected function conectar($tabela){
        $i = new Delete($tabela);
        return $i->deletar('id = 3');

    }
}
