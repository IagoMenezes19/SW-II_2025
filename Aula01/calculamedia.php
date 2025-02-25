<?php
    $nota1 = 7;
    $nota2 = 9;
    $nota3 = 5;

    $notafinal = ($nota1+ $nota2 + $nota3) / 3;

    if ($notafinal >= 6) {
        echo "Aprovado!";
    } 
    else {
        echo "Reprovado!";
    }
    
    echo "<br>";
    echo "A sua média é: ", round($notafinal);
?>