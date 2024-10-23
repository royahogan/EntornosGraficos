<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Carrito de Compras</h1>

    <?php if (!empty($_SESSION['carrito'])): ?>
    <table border="1">
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Acción</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION['carrito'] as $indice => $item): 
            $subtotal = $item['precio'] * $item['cantidad'];
            $total += $subtotal;
        ?>
        <tr>
            <td><?php echo $item['producto']; ?></td>
            <td><?php echo $item['precio']; ?></td>
            <td><?php echo $item['cantidad']; ?></td>
            <td><?php echo number_format($subtotal, 2); ?></td>
            <td>
                <form action="procesar.php" method="POST">
                    <input type="hidden" name="indice" value="<?php echo $indice; ?>">
                    <button type="submit" name="eliminar">Eliminar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3">Total a Pagar</td>
            <td colspan="2"><?php echo number_format($total, 2); ?></td>
        </tr>
    </table>
    <?php else: ?>
        <p>Tu carrito está vacío.</p>
    <?php endif; ?>

    <p><a href="index.php">Volver al catálogo</a></p>
</body>
</html>
