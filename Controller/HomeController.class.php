<?php

class HomeController extends Controller {

    public function __construct($urlParameters = null) {
        parent::__construct($urlParameters);
    }

    public function getHome() {
        
//        
//          $view = new View('home');
//          echo $view->getPage();
//        $parameters = array('p1' => 'a', 'p2' => 'b');
//        $params = $this->changeToArray($parameters);
//        echo $view->getPage($params);
        require_once MODEL . 'Teste.class.php';
        $t = new Teste();
        
        var_dump($t->testar());
        
    }

}