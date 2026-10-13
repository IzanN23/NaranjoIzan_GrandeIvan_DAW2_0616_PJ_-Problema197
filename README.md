# Problema 197: Mensaje interceptado

Solución en PHP del problema 197 de Acepta el Reto. El programa admite dos formas de uso:

- **Consola:** lee un mensaje cifrado por línea desde la entrada estándar y escribe `mensaje cifrado => mensaje original`.
- **Navegador:** con WAMP, abre el proyecto y escribe uno o varios mensajes en el formulario.

## Cómo descodificarlo

El cifrado aplica dos transformaciones: `X -> X' -> X''`. Para descifrar hay que deshacerlas en orden inverso:

1. **`X'' -> X'`:** el cifrado construyó `X''` alternando el primer carácter de `X'`, el último, el segundo, el penúltimo, etc. Para reconstruir `X'`, se recorren los caracteres cifrados de dos en dos: los de posición par se colocan desde el principio y los de posición impar desde el final.
2. **`X' -> X`:** en `X'`, cada bloque consecutivo de caracteres que no son vocales se había invertido. Por tanto, se vuelve a invertir cada bloque de consonantes, espacios y signos de puntuación que haya entre vocales. Se consideran vocales `a, e, i, o, u` y sus mayúsculas.

No se deben eliminar ni normalizar espacios: también forman parte del mensaje.

## Ejecutar en consola

Desde la carpeta del proyecto, con PHP instalado y disponible como `php`:

```text
php index.php < frases.txt
```

También se puede pegar la entrada y terminarla con `Ctrl+Z` y después `Enter` en Windows.

## Cómo repartir el trabajo en pareja

- Una persona puede implementar y probar la reconstrucción `X'' -> X'`.
- La otra puede implementar y probar la inversión de bloques `X' -> X`.
- Después se integran en ese orden, se prueban juntas las frases de ejemplo y se resuelven los conflictos revisando los cambios antes de fusionarlos.

La función completa está en `index.php`; en modo consola su entrada y salida siguen el formato del enunciado.
