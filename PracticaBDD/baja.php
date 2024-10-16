<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];

  $conn = new mysqli("localhost", "root", "1234", "Capitales");

  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  $sql = "DELETE FROM Ciudades WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Ciudad eliminada correctamente.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
echo '<p><a href="menu.html">Volver al Menú Principal</a></p>';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Baja de Ciudad</title>
</head>
<body>
  <h1>Baja de Ciudad</h1>
  <form method="post" action="baja.php">
    ID de la Ciudad: <input type="number" name="id" required><br>
    <input type="submit" value="Eliminar Ciudad">
  </form>
</body>
</html>
