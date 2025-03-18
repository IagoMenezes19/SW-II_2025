<?php
//Crie um array com 8 números inteiros. 
// Use um laço de repetição para encontrar o
//maior e o menor valor no array e exiba ambos.
$numeros = [0,1,2,3,4,5,6,7];
$maior = sort($numeros);
$menor = rsort($numeros);   
echo "O maior número é: $maior e o menor número é: $menor";
?>