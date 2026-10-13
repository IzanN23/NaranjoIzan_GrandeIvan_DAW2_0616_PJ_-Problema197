<?php

// Devuelve true si el carácter recibido es una vocal.
// El enunciado garantiza que las vocales no llevan tilde.
function esVocal(string $caracter)
{
    // strpos devuelve la posición del carácter si lo encuentra y false si no.
    // La comparación estricta evita confundir la posición 0 con false.
    return strpos('aeiouAEIOU', $caracter) !== false;
}

// Deshace las dos transformaciones del problema y devuelve el mensaje original.
function descodificar(string $mensajeCifrado)
{
    // Dividimos el mensaje en caracteres para poder cambiar sus posiciones.
    $caracteres = str_split($mensajeCifrado);
    $cantidad = count($caracteres);

    // Aquí reconstruiremos X'. Reservamos una posición por cada carácter de X''.
    $mensajeIntermedio = array_fill(0, $cantidad, '');

    // Los caracteres pares de X'' se colocan desde el principio de X'.
    // Los impares se colocan desde el final de X'.
    $izquierda = 0;
    $derecha = $cantidad - 1;

    // Deshacemos la alternancia que creó X'' a partir de X'.
}