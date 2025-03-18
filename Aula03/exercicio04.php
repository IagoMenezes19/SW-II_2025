<?php
 //Crie uma função que receba um número e 
 // retorne a tabuada desse número (1 a 10).
function Multiplicacao($mult){
    for ($i=1; $i < 11 ; $i++) { 
        $resultado = $mult * $i ;
        echo "$mult X $i = $resultado". "<br>";
    }
}
$result = Multiplicacao(5);
 echo $result;
?>