<?php

class Template {
    private $xml;
    private $nome;
    private $template;
    public function __construct($template) {
        $this->xml = simplexml_load_file(CONFIG . 'template.xml');
        $this->nome = $template;
        $this->setTemplate();
    }
    
    private function setTemplate(){
        
        foreach ($this->xml as $templates){
            if($templates['nome'] == $this->nome){
                $template = VIEW . 'templates/' . $this->nome . '.html';
                $tContents = file_get_contents($template);
                foreach($templates->children()->view as $v){
                    $file = VIEW . 'templates/' . strtolower($v) . '.html';
                    $fContents = file_get_contents($file);
                    $tContents = str_replace('{{' . $v . '}}', $fContents, $tContents);
                }
                $this->template = $tContents;
                
            }
        }
    }
    
    public function getTemplate(){
        return $this->template;
    }
}
