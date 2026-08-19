<?php
#Questão 1
$numero = 1;
while($numero <= 50){
    echo "\n",$numero;
    $numero++;

}

echo "\n Fim da contagem.";

#Questão 2

 for($i = 1;$i<=30; $i++){
    
    $resto= $i % 2;
    if($resto == 0){
        echo "\n", $i , " - É Par";
    }else{
        echo "\n", $i , " - É Ímpar";
    }
 }

?>