<?php
    function gera_aleatorio(){
        $vetor = array();
        for($i = 0; $i <= 9; $i++){
            rand(0,9);
            $vetor[$i] = rand(0,9);
        }  
        return $vetor;
    }
    $recebe_vetor = gera_aleatorio();
    print_r($recebe_vetor);
?>