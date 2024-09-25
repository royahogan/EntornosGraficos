<?php
// Definición de la función comprobar_nombre_usuario
function comprobar_nombre_usuario($nombre_usuario) {
    // Compruebo que el tamaño del string sea válido.
    if (strlen($nombre_usuario) < 3 || strlen($nombre_usuario) > 20) {
        echo $nombre_usuario . " no es válido<br>";
        return false;
    }

    // Compruebo que los caracteres sean los permitidos
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
    for ($i = 0; $i < strlen($nombre_usuario); $i++) {
        if (strpos($permitidos, substr($nombre_usuario, $i, 1)) === false) {
            echo $nombre_usuario . " no es válido<br>";
            return false;
        }
    }

    echo $nombre_usuario . " es válido<br>";
    return true;
}

// Probar la función con diferentes nombres de usuario
$usuarios = array(
    "user123",         // Válido
    "us",              // Inválido (menos de 3 caracteres)
    "usuario_muy_largo_para_ser_valido", // Inválido (más de 20 caracteres)
    "user!name",       // Inválido (contiene carácter no permitido)
    "usuario-OK",      // Válido
    "12345",           // Válido
    "abc_def"          // Válido
);

foreach ($usuarios as $usuario) {
    comprobar_nombre_usuario($usuario);
}
?>
