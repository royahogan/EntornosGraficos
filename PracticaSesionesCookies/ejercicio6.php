<!--CREATE DATABASE base2;
USE base2;

CREATE TABLE alumnos (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    codigocurso INT NOT NULL,
    mail VARCHAR(100) NOT NULL
); --> 

<?php
session_start();
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['mail'];

    // Conectar a la base de datos
    $conexion = new mysqli('localhost', 'root', '1234', 'base2');

    if ($conexion->connect_error) {
        die('Error en la conexión: ' . $conexion->connect_error);
    }

    // Consultar si el mail existe en la tabla
    $sql = "SELECT nombre FROM alumnos WHERE mail = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('s', $mail);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // Obtener el nombre y almacenar en sesión
        $fila = $resultado->fetch_assoc();
        $_SESSION['nombre'] = $fila['nombre'];
        header('Location: bienvenida.php'); // Redirigir a la página de bienvenida
        exit();
    } else {
        $mensaje = "El mail no existe en nuestra base de datos.";
    }
    $stmt->close();
    $conexion->close();
}
?>

<form action="ejercicio6.php" method="post">
    <label for="mail">Ingrese su correo electrónico:</label>
    <input type="email" name="mail" id="mail" required>
    <button type="submit">Enviar</button>
</form>

<?php if ($mensaje): ?>
    <p><?php echo $mensaje; ?></p>
<?php endif; ?>
