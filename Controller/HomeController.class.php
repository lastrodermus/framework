<?php
require_once MODEL . 'Teste.class.php';
require_once UTIL . 'CreateDAO.class.php';
class HomeController extends Controller {

    public function __construct($urlParameters = null) {
        parent::__construct($urlParameters);
    }

    public function getHome() {
                
        $view = new View('home');
        $parameters = array('x' => 'a');
        $list = 'XPTO';
        $val = array('olá', 'oi');
        
        $l = array('olá', 'combinar', 'item 3', 'item 4');
        $list2 = 'LISTA';
        
        $view->setList($list, $val);
        $view->setList($list2, $l);
        echo $view->getPage($parameters);
//        $t = new Teste();
//        $t->testar();
//        $d = new CreateDAO();
//        $d->criarDAO();
    }
}