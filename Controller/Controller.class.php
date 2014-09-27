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
    
    protected function changeToArray($parameters = null){
        $url = array();
        $params = array();
        $urlArray = array();
        if($this->urlParameters){
            var_dump($url);
            var_dump($this->urlKeys);
            $urlArray = array_combine($this->urlKeys, $this->urlParameters);
        }
        return array_merge($urlArray, $parameters);
    }
    
}
