<?php
 //Crie uma função que receba um array de 
 // números e retorne a soma de seus elementos.
    function somaArray($array){
        $soma = 0;
        foreach($array as $valor){
            $soma += $valor;
        }
        return $soma;
    }
    $numeros = array(1, 2, 3, 4, 5);
    echo "A soma dos elementos do array é: " . somaArray($numeros);
?>