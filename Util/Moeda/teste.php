<?php

require 'Moeda.class.php';

$valor = '1.000,01';

$valor2 = '2000,00';

$valor3 = '100,00';

$valor4 = '5555,22';

$m = new Moeda();
$m->setMoeda($valor3);
$m->convertCurrencyToDouble();
echo $m->getMoeda();
$m->convertDoubleToCurrency();
echo "<br>" . $m->getMoeda();
$m->convertCurrencyToDouble();
echo "<br>" . $m->getMoeda();
$m->convertDoubleToCurrency(true);
echo "<br>" . $m->getMoeda();