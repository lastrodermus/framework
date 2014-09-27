<style>
    td{width: 90px; height: 90px; text-align: center; font-size: 20px;}
    td.even{background: #ccc;}
    td.odd{background: #777;}
    div{width: 80px; height: 80px; position: relative; left: 4px;}
    div.white{border: 1px #fff solid; color: #fff;}
    div.black{border: 1px #000 solid; color: #000;}
</style>
<script>
            
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("Text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
                
        var data = ev.dataTransfer.getData("Text");
        ev.target.appendChild(document.getElementById(data));
                
    }
            
</script>
<?php
require 'Html.class.php';
require 'Xadrez.class.php';

$table = new Html('table');
$tdStyle = '';
for ($i = 0; $i <= 7; $i++) {
    $tr = new Html('tr');
    for ($j = 0; $j <= 7; $j++) {
        if($i % 2 == 0){
            if($j % 2 == 0)
                $tdStyle = 'even';
            else
                $tdStyle = 'odd';
        }
        else{
            if($j % 2 == 0)
                $tdStyle = 'odd';
            else
                $tdStyle = 'even';
        }
        
        if($i == 0 || $i == 1 || $i == 6 || $i == 7){
            $d = Xadrez::getPeca($i, $j);
        }
        else{
            $d = '';
        }
        
        $td = new Html('td');
        $td->setParameters(array(
            'id' => 'td_' . $i . $j,
            'class' => $tdStyle,
            'ondrop' => 'drop(event)',
            'ondragover' => 'allowDrop(event)',
            
        ));
        $td->setConteudo($d);
        $tr->setConteudo($td->getTag());
    }
    $table->setConteudo($tr->getTag());
}
echo $table->getTag();
?>
