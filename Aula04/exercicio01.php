<?php
 //a) Crie um array associativo chamado $pessoa com as seguintes chaves: 
 // nome,idade, cidade.
//b) Adicione uma nova chave chamada profissao ao array.
//c) Crie um array indexado chamado $amigos com os nomes de três amigos.
//d) Combine os arrays $pessoa e $amigos em um novo array chamado $dados.
//e) Exiba o conteúdo do array $dados usando print_r
$pessoa = array("nome" => "Vcin", "idade" => 17, "cidade" => "Ribeirão Pires");
$pessoa["profissao"] = "Lixeiro";
$amigos = array("Macaco", "Cin", "Chimpanze");
$dados = array_merge($pessoa, $amigos);
print_r($dados);
?>