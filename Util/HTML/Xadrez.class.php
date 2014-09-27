<?php
require_once 'Html.class.php';
class Xadrez {
    public static function getPeca($i,$j){
        $peca = array();
        $peca[0][0] = $peca[0][7] = $peca[7][0] = $peca[7][7] = 'Tower';
        $peca[0][1] = $peca[0][6] = $peca[7][1] = $peca[7][6] = 'Knight';
        $peca[0][2] = $peca[0][5] = $peca[7][2] = $peca[7][5] = 'Bishop';
        $peca[0][3] = $peca[7][3] = 'Queen';
        $peca[0][4] = $peca[7][4] = 'King';
        
        $peca[1][0] = $peca[1][1] = $peca[1][2] = $peca[1][3] = $peca[1][4] = $peca[1][5] =
        $peca[1][6] = $peca[1][7] = 
        $peca[6][0] = $peca[6][1] = $peca[6][2] = $peca[6][3] = $peca[6][4] = $peca[6][5] =
        $peca[6][6] = $peca[6][7] = 'Pawn';

        if($i > 1)
            $class = 'white';
        else
            $class = 'black';
        $div = new Html('div');
            
            $div->setConteudo($peca[$i][$j]);
            $div->setParameters(array(
                 'draggable' => 'true',
                 'ondragstart' => 'drag(event)',
                 'id' => 'id_' . $i . '_' . $j,
                 'class' => $class
            ));
        
        return $div->getTag();
    }
}
