<?php

require_once 'config/constantes.php';
require_once 'config/config.php';
require_once VIEW . 'View.class.php';
require_once VIEW . 'templates/Template.class.php';
require_once CONTROLLER . 'Controller.class.php';
//recebe os dados da url
if (isset($_GET['q']))
    $q = $_GET['q'];
else
    $q = null;
$parametros = '';
$argumentos = '';

//determina a posi��o da primeira / para separar o Controller dos Argumentos e 
//M�todo.
$posicaoController = strpos($q, '/');
if ($posicaoController) {
    $controller = substr($q, 0, $posicaoController);
    $parametros = substr($q, $posicaoController + 1);
}
else
    $controller = $q;

//Formata a chamada do Controller para que fique no padrão NomeNomeController
$espaco = str_replace('_', ' ', $controller);
$str = ucwords($espaco);
$strC = str_replace(' ', '', $str) . 'Controller';
if($strC == 'Controller')
    $strC = 'HomeController';

//determina a posi��o da primeira / dos par�metros para separar Método de 
//Argumentos.
$posicaoMetodo = strpos($parametros, '/');
if ($posicaoMetodo) {
    $metodo = substr($parametros, 0, $posicaoMetodo);
    $argumentos = substr($parametros, $posicaoMetodo + 1);
}
else
    $metodo = $parametros;

//Formata a chamada do método para que fique no padrão nomeMetodo
$posicaoUnder = strpos($metodo, '_');
if ($posicaoUnder) {
    $espP = str_replace('_', ' ', $metodo);
    $upPalavras = ucwords($espP);
    $palavraMetodo = str_replace(' ', '', $upPalavras);
}
else
    $palavraMetodo = $metodo;

$method = 'get' . $palavraMetodo;

$args = str_replace('/', ',', $argumentos);

$erroPagina = false;

if (file_exists(CONTROLLER . $strC . '.class.php')) {
    require_once CONTROLLER . $strC . '.class.php';
    $con = new $strC($argumentos);
    
    if ($method != 'get') {
        if (method_exists($con, $method))
            $con->$method();
        else
            $erroPagina = true;
    }
    else{
        $con->getHome();
    }
} else {
    $erroPagina = true;
}

if ($erroPagina) {
    require_once CONTROLLER . 'HomeController.class.php';
    $con = new HomeController();
    $con->getNotFound();
}