<?php

class View {

    private $fPage;
    private $page;
    private $list;
    private $contents;

    public function __construct($pagina, $template = 'default') {
        $this->fPage = VIEW . $pagina . '.html';
        if (!file_exists($this->fPage))
            $this->fPage = VIEW . 'pagina_nao_encontrada.html';
        $temp = new Template($template);
        $this->page = $temp->getTemplate();
        $this->list = array();
        $this->contents = file_get_contents($this->fPage);
    }

    public function getPage($params = null) {

        if ($params)
            foreach ($params as $chave => $valor)
                $this->contents = str_replace('{{' . $chave . '}}', $valor, $this->contents);

        foreach ($this->list as $list) {
            foreach ($list as $index => $value) {
                $this->contents = str_replace('{{' . $index . '}}', $value, $this->contents);
            }
        }

        $this->page = str_replace('{{PAGE}}', $this->contents, $this->page);
        return $this->page;
    }

}
