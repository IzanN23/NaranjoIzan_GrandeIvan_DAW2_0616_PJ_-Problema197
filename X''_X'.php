<?php

function recuperarMensajeIntermedio($mensaje)
{
    // Separamos el mensaje en caracteres (mb_ para que funcionen á, ñ, ç...)
    $caracteres = mb_str_split($mensaje);

    // Dos listas vacías: una para posiciones pares y otra para impares
    $pares = array();
    $impares = array();

    // Repartimos cada carácter según su posición
    foreach ($caracteres as $posicion => $caracter) {
        if ($posicion % 2 === 0) {
            $pares[] = $caracter;
        } else {
            $impares[] = $caracter;
        }
    }

    //Damos la vuelta a los impares y los pegamos detrás de los pares
    $resultado = array_merge($pares, array_reverse($impares));

    //Convertimos la lista en texto
    return implode('', $resultado);
}

// Leemos el mensaje del formulario (trim quita espacios y saltos al principio y al final)
$mensaje = trim($_GET['mensaje'] ?? '');

// Si hay mensaje calculamos el resultado, si no, no mostramos nada
$resultado = null;
if ($mensaje !== '') {
    $resultado = recuperarMensajeIntermedio($mensaje);
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Problema 197</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Problema 197: mensaje interceptado</h1>
    <p>Esta parte deshace la transformación de X'' a X'.</p>

    <!-- Formulario para escribir y enviar el mensaje cifrado. -->
    <form>
        <label for="mensaje">Escribe el mensaje cifrado (X''):</label>
        <textarea id="mensaje" name="mensaje" required><?= htmlspecialchars($mensaje) ?></textarea>
        <button type="submit">Enviar</button>
    </form>

    <?php if ($resultado !== null) { ?>
        <h2>Resultado (X')</h2>
        <pre><?= htmlspecialchars($resultado) ?></pre>
    <?php } ?>
</body>
</html>