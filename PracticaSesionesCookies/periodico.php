<?php
// Verificar si se ha enviado el formulario y guardar la selección en una cookie
if (isset($_POST['titular'])) {
    setcookie('titular', $_POST['titular'], time() + (86400 * 30), "/"); // Cookie válida por 30 días
    header("Location: periodico.php"); // Redirigir para evitar reenviar el formulario
    exit();
}

// Verificar si ya existe una cookie 'titular'
$titular = isset($_COOKIE['titular']) ? $_COOKIE['titular'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periódico Fake News</title>
</head>
<body>
    <h1>Bienvenido a Fake News</h1>

    <!-- Mostrar titulares según la cookie -->
    <h2>Titulares del Día </h2>
    <?php if ($titular == 'politica' || $titular == ''): ?>
        <p><strong>Noticia Política:</strong> Todos los politicos decidieron bajarse el suedo a 1 haber mínimo.</p>
    <?php endif; ?>
    <?php if ($titular == 'economia' || $titular == ''): ?>
        <p><strong>Noticia Económica:</strong> Argentina es el país con menos inflación del mundo.</p>
    <?php endif; ?>
    <?php if ($titular == 'deportes' || $titular == ''): ?>
        <p><strong>Noticia Deportiva:</strong> Newells ganó el clasico.</p>
    <?php endif; ?>

    <!-- Formulario para seleccionar el tipo de titular -->
    <h2>Selecciona el titular que deseas ver:</h2>
    <form action="periodico.php" method="POST">
        <label><input type="radio" name="titular" value="politica" <?php if ($titular == 'politica') echo 'checked'; ?>> Noticia Política</label><br>
        <label><input type="radio" name="titular" value="economia" <?php if ($titular == 'economia') echo 'checked'; ?>> Noticia Económica</label><br>
        <label><input type="radio" name="titular" value="deportes" <?php if ($titular == 'deportes') echo 'checked'; ?>> Noticia Deportiva</label><br>
        <button type="submit">Guardar Preferencia</button>
    </form>

    <!-- Enlace para borrar la cookie -->
    <p><a href="borrar_cookie.php">Borrar la selección de titular</a></p>
</body>
</html>
