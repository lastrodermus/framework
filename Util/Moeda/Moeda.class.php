<?php

class Moeda {

    private $moeda;

    private function removeDotComma() {
        $a = explode(',', $this->moeda);

        $parteInteira = str_replace('.', '', $a[0]);

        return "$parteInteira.$a[1]";
    }
    
    private function addDotComma(){
        $a = explode('.', $this->moeda);
        $comprimentoInteiro = strlen($a[0]);
        $posicao = array();
        for($i = 0; $i <= $comprimentoInteiro; $i++){
            $posicao[$i] = substr($a[0], $i, 1);
        }
        $reverso = array_reverse($posicao);
        $valor = '';
        for($j = $comprimentoInteiro; $j >= 0; $j--){
            if($j % 3 == 0 && $j <> 0 && $j <> $comprimentoInteiro)
                $valor .= '.';
            $valor .= $reverso[$j];
        }
        $this->moeda = "$valor,$a[1]";
    }

    public function setMoeda($moeda) {
        $this->moeda = $moeda;
    }

    public function getMoeda() {
        return $this->moeda;
    }

    public function convertCurrencyToDouble() {
        if (strstr($this->moeda, '.') && strstr($this->moeda, ',')) {
            $this->moeda = $this->removeDotComma();
        } else {
            $this->moeda = str_replace(',', '.', $this->moeda);
        }
    }

    public function convertDoubleToCurrency($milhar = false){
        if($milhar){
            $this->addDotComma($this->moeda);
        }
        else{
            $this->moeda = str_replace('.', ',', $this->moeda);
        }
    }
}
