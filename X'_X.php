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
$mensaje = $_GET['mensaje'] ?? "";
$res = $mensaje !== "" ? Cada2ConsonantesInv($mensaje) : null;
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Problema 197</title>
</head>
<body>
    <form>
        <textarea name="mensaje" required><?= htmlspecialchars($mensaje) ?></textarea>
        <button type="submit">Enviar</button>
    </form>

    <?php if ($res !== null): ?>
        <pre><?= htmlspecialchars($res) ?></pre>
    <?php endif; ?>
</body>
</html>