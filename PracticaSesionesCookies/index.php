<!--EJERCICIO7 -->
<!-- CREATE DATABASE Compras;
USE Compras;

CREATE TABLE catalogo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100) NOT NULL,
    precio DECIMAL(9,2) NOT NULL
);
--> 
<?php
session_start();

// Conexion a la base de datos
$conexion = new mysqli('localhost', 'root', '1234', 'compras');

// Verificar conexión
if ($conexion->connect_error) {
    die('Error en la conexión: ' . $conexion->connect_error);
}

// Obtener todos los productos del catálogo
$resultado = $conexion->query("SELECT * FROM catalogo");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos_EJ7</title>
</head>
<body>
    <h1>Catálogo de Productos</h1>
    
    <table border="1">
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
        <?php while ($producto = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo $producto['producto']; ?></td>
            <td><?php echo $producto['precio']; ?></td>
            <td>
                <form action="procesar.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                    <input type="hidden" name="producto" value="<?php echo $producto['producto']; ?>">
                    <input type="hidden" name="precio" value="<?php echo $producto['precio']; ?>">
                    <button type="submit" name="agregar">Agregar al carrito</button>
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <p><a href="carrito.php">Ver Carrito</a></p>

    <?php $conexion->close(); ?>
</body>
</html>
