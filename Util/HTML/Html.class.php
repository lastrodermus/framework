<?php

class Html {

    private $tag;
    private $close;
    private $marcacao;
    private $conteudo = null;

    public function __construct($tag, $fechamento = true) {
        $this->tag = '<' . $tag;
        if ($fechamento) {
            $this->close = "</$tag>";
            $this->marcacao = ">";
        } else {
            $this->close = " />";
            $this->marcacao = "";
        }
    }

    public function setConteudo($conteudo) {
        $this->conteudo .= $conteudo;
    }

    public function setParameters(array $parametros) {
        foreach ($parametros as $atributo => $valor) {
            $this->tag .= ' ' . $atributo . '="' . $valor . '"';
        }
    }

    public function getTag() {
        if($this->conteudo)
            $html = $this->tag . $this->marcacao . $this->conteudo . $this->close;
        else
            $html = $this->tag . $this->marcacao . $this->close;
        return $html;
    }

}
