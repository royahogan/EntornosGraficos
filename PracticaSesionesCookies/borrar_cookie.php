<?php
// Borrar la cookie 'titular' estableciendo su tiempo de expiración en el pasado
setcookie('titular', '', time() - 3600, "/"); // Cookie expira en el pasado
header("Location: periodico.php"); // Redirigir de vuelta a la página del periódico
exit();
?>
