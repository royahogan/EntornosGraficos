<?php
session_start();

if (isset($_SESSION['nombre'])) {
    echo "<h1>Bienvenido, " . $_SESSION['nombre'] . ".</h1>";
} else {
    echo "<p>No puede acceder a esta página. Inicie sesión primero.</p>";
}
?>

