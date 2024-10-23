<?php
// Verificar si se ha enviado el formulario
if (isset($_POST['nombre_usuario'])) {
    // Guardar el nombre de usuario en una cookie válida por 30 días
    $nombre_usuario = $_POST['nombre_usuario'];
    setcookie('nombre_usuario', $nombre_usuario, time() + (86400 * 30), "/"); // 86400 segundos = 1 día
    // Redirigir para evitar reenvío del formulario al actualizar la página
    header("Location: Ejercicio3.php");
    exit();
}

// Verificar si ya existe una cookie 'nombre_usuario'
$nombre_usuario = isset($_COOKIE['nombre_usuario']) ? $_COOKIE['nombre_usuario'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Nombre de Usuario</title>
</head>
<body>
    <h1>Bienvenido</h1>
    
    <!-- Mostrar el último nombre de usuario ingresado si la cookie existe -->
    <?php if ($nombre_usuario): ?>
        <p>El último nombre de usuario ingresado fue: <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong></p>
    <?php endif; ?>
    
    <!-- Formulario para cargar un nuevo nombre de usuario -->
    <form action="Ejercicio3.php" method="POST">
        <label for="nombre_usuario">Ingresa tu nombre de usuario:</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario" value="<?php echo htmlspecialchars($nombre_usuario); ?>">
        <button type="submit">Guardar Nombre</button>
    </form>
</body>
</html>
