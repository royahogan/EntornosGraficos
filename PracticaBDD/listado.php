<?php
$conn = new mysqli("localhost", "root", "1234", "Capitales");

if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM Ciudades";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table border='1'>
          <tr>
            <th>ID</th>
            <th>Ciudad</th>
            <th>País</th>
            <th>Habitantes</th>
            <th>Superficie</th>
            <th>Tiene Metro</th>
          </tr>";

  while($fila = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$fila['id']}</td>
            <td>{$fila['ciudad']}</td>
            <td>{$fila['pais']}</td>
            <td>{$fila['habitantes']}</td>
            <td>{$fila['superficie']}</td>
            <td>{$fila['tieneMetro']}</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "No hay ciudades registradas.";
}

$conn->close();
echo '<p><a href="menu.html">Volver al Menú Principal</a></p>';
?>
