<?php
session_start();
session_unset();
session_destroy();
echo "<p>Sesión cerrada. Regrese al <a href='ejercicio6.php'>inicio</a>.</p>";
?>
