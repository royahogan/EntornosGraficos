<?php
// Verificar si se ha enviado el formulario
if (isset($_POST['estilo'])) {
    // Almacenar el estilo seleccionado en una cookie con duración de 30 días
    setcookie('estilo', $_POST['estilo'], time() + (86400 * 30), "/"); // 86400 = 1 día
    // Redirigir a la misma página para aplicar el estilo seleccionado
    header("Location: Ejercicio1.php");
    exit();
}
//IMPORTANTE: almacenar archivos CSS en una carpeta css/ busca ahi 
// Verificar si la cookie 'estilo' está configurada
$estilo = isset($_COOKIE['estilo']) ? $_COOKIE['estilo'] : 'default'; // Estilo por defecto
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con Estilo Configurable</title>
    <link rel="stylesheet" href="css/<?php echo $estilo; ?>.css">
</head>
<body>
    <h1>Bienvenido a la página con estilo configurable</h1>

    <!-- Formulario para seleccionar el estilo -->
    <form action="Ejercicio1.php" method="POST">
        <label for="estilo">Selecciona el estilo de la página:</label>
        <select name="estilo" id="estilo">
            <option value="default" <?php if($estilo == 'default') echo 'selected'; ?>>Estilo predeterminado</option>
            <option value="negro" <?php if($estilo == 'negro') echo 'selected'; ?>>Estilo oscuro</option>
            <option value="CARC" <?php if($estilo == 'CARC') echo 'selected'; ?>>Estilo CARC</option>
        </select>
        <button type="submit">Cambiar estilo</button>
    </form>

    <p>Tu estilo actual es: <?php echo ucfirst($estilo); ?></p>
</body>
</html>
