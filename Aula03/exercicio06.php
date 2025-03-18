<?php
//Crie uma função que gere e retorne um array com 10 números aleatórios.
function geradornum(){
    $vetor = array();
    for ($i=0; $i < 9; $i++) { 
        $vetor[$i]= rand (0,100);
    }
    return $vetor;
}
$recebe = geradornum();
print_r($recebe);
?>