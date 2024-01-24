<?php
include 'conexion.php';

// Ejemplo de consulta SQL
$sql = "SELECT * FROM Cliente";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Campo1: " . $row["campo1"]. " - Campo2: " . $row["campo2"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();
?>
