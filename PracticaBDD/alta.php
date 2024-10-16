<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ciudad = $_POST['ciudad'];
  $pais = $_POST['pais'];
  $habitantes = $_POST['habitantes'];
  $superficie = $_POST['superficie'];
  $tieneMetro = isset($_POST['tieneMetro']) ? 1 : 0;

  // Conexión a la BDD
  $conn = new mysqli("localhost", "root", "1234", "Capitales");

  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  $sql = "INSERT INTO Ciudades (ciudad, pais, habitantes, superficie, tieneMetro) 
          VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";

  if ($conn->query($sql) === TRUE) {
    echo "Nueva ciudad añadida correctamente.";

        echo "<script>
                alert('Alta realizada con éxito.');
                window.location.href = 'menu.html'; // Redirige al menú después de mostrar el pop-up
              </script>";

    
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
  <title>Alta de Ciudad</title>
</head>
<body>
  <h1>Alta de Ciudad</h1>
  <form method="post" action="alta.php">
    Ciudad: <input type="text" name="ciudad" required><br>
    País: <input type="text" name="pais" required><br>
    Habitantes: <input type="number" name="habitantes" required><br>
    Superficie: <input type="number" step="0.01" name="superficie" required><br>
    ¿Tiene Metro?: <input type="checkbox" name="tieneMetro" value="1"><br>
    <input type="submit" value="Agregar Ciudad">
  </form>
</body>
</html>
