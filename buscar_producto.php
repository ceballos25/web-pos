<?php

// Conexión a la base de datos (debes ajustar estos datos según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el código del producto desde la solicitud POST
$codigo = $_POST['codigo_producto'];

// Realizar la consulta a la base de datos (debes ajustarla según tu estructura)
$sql = "SELECT id, nombre_producto, descripcion_producto, precio_producto, activo FROM productos WHERE id = '$codigo'";

$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los resultados
    $productos = array();

    // Obtener los datos del producto
    while($row = $result->fetch_assoc()) {
        $productos[] = array(
            'nombre_producto' => $row['nombre_producto'],
            'descripcion_producto' => $row['descripcion_producto'],
            'precio_producto' => $row['precio_producto']
        );
    }

    // Devolver los resultados como JSON
    echo json_encode($productos);
} else {
    // No se encontraron resultados
    echo json_encode(array());
}

// Cerrar la conexión
$conn->close();

?>
