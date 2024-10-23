<?php
// Iniciar la sesión
session_start();

// Verificar si se enviaron los datos desde el formulario
if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    // Guardar los datos en variables de sesión
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['clave'] = $_POST['clave'];

    // Redirigir a la página donde se mostrarán los datos
    header("Location: mostrar_sesion.php");
    exit();
} else {
    echo "Por favor, complete ambos campos.";
}
?>
