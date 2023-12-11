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
$buscarCedula = $_POST['cedulaClienteBuscar'];

// Realizar la consulta a la base de datos (debes ajustarla según tu estructura)
$sql = "SELECT tipo_documento, nombre_cliente, numero_documento, ciudad, direccion_domicilio, celular, email FROM clientes WHERE numero_documento = '$buscarCedula'";

$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los resultados
    $clientes = array();

    // Obtener los datos del producto
    while($row = $result->fetch_assoc()) {
        $clientes[] = array(
            'tipoDocumentoCliente' => $row['tipo_documento'],
            'nombreCliente' => $row['nombre_cliente'],
            'ciudadCliente' => $row['ciudad'],
            'direccionCliente' => $row['direccion_domicilio'],
            'celularCliente' => $row['celular'],
            'emailCliente' => $row['email'],
        );
    }

    // Devolver los resultados como JSON
    echo json_encode($clientes);
} else {
    // No se encontraron resultados
    echo json_encode(array());
}

// Cerrar la conexión
$conn->close();

?>
