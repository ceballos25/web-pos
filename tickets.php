<?php
require 'conexion.php';
$sql = "SELECT id_venta, cedula_cliente, tipo_documento_cliente, nombre_cliente, ciudad_cliente, celular_cliente, email_cliente, total_productos, valor_pagado, ruta_ticket, fecha_venta FROM ventas ORDER BY fecha_venta DESC";
$resultado = $mysqli->query($sql);


?>

<?php

include("header.php");

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tickets</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Panel de Control</a></li>
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
                                </tr>
                            <?php } ?>
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