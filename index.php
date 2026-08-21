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

 #Questão 3

  $numero2 = 10;

  for($i = 1; $i <= 10 ; $i++){

    $soma = $i * $numero2;
    
    echo "\n", $numero2 ,"x", $i ,"=",$soma;

  }

  #Questão 4
  $i = 0;
  $soma2 = 0;
  while($i <=100){
    

    $soma2 = $soma2 + $i;
    $i++;
  }

  echo "\n","Soma total:", $soma2;

  #Questão 5
  $numero4 = 2;
  if(($numero4 % 3) == 0 && ($numero4 % 5) == 0){
    echo "\n multiplo de 3 e 5";
  }elseif(($numero4 % 3) == 0){
    echo "\n multiplo de 3";
  }elseif(($numero4 % 5) == 0){
    echo "\n multiplo de 5";
  }else{
    echo"\nnão é múltiplo de nenhum dos dois.\n";
  }

  #Questão 6

  $a = 10;
  $b = 10;
  $c = 10;

  $maior = $a;
  if($maior < $b){

    $maior = $b;
    
  }if($maior < $c){

    $maior = $c;
    
  }else{
    echo"os numeros são iguais\n";
  }
  echo "o numero ",$maior, " é o maior";
  

?>