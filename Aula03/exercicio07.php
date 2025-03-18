<?php
 //Crie uma função que receba um número e 
 // retorne seu fatorial.
 function Fatorial($num){
    $fatorial = 1;
    for ($i=1; $i <= $num ; $i++) { 
        $fatorial = $fatorial * $i;
    }
    return $fatorial;
 }
    $result = Fatorial(5);
    echo "O fatorial de 5 é: $result";
?>