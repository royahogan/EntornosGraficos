<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendar sitio</title>
</head>
<body>
    <h1>Recomienda este sitio a un amigo</h1>

    <form action="recomendar.php" method="POST">
        <label for="tu_nombre">Tu nombre:</label><br>
        <input type="text" name="tu_nombre" id="tu_nombre" required><br><br>

        <label for="tu_email">Tu correo electrónico:</label><br>
        <input type="email" name="tu_email" id="tu_email" required><br><br>

        <label for="amigo_email">Correo electrónico de tu amigo:</label><br>
        <input type="email" name="amigo_email" id="amigo_email" required><br><br>

        <input type="submit" name="enviar" value="Recomendar">
    </form>

    <?php
    // Verificar envio formulario
    if (isset($_POST['enviar'])) {
        $tu_nombre = htmlspecialchars(trim($_POST['tu_nombre']));
        $tu_email = htmlspecialchars(trim($_POST['tu_email']));
        $amigo_email = htmlspecialchars(trim($_POST['amigo_email']));

        // Validar los datos
        if (!empty($tu_nombre) && !empty($tu_email) && !empty($amigo_email)) {
            $asunto = "$tu_nombre te recomienda este sitio web";

            $cuerpo = "
            <html>
            <head><title>Recomendación de $tu_nombre</title></head>
            <body>
                <p>Hola,</p>
                <p>Tu amigo <strong>$tu_nombre</strong> (<a href='mailto:$tu_email'>$tu_email</a>) quiere recomendarte este sitio web.</p>
                <p>Visítalo aquí: <a href='https://www.frro.utn.edu.ar/'>www.frro.utn.edu.ar</a></p>
            </body>
            </html>
            ";

            // Encabezados
            $headers  = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: $tu_email" . "\r\n";
            $headers .= "Reply-To: $tu_email" . "\r\n";

            // Enviar mail
            if (mail($amigo_email, $asunto, $cuerpo, $headers)) {
                echo "<p>Gracias, $tu_nombre. Tu recomendación ha sido enviada a $amigo_email.</p>";
            } else {
                echo "<p>Lo siento, hubo un problema al enviar la recomendación. Intenta de nuevo más tarde.</p>";
            }
        } else {
            echo "<p>Por favor, completa todos los campos.</p>";
        }
    }
    ?>
</body>
</html>
