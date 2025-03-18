<?php
//Crie um array com 10 números inteiros. Use um laço de repetição 
// para calcular a soma de todos os elementos do array e exiba o resultado
$numeros = [0,1,2,3,4,5,6,7,8,9];
$soma = 0;
for ($i=0; $i < 9; $i++) { 
    $soma += $numeros[$i];
}
echo "A soma dos números é: $soma";
?>