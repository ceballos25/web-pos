<?php
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

    if ($conn->query($sqlVenta) === TRUE) {
        // Obtener el ID de la venta recién creada
        $idVenta = $conn->insert_id;

        // Insertar los detalles de los productos en la tabla de detalles_venta
        foreach ($nombres as $i => $nombre) {
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
            $sqlDetalle = "INSERT INTO detalles_venta (id_venta, nombre_producto, descripcion_producto, precio_unitario, cantidad, total_pagar) VALUES ('$idVenta', '$nombre', '$descripcion', '$precio', '$cantidad', '$valorPagar')";

            if ($conn->query($sqlDetalle) !== TRUE) {
                echo "Error al registrar el detalle de la venta: " . $conn->error;
            }
        }

        $pdf = new FPDF('P', 'mm', array(80, 258));
        $pdf->SetMargins(4, 10, 4);
        $pdf->AddPage();

        # Encabezado y datos de la empresa #
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("Shampoo A&C")), 0, 'C', false);
        $pdf->SetFont('Arial', '', 9);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "NIT: 900121232-3 "), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Cr ABC y D # 44 ABC Itagui"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: 604 3233432"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Email: correo@ejemplo.com"), 0, 'C', false);

        $pdf->Ln(1);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(5);

        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Fecha: " . date("d/m/Y", strtotime("11-12-2023")) . " " . date("h:s A")), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Cajero Cristian Camilo Ceballos MArin"), 0, 'C', false);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", strtoupper("Ticket Nro: 1")), 0, 'C', false);
        $pdf->SetFont('Arial', '', 9);

        $pdf->Ln(1);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(5);

        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Nombre: $nombreCliente"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Documento: $cedulaCliente"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Teléfono: $celularCliente"), 0, 'C', false);
        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "Dirección: $direccionCliente"), 0, 'C', false);

        $pdf->Ln(1);
        $pdf->Cell(0, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(3);

        # Tabla de productos #
        $pdf->Cell(10, 5, iconv("UTF-8", "ISO-8859-1", "Cant."), 0, 0, 'C');
        $pdf->Cell(10, 5, iconv("UTF-8", "ISO-8859-1", "Prod."), 0, 0, 'C');
        $pdf->Cell(19, 5, iconv("UTF-8", "ISO-8859-1", "Precio"), 0, 0, 'C');
        $pdf->Cell(28, 5, iconv("UTF-8", "ISO-8859-1", "Total"), 0, 0, 'C');

        $pdf->Ln(3);
        $pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');
        $pdf->Ln(3);

        // Recorrer el array de productos
        for ($i = 0; $i < count($nombres); $i++) {
            // Detalles de la tabla
            $pdf->MultiCell(0, 4, iconv("UTF-8", "ISO-8859-1", $nombres[$i]), 0, 'C', false);
            $pdf->Cell(10, 4, iconv("UTF-8", "ISO-8859-1", $cantidades[$i]), 0, 0, 'C');
            $pdf->Cell(19, 4, iconv("UTF-8", "ISO-8859-1", '$' . $precios[$i]), 0, 0, 'C');
            $pdf->Cell(19, 4, iconv("UTF-8", "ISO-8859-1", '$' . $cantidades[$i]), 0, 0, 'C');
            $pdf->Ln(4);
            $pdf->Cell(19, 4, iconv("UTF-8", "ISO-8859-1", 'Total a Pagar$' . $valoresPagar[$i]), 0, 0, 'C');
            $pdf->Ln(7);
        }
        /*----------  Fin Detalles de la tabla  ----------*/
        $pdf->Ln(5);


        $pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');

        $pdf->Ln(5);

        # Impuestos & totales #
        $pdf->Cell(18, 5, iconv("UTF-8", "ISO-8859-1", ""), 0, 0, 'C');
        $pdf->Cell(22, 5, iconv("UTF-8", "ISO-8859-1", "SUBTOTAL"), 0, 0, 'C');
        $pdf->Cell(32, 5, iconv("UTF-8", "ISO-8859-1", "+ $70.00 USD"), 0, 0, 'C');

        $pdf->Ln(5);

        $pdf->Cell(18, 5, iconv("UTF-8", "ISO-8859-1", ""), 0, 0, 'C');
        $pdf->Cell(22, 5, iconv("UTF-8", "ISO-8859-1", "IVA (13%)"), 0, 0, 'C');
        $pdf->Cell(32, 5, iconv("UTF-8", "ISO-8859-1", "+ $0.00 USD"), 0, 0, 'C');

        $pdf->Ln(5);

        $pdf->Cell(72, 5, iconv("UTF-8", "ISO-8859-1", "-------------------------------------------------------------------"), 0, 0, 'C');

        $pdf->Ln(5);

        $pdf->Cell(18, 5, iconv("UTF-8", "ISO-8859-1", ""), 0, 0, 'C');
        $pdf->Cell(22, 5, iconv("UTF-8", "ISO-8859-1", "TOTAL A PAGAR"), 0, 0, 'C');
        $pdf->Cell(32, 5, iconv("UTF-8", "ISO-8859-1", "$100.00 USD"), 0, 0, 'C');


        $pdf->Ln(10);

        $pdf->MultiCell(0, 5, iconv("UTF-8", "ISO-8859-1", "*** Para poder realizar un reclamo o devolución debe de presentar este ticket ***"), 0, 'C', false);

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(0, 7, iconv("UTF-8", "ISO-8859-1", "Gracias por su compra"), '', 0, 'C');

        $pdf->Ln(9);

        # Nombre del archivo PDF #
        $pdf->Output("I", "Ticket_Nro_1.pdf", true);
    } else {
        echo "Error al registrar la venta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // No se recibieron datos
    echo 'No se recibieron datos para procesar.';
}
