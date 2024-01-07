<?php
require 'conexion.php';
$sql = "SELECT id_venta, cedula_cliente, tipo_documento_cliente, nombre_cliente, ciudad_cliente, celular_cliente, email_cliente, total_productos, valor_pagado, ruta_ticket, fecha_venta FROM ventas ORDER BY fecha_venta DESC";
$resultado = $mysqli->query($sql);

include("header.php");

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tickets</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="principal.php">Panel de Control</a></li>
                <li class="breadcrumb-item active">Tickets</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tabla de Tickets
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>N° ticket</th>
                                <th>N° Doc.</th>
                                <th>Tipo Doc.</th>                                
                                <th>Nombre</th>
                                <th>Ciudad</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                <th>Atículos</th>
                                <th>Total</th>
                                <th>Ticket</th>
                                <th>Fecha Venta</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>N° ticket</th>
                            <th>N° Doc.</th>
                            <th>Tipo Doc.</th>                                
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th>Total atículos</th>
                            <th>Total</th>
                            <th>Ticket</th>
                            <th>Fecha Venta</th>
                            <th></th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php while ($row = $resultado->fetch_assoc()) { ?>

                                <tr>
                                    <td><?php echo $row['id_venta'] ?></td>
                                    <td><?php echo $row['cedula_cliente'] ?></td>
                                    <td><?php echo $row['tipo_documento_cliente'] ?></td>
                                    <td><?php echo $row['nombre_cliente'] ?></td>
                                    <td><?php echo $row['ciudad_cliente'] ?></td>
                                    <td><?php echo $row['celular_cliente'] ?></td>
                                    <td><?php echo $row['email_cliente'] ?></td>
                                    <td><?php echo $row['total_productos'] ?></td>
                                    <td><?php echo $row['valor_pagado'] ?></td>
                                    <td><a href="tickets/<?php echo basename($row['ruta_ticket']); ?>" target="_blank"><i class="fa-regular fa-file-pdf"></i></a></td>
                                    <td><?php echo date('d-m-Y', strtotime($row['fecha_venta'])); ?></td>
                                    <td><span style="cursor:pointer;" onclick="enviarCorreo('<?php echo $row['id_venta'] ?>', '<?php echo $row['nombre_cliente'] ?>', '<?php echo $row['email_cliente'] ?>', '<?php echo urlencode($row['ruta_ticket']) ?>', '<?php echo $row['fecha_venta'] ?>')"><i class="bi bi-send"></i></span></td>
                                </tr>
                            <?php } ?>

                            <!--script para enviar copia al correo del cliente-->
                        <script>
                            function enviarCorreo(idVenta, nombreCliente, emailCliente, rutaTicket, fechaVenta) {
                                Swal.fire({
                                    title: '¿Deseas Enviar Copia del Ticket al Cliente?',
                                    icon: 'question',
                                    showCancelButton: true,
                                    confirmButtonText: 'Sí, enviar',
                                    cancelButtonText: 'No, mejor no',
                                    cancelButtonColor: '#d33', // Cambia este valor al color que desees
                                    confirmButtonColor: '#198754'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Construir la URL con los parámetros y redirigir
                                        var url = "enviar-cliente.php?id_venta=" + idVenta + "&nombre_cliente=" + encodeURIComponent(nombreCliente) + "&email_cliente=" + encodeURIComponent(emailCliente) + "&ruta_ticket=" + encodeURIComponent(rutaTicket) + "&fecha_venta=" + fechaVenta;
                                        window.location.href = url;
                                    }
                                });
                            }
                        </script>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


    <?php
    include("footer.php");
    ?>
    </body>

    </html>