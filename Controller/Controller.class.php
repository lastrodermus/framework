<?php

class Controller {
    protected $urlParameters;
    protected $urlKeys;
    public function __construct($urlParameters = null) {
        if($urlParameters)
            $this->urlParameters = explode ('/', $urlParameters);
        else
            $this->urlParameters = array();
    }    
}