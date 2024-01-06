<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('fpdf.php');

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

    //valores de cantidad y pagar
    $totalProductos = $_POST['totalProductos'] ?? '';
    $totalPagar = $_POST['totalPagar'] ?? '';

    // Verifica si todos los campos requeridos están presentes
    if (empty($cedulaCliente) || empty($tipoDocumentoCliente) || empty($nombreCliente) || empty($ciudadCliente) || empty($direccionCliente) || empty($celularCliente) || empty($emailCliente) || empty($nombres)) {
        echo 'Datos incompletos para procesar la venta.';
        exit;
    }

    // Crear conexión a la base de datos (ajusta los detalles según tu configuración)
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

    // Crear una venta en la tabla de ventas
    $sqlVenta = "INSERT INTO ventas (cedula_cliente, tipo_documento_cliente, nombre_cliente, ciudad_cliente, direccion_cliente, celular_cliente, email_cliente) VALUES ('$cedulaCliente', '$tipoDocumentoCliente', '$nombreCliente', '$ciudadCliente', '$direccionCliente', '$celularCliente', '$emailCliente')";

    //definimos la ruta del pdf
    $ticketsFolder = __DIR__ . '/tickets/';

    if ($conn->query($sqlVenta) === TRUE) {
        // Obtener el ID de la venta recién creada
        $idVenta = $conn->insert_id;

        // Insertar los detalles de los productos en la tabla de detalles_venta
        for ($i = 0; $i < count($nombres); $i++) {
            // Obtén los valores con operador de fusión de null
            $descripcion = $descripciones[$i] ?? '';
            $precio = $precios[$i] ?? '';
            $cantidad = $cantidades[$i] ?? '';
            $valorPagar = $valoresPagar[$i] ?? '';

            // Asegúrate de que los valores no sean null o undefined
            $descripcion = $descripcion !== null ? $descripcion : '';
            $precio = $precio !== null ? $precio : '';
            $cantidad = $cantidad !== null ? $cantidad : '';
            $valorPagar = $valorPagar !== null ? $valorPagar : '';

            // Crear una fila en la tabla detalles_venta
            if ($cantidad !== '') {
                $sqlDetalle = "INSERT INTO detalles_venta (id_venta, nombre_producto, descripcion_producto, precio_unitario, cantidad, total_pagar) VALUES ('$idVenta', '{$nombres[$i]}', '$descripcion', '$precio', '$cantidad', '$valorPagar')";

                if ($conn->query($sqlDetalle) !== TRUE) {
                    echo "Error al registrar el detalle de la venta: " . $conn->error;
                }
            }
        }

        // Crear el objeto FPDF
        $pdf = new FPDF('P', 'mm', array(80, 190));
        $pdf->SetMargins(3, 15, 3);
        $pdf->AddPage();
        // Establecer la fuente
        $pdf->SetFont('Arial', '', 9);

        // Encabezado y datos de la empresa
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "Shampoo A&C"), 0, 1, 'C');
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "NIT: 900121232-3 "), 0, 1, 'C');
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "Dir: Cr ABC y D # 44 ABC Itagui"), 0, 1, 'C');
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "Tel: 604 3233432"), 0, 1, 'C');
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "E-mail: correo@ejemplo.com"), 0, 1, 'C');
        // Información de la venta
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "Fecha: " . date("d/m/Y H:i:s")), 0, 1, 'C');
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "Ticket Nro : $idVenta"), 0, 1, 'C');
        $pdf->Ln(1);
        $pdf->Cell(80, 3, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 1, 'C');

        // Información del cliente
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Cliente: $nombreCliente"), 0, 'C');
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Documento: $cedulaCliente"), 0, 'C');
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: $celularCliente"), 0, 'C');
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Dirección: $direccionCliente"), 0, 'C');
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "E-mail: $emailCliente"), 0, 'C');

        $pdf->Ln(3);
        $pdf->Cell(80, 3, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 1, 'C');
        $pdf->Ln(3);


        // Detalles de la tabla de productos
        $pdf->SetFont('Arial', 'B', 9); // Establece la fuente en negrita con tamaño 9
        $pdf->Cell(35, 5, iconv("UTF-8", "ISO-8859-1", "Producto."), 0, 0, 'C');
        $pdf->Cell(15, 5, iconv("UTF-8", "ISO-8859-1", "Cantidad."), 0, 0, 'C');
        $pdf->Cell(25, 5, iconv("UTF-8", "ISO-8859-1", "Total."), 0, 0, 'C');
        $pdf->SetFont('Arial', '', 9); // Restablece la fuente a normal

        $pdf->Cell(80, 5, iconv("UTF-8", "ISO-8859-1", "---------------------------------------------"), 0, 1, 'C');
        $pdf->Cell(80, 3, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 1, 'C');



