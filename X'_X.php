<?php

function EsVocal($a){
    return strpos("aeiouAEIOU", $a) !==false; # Esto compara cada deltra con las vocales, si alguna lo es 
}

function Cada2ConsonantesInv($array){
    $a = str_split($array);
    $res = "";
    $grupo = "";

    foreach($a as $letra){
        if(EsVocal($letra)){
            $res .= strrev($grupo) . $letra; #invierte el grupo de letras
            $grupo = "";

        }else{
            $grupo .= $letra; #acumula consonantes
        }

    }

    $res .= strrev($grupo); #le da la vuelta a las dos ultimas consonantes si hay
    return $res;
    
}