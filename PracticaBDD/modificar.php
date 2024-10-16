<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $ciudad = $_POST['ciudad'];
  $pais = $_POST['pais'];
  $habitantes = $_POST['habitantes'];
  $superficie = $_POST['superficie'];
  $tieneMetro = isset($_POST['tieneMetro']) ? 1 : 0;

  $conn = new mysqli("localhost", "root", "1234", "Capitales");

  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  $sql = "UPDATE Ciudades SET ciudad='$ciudad', pais='$pais', habitantes=$habitantes, superficie=$superficie, tieneMetro=$tieneMetro 
          WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Ciudad modificada correctamente.";
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
  <title>Modificar Ciudad</title>
</head>
<body>
  <h1>Modificar Ciudad</h1>
  <form method="post" action="modificar.php">
    ID de la Ciudad: <input type="number" name="id" required><br>
    Ciudad: <input type="text" name="ciudad" required><br>
    País: <input type="text" name="pais" required><br>
    Habitantes: <input type="number" name="habitantes" required><br>
    Superficie: <input type="number" step="0.01" name="superficie" required><br>
    ¿Tiene Metro?: <input type="checkbox" name="tieneMetro" value="1"><br>
    <input type="submit" value="Modificar Ciudad">
  </form>
</body>
</html>