// Recorrer el array de productos
for ($i = 0; $i < count($nombres); $i++) {
    // Obtén los valores con operador de fusión de null
    $cantidad = $cantidades[$i] ?? '';
    $valorPagar = $valoresPagar[$i] ?? '';

    // Asegúrate de que los valores no sean null o undefined
    $cantidad = $cantidad !== null ? $cantidad : '';
    $valorPagar = $valorPagar !== null ? $valorPagar : '';

    // Detalles de la tabla
    $pdf->Cell(35, 5, iconv("UTF-8", "ISO-8859-1", $nombres[$i]), 0, 0, 'C');
    $pdf->Cell(15, 5, iconv("UTF-8", "ISO-8859-1", $cantidad), 0, 0, 'C');
    $pdf->Cell(25, 5, iconv("UTF-8", "ISO-8859-1", '$ ' . $valorPagar), 0, 0, 'C');
    $pdf->Cell(35, 5, '', 0, 1, 'C'); // Espacio entre productos

}

        // Línea de separación
        $pdf->Cell(80, 3, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 1, 'C');

        // Detalles de la tabla de productos
        $pdf->SetFont('Arial', 'B', 9); // Establece la fuente en negrita con tamaño 9
        $pdf->Cell(70, 5, iconv("UTF-8", "ISO-8859-1", "Total Productos: $totalProductos"), 0, 1, 'R'); // 1 indica un salto de línea
        $pdf->SetFont('Arial', '', 9); // Restablece la fuente a normal

        // Detalles de la tabla de productos
        $pdf->SetFont('Arial', 'B', 9); // Establece la fuente en negrita con tamaño 9
        $pdf->Cell(70, 5, iconv("UTF-8", "ISO-8859-1", "Total a Pagar: $totalPagar"), 0, 1, 'R'); // 1 indica un salto de línea
        $pdf->SetFont('Arial', '', 9); // Restablece la fuente a normal


        $pdf->Ln(10);

        // Nota final
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "*** Para realizar un reclamo o devolución, debe presentar este ticket ***"), 0, 'C');

        // Agradecimiento
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(0, 7, iconv("UTF-8", "ISO-8859-1", "¡Gracias por su compra!"), 0, 1, 'C');

        $pdf->Ln(9);

        // Generar el nombre del archivo PDF con el ID de la venta
        $nombreArchivo = "ticket_Nro_$idVenta.pdf";

        // Crear la ruta completa del archivo PDF
        $rutaCompleta = $ticketsFolder . $nombreArchivo;

        // Guardar el archivo PDF en la carpeta
        $pdf->Output("F", $rutaCompleta);

        // Actualizar la columna ruta_ticket en la tabla de ventas
        $sqlActualizarRuta = "UPDATE ventas SET ruta_ticket = '$rutaCompleta' WHERE id_venta = $idVenta";

        if ($conn->query($sqlActualizarRuta) === TRUE) {
            $pdf->Output("i", $nombreArchivo);
            echo "Todo ok";
        } else {
            echo "Error al actualizar la ruta del ticket: " . $conn->error;
        }
    } else {
        echo "Error al registrar la venta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // No se recibieron datos
    echo 'No se recibieron datos para procesar.';
}
?>
