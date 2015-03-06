<?php

require_once UTIL . 'CreateDAO.class.php';

class CreateDAOController extends Controller {

    public function __construct($urlParameters = null) {
        parent::__construct($urlParameters);
    }

    public function getCriar() {
    
        $d = new CreateDAO();
        $d->criarDAO();
        
    }
}
