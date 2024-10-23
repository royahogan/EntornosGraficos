<?php
// Iniciar la sesión
session_start();

// Verificar si las variables de sesión están definidas
if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) {
    echo "<h1>Bienvenido, " . $_SESSION['usuario'] . "</h1>";
    echo "<p>Tu contraseña es: " . $_SESSION['clave'] . "</p>";
} else {
    echo "No has iniciado sesión.";
}
?>
