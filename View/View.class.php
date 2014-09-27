<?php

class View {

    private $fPage;
    private $page;

    public function __construct($pagina, $template = 'default') {
        $this->fPage = VIEW . $pagina . '.html';
        if (!file_exists($this->fPage))
            $this->fPage = VIEW . 'pagina_nao_encontrada.html';
        $temp = new Template($template);
        $this->page = $temp->getTemplate();
    }

    public function getPage($params = null) {
        $contents = file_get_contents($this->fPage);
        if ($params)
            foreach ($params as $chave => $valor)
                $contents = str_replace('{{' . $chave . '}}', $valor, $contents);

        $this->page = str_replace('{{PAGE}}', $contents, $this->page);
        return $this->page;
    }
}
