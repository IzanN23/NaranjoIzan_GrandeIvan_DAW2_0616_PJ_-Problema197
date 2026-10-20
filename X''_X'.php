<?php

// Recupera X' deshaciendo el orden de los caracteres de X''.
function recuperarMensajeIntermedio($mensajeCifrado)
{
    // Separamos el mensaje en caracteres.
    $caracteres = str_split($mensajeCifrado);
    $cantidad = count($caracteres);

    // Preparamos un espacio para cada carácter del mensaje.
    $mensajeIntermedio = array();
    for ($i = 0; $i < $cantidad; $i++) {
        $mensajeIntermedio[$i] = '';
    }

    $posicionIzquierda = 0;
    $posicionDerecha = $cantidad - 1;

    // Colocamos los caracteres pares desde la izquierda
    // y los impares desde la derecha.
    for ($i = 0; $i < $cantidad; $i++) {
        if ($i % 2 === 0) {
            $mensajeIntermedio[$posicionIzquierda] = $caracteres[$i];
            $posicionIzquierda++;
        } else {
            $mensajeIntermedio[$posicionDerecha] = $caracteres[$i];
            $posicionDerecha--;
        }
    }

    return implode('', $mensajeIntermedio);
}

// El formulario permite escribir el mensaje cifrado (X'').
$mensajeCifrado = '';
$mensajeIntermedio = null;

?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Problema 197 - Transformación X'' a X'</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Problema 197: mensaje interceptado</h1>
    <p>Esta parte deshace únicamente la transformación de X'' a X'.</p>

    <!-- Formulario para escribir y enviar el mensaje cifrado. -->
    <form>
        <label for="mensaje">Escribe el mensaje cifrado (X''):</label>
        <!-- name="mensaje" permite leer el texto desde $_GET['mensaje'] en PHP. -->
        <!-- Mostramos el texto enviado para que no haya que volver a escribirlo. -->
        <textarea id="mensaje" name="mensaje" required><?= htmlspecialchars($mensajeCifrado, ENT_QUOTES, 'UTF-8') ?></textarea>
        <button type="submit">Enviar</button>
    </form>

    <!-- El resultado solo aparece después de enviar un mensaje. -->
    <?php if ($mensajeIntermedio !== null): ?>
        <h2>Resultado (X')</h2>
        <!-- Mostramos el mensaje recuperado como texto, no como código HTML. -->
        <pre><?= htmlspecialchars($mensajeIntermedio, ENT_QUOTES, 'UTF-8') ?></pre>
    <?php endif; ?>
</body>
</html>
