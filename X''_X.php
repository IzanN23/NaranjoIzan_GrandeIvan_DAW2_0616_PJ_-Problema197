<?php
// X'' -> X': deshace el orden "primero, último, segundo, penúltimo..."
function recuperarMensajeIntermedio($mensajeCifrado)
{
    $caracteres = str_split($mensajeCifrado);
    $cantidad = count($caracteres);
    $resultado = array();

    $izquierda = 0;
    $derecha = $cantidad - 1;

    for ($i = 0; $i < $cantidad; $i++) {
        if ($i % 2 === 0) {
            $resultado[$izquierda++] = $caracteres[$i];
        } else {
            $resultado[$derecha--] = $caracteres[$i];
        }
    }

    ksort($resultado); // ordena el array por posición
    return implode('', $resultado);
}

function EsVocal($a){
    return strpos("aeiouAEIOU", $a) !== false;
}

// X' -> X: invierte cada grupo de no vocales
function Cada2ConsonantesInv($texto){
    $res = "";
    $grupo = "";

    foreach(str_split($texto) as $letra){
        if(EsVocal($letra)){
            $res .= strrev($grupo) . $letra;
            $grupo = "";
        }else{
            $grupo .= $letra;
        }
    }

    return $res . strrev($grupo);
}

$mensajeCifrado = $_GET['mensaje'] ?? "";
$res = null;

if ($mensajeCifrado !== "") {
    $intermedio = recuperarMensajeIntermedio($mensajeCifrado);
    $res = Cada2ConsonantesInv($intermedio);
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Problema 197</title>
</head>
<body>
    <form>
        <textarea name="mensaje" required><?= htmlspecialchars($mensajeCifrado) ?></textarea>
        <button type="submit">Enviar</button>
    </form>

    <?php if ($res !== null): ?>
        <pre><?= htmlspecialchars($res) ?></pre>
    <?php endif; ?>
</body>
</html>