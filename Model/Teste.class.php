<?php

require_once DAO . 'TesteDAO.class.php';

class Teste {

    public function testar() {

//        $b = true; $n = 17; $no = 'Olá'; $de = 'descrição'; $cd = 17.23;
//        $t = new TesteDAO();
//        $t->set_f_booleano($b);
//        $t->set_f_nome($no);
//        $t->set_f_numero($n);
//        $t->set_f_descr($de);
//        $t->set_f_casa_decimal($cd);
//        
//        $where = 'id = 2';
//        
//        $t->inserir($t);
//        $t->atualizar($obj, $where);
//        $t->deletar($where);
        
//        $dao = new ConcreteDAO($t->get_table());
//        $dao->insert($t);
        $id = 2;
        $t = new TesteDAO();
        $t->set_f_id(2);
        $t->set_f_nome('');
        $x = $t->getAllObjects($t);
        var_dump($x);
        //echo $t->get_f_nome();
    }

}
