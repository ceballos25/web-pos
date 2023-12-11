<?php
// Verifica si se recibieron datos en formato POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera los datos del formulario de productos
    $nombres = $_POST['nombre'] ?? [];
    $descripciones = $_POST['descripcion'] ?? [];
    $precios = $_POST['precio'] ?? [];
    $cantidades = $_POST['cantidad'] ?? [];
    $valoresPagar = $_POST['valorPagar'] ?? [];

    // Recupera los datos del formulario del cliente
    $cedulaCliente = $_POST['cedulaClienteBuscar'] ?? '';
    $tipoDocumentoCliente = $_POST['tipoDocumentoCliente'] ?? '';
    $nombreCliente = $_POST['nombreCliente'] ?? '';
    $ciudadCliente = $_POST['ciudadCliente'] ?? '';
    $direccionCliente = $_POST['direccionCliente'] ?? '';
    $celularCliente = $_POST['celularCliente'] ?? '';
    $emailCliente = $_POST['emailCliente'] ?? '';

    // Muestra los datos del cliente
    echo "Datos del Cliente:\n";
    echo "Cédula: $cedulaCliente\n";
    echo "Tipo Doc: $tipoDocumentoCliente\n";
    echo "Nombre: $nombreCliente\n";
    echo "Ciudad: $ciudadCliente\n";
    echo "Dirección: $direccionCliente\n";
    echo "Celular: $celularCliente\n";
    echo "Email: $emailCliente\n";

    // Puedes iterar sobre los datos y realizar las acciones necesarias
    for ($i = 0; $i < count($nombres); $i++) {
        $nombre = $nombres[$i];
        $descripcion = $descripciones[$i];
        $precio = $precios[$i];
        $cantidad = $cantidades[$i];
        $valorPagar = $valoresPagar[$i];

        // Aquí puedes realizar la lógica para procesar cada conjunto de datos
        // por ejemplo, insertar en la base de datos, realizar cálculos, etc.
    }

    // Luego de procesar los datos, puedes redirigir o imprimir una respuesta
    // header('Location: otra_pagina.php');
    echo 'Datos procesados correctamente.';
} else {
    // No se recibieron datos
    echo 'No se recibieron datos para procesar.';
}
?>
