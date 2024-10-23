<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '1234', 'prueba');

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Comprobar si se ha enviado el formulario de búsqueda
$resultado = [];
if (isset($_POST['buscar'])) {
    $busqueda = $conexion->real_escape_string($_POST['busqueda']);
    $sql = "SELECT * FROM buscador WHERE canciones LIKE '%$busqueda%'";
    $query = $conexion->query($sql);

    while ($fila = $query->fetch_assoc()) {
        $resultado[] = $fila['canciones'];
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de Canciones_EJ8</title>
</head>
<body>
    <h1>Buscador de Canciones</h1>
    <form method="POST" action="">
        <input type="text" name="busqueda" placeholder="Buscar canción..." required>
        <button type="submit" name="buscar">Buscar</button>
    </form>

    <?php if (isset($_POST['buscar'])): ?>
        <h2>Resultados de la búsqueda:</h2>
        <ul>
            <?php if (count($resultado) > 0): ?>
                <?php foreach ($resultado as $cancion): ?>
                    <li><?php echo htmlspecialchars($cancion); ?></li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No se encontraron resultados.</li>
            <?php endif; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
