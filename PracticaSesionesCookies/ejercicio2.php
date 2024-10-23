<?php
// Verificar si se ha presionado el botón para resetear el contador
if (isset($_POST['reset'])) {
    // Eliminar la cookie configurando su tiempo de expiración en el pasado
    setcookie("contador", "", time() - 3600, "/");
    // Recargar la página para aplicar los cambios
    header("Location: ejercicio2.php");
    exit();
}

// Incrementar el contador de visitas
if (isset($_COOKIE['contador'])) {
    // Si la cookie existe, aumentar el contador
    $contador = $_COOKIE['contador'] + 1;
} else {
    // Si no existe, es la primera vez que accede el usuario
    $contador = 1;
}

// Establecer o actualizar la cookie con el nuevo valor del contador
setcookie("contador", $contador, time() + (86400 * 30), "/"); // 86400 = 1 día
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Visitas</title>
</head>
<body>
    <h1>Bienvenido a la página de visitas</h1>
    
    <?php
    if ($contador == 1) {
        echo "<p>Es tu primera vez en esta página. ¡Bienvenido!</p>";
    } else {
        echo "<p>Visitaste esta página $contador veces.</p>";
    }
    ?>

    <!-- resetear el contador -->
    <form method="POST" action="ejercicio2.php">
        <button type="submit" name="reset">Resetear contador</button>
    </form>
</body>
</html>
