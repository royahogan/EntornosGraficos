<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
</head>
<body>
    <h1>Contacto</h1>
    <form action="contacto.php" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="email">Correo electrónico:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="mensaje">Mensaje:</label><br>
        <textarea name="mensaje" id="mensaje" rows="5" required></textarea><br><br>

        <input type="submit" name="enviar" value="Enviar">
    </form>

    <?php
    // Verificar envio
    if (isset($_POST['enviar'])) {
        // Capturo datos del formulario, valido caracteres especiales y elimino espacios(trim)
        $nombre = htmlspecialchars(trim($_POST['nombre']));
        $email = htmlspecialchars(trim($_POST['email']));
        $mensaje = htmlspecialchars(trim($_POST['mensaje']));

        // Valido que no esten vacios los campos
        if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
            $destinatario = "webmaster@tusitio.com"; 
            
            $asunto = "Consulta de $nombre desde la página de contacto";

            $cuerpo = "
            <html>
            <head><title>Consulta de $nombre</title></head>
            <body>
                <p><strong>Nombre:</strong> $nombre</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Mensaje:</strong></p>
                <p>$mensaje</p>
            </body>
            </html>
            ";

            // Encabezados
            $headers  = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: $email" . "\r\n";
            $headers .= "Reply-To: $email" . "\r\n";

            // Enviar mail
            if (mail($destinatario, $asunto, $cuerpo, $headers)) {
                echo "<p>Gracias, $nombre. Tu mensaje ha sido enviado correctamente.</p>";
            } else {
                echo "<p>Lo siento, hubo un problema al enviar tu mensaje. Intenta de nuevo más tarde.</p>";
            }
        } else {
            echo "<p>Por favor, completa todos los campos.</p>";
        }
    }
    ?>
</body>
</html>
