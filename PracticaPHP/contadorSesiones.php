<?php
// Iniciar la sesión
session_start();

// Comprobar si ya existe la variable de sesión que cuenta las visitas
if (isset($_SESSION['contador'])) {
    // Incrementar el contador si ya existe
    $_SESSION['contador']++;
} else {
    // Si no existe, inicializar el contador en 1
    $_SESSION['contador'] = 1;
}

// Mostrar el número de páginas visitadas
echo "<h1>Páginas visitadas: " . $_SESSION['contador'] . "</h1>";
?>
