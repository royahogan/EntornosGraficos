<?php
session_start();

// Verificar si el carrito está inicializado
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Verificar si se ha enviado el formulario para agregar un producto al carrito
if (isset($_POST['agregar'])) {
    $id = $_POST['id'];
    $producto = $_POST['producto'];
    $precio = $_POST['precio'];

    // Crear un producto y añadirlo al carrito
    $item = [
        'id' => $id,
        'producto' => $producto,
        'precio' => $precio,
        'cantidad' => 1
    ];

    // Verificar si el producto ya está en el carrito
    $encontrado = false;
    foreach ($_SESSION['carrito'] as &$articulo) {
        if ($articulo['id'] == $id) {
            $articulo['cantidad']++;
            $encontrado = true;
            break;
        }
    }

    // Si no está en el carrito, agregarlo
    if (!$encontrado) {
        $_SESSION['carrito'][] = $item;
    }
}

// Verificar si se ha enviado el formulario para eliminar un producto del carrito
if (isset($_POST['eliminar'])) {
    $indice = $_POST['indice'];

    // Eliminar el producto del carrito
    unset($_SESSION['carrito'][$indice]);

    // Reindexar el array
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
}

// Redirigir al carrito
header("Location: carrito.php");
exit();
?>
