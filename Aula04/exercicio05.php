<?php
//Crie um array associativo onde cada chave é o nome de um aluno e o valor é a sua
//nota.Use um laço de repetição para calcular a média das notas e exiba o resultado.
//Use for ou foreach para percorrer os arrays.
//Utilize funções como count() para determinar o tamanho do array.
//Para arrays associativos, lembre-se de acessar as chaves e valores corretamente.
$alunos = array("Da" => 7, "Pe" => 8, "Lu" => 6, "Wes" => 9, "Go" => 5);
$soma = 0;
foreach ($alunos as $nome => $nota) {
    $soma += $nota;
}
echo "A média das notas é: " . $soma / count($alunos);
?>