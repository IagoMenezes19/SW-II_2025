<?php
//Crie um array com 15 números inteiros. Use um laço de
// repetição para contar quantos números são pares e 
// quantos são ímpares. Exiba os resultados.
$num = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
foreach ($num as $n) {
    if ($n % 2 == 0) {
        $par[] = $n;
    } else {
        $impar[] = $n;
    }
}
echo "Números pares: " . count($par) . "<br>";
echo "Números ímpares: " . count($impar) . "<br>";
?>