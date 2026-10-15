<?php

// Recupera X' deshaciendo el orden de los caracteres de X''.
function recuperarMensajeIntermedio(string $mensajeCifrado)
{
    // Separamos el mensaje en caracteres.
    $caracteres = str_split($mensajeCifrado);
    $cantidad = count($caracteres);

    // Reservamos el mismo número de posiciones que tiene el mensaje cifrado.
    $mensajeIntermedio = array_fill(0, $cantidad, '');
    $izquierda = 0;
    $derecha = $cantidad - 1;

    // En X'', los caracteres pares vienen del principio de X'
    // y los impares vienen del final de X'.
    for ($i = 0; $i < $cantidad; $i++) {
        if ($i % 2 === 0) {
            $mensajeIntermedio[$izquierda] = $caracteres[$i];
            $izquierda++;
        } else {
            $mensajeIntermedio[$derecha] = $caracteres[$i];
            $derecha--;
        }
    }

    return implode('', $mensajeIntermedio);
}

// El formulario permite introducir cualquier mensaje cifrado (X'').
$mensajeCifrado = '';
$mensajeIntermedio = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensajeCifrado = $_POST['mensaje'] ?? '';
    $mensajeIntermedio = recuperarMensajeIntermedio($mensajeCifrado);
}


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

    <form method="post">
        <label for="mensaje">Escribe el mensaje cifrado (X''):</label>
        <textarea id="mensaje" name="mensaje" required><?= htmlspecialchars($mensajeCifrado, ENT_QUOTES, 'UTF-8') ?></textarea>
        <button type="submit">Enviar</button>
    </form>

    <?php if ($mensajeIntermedio !== null): ?>
        <h2>Resultado (X')</h2>
        <pre><?= htmlspecialchars($mensajeIntermedio, ENT_QUOTES, 'UTF-8') ?></pre>
    <?php endif; ?>
</body>
</html>
