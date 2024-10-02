<?php
$destinatario = "destinatario@gmail.com";
$asunto = "Prueba de envío de correo en HTML";
$cuerpo = "
<html>
<head>
   <title>Envio de mail</title>
</head>
<body>
   <p>Probando envio de mail</p>
</body>
</html>
";

//Encabezados (.= concatena variables, importante para no sobrescribir)
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: remitente@dominio.com" . "\r\n";
$headers .= "Reply-To: remitente@dominio.com" . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Enviar el correo
if (mail($destinatario, $asunto, $cuerpo, $headers)) {
    echo "Correo enviado con éxito a $destinatario";
} else {
    echo "Error al enviar el correo.";
}
?>
