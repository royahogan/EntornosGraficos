<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio_5</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="crear_sesion.php" method="POST">
        <label for="usuario">Nombre de Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required><br><br>

        <button type="submit">Ingresar</button>
    </form>
</body>
</html>
