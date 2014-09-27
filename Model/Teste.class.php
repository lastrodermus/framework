<?php

require_once MODEL . 'Model.class.php';

class Teste extends Model {

    public function testar() {

        $this->conectar('tb_teste');

    }

}
