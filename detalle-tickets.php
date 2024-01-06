<?php
require 'conexion.php';
$sql = "SELECT detalles_venta.id_detalle, detalles_venta.id_venta, detalles_venta.nombre_producto, detalles_venta.descripcion_producto, detalles_venta.precio_unitario, detalles_venta.cantidad, detalles_venta.total_pagar, ventas.cedula_cliente, ventas.nombre_cliente, ventas.ciudad_cliente, ventas.email_cliente, ventas.celular_cliente, ventas.fecha_venta FROM detalles_venta JOIN ventas ON detalles_venta.id_venta = ventas.id_venta ORDER BY fecha_venta DESC;";
$resultado = $mysqli->query($sql);
?>

<?php

include("header.php");

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Ventas al detalle</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Panel de Control</a></li>
                <li class="breadcrumb-item active">Ventas al Detalle</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tabla de Ventas al Detalle
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                            <th>Ticket</th>
                            <th>Prod.</th>                                
                            <th>Desc.</th>
                            <th>P/u</th>
                            <th>Cant.</th>
                            <th>Total</th>
                            <th>N° Doc</th>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>E-mail</th>
                            <th>Celular</th>
                            <th>Fecha</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <tr>
                        <th>Ticket</th>
                            <th>Prod.</th>                                
                            <th>Desc.</th>
                            <th>P/u</th>
                            <th>Cant.</th>
                            <th>Total</th>
                            <th>N° Doc</th>
                            <th>Nombre</th>
                            <th>Ciudad</th>
                            <th>E-mail</th>
                            <th>Celular</th>
                            <th>Fecha</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php while ($row = $resultado->fetch_assoc()) { ?>

                                <tr>
                                    <td><?php echo $row['id_venta'] ?></td>
                                    <td><?php echo $row['nombre_producto'] ?></td>
                                    <td><?php echo $row['descripcion_producto'] ?></td>
                                    <td><?php echo $row['precio_unitario'] ?></td>
                                    <td><?php echo $row['cantidad'] ?></td>
                                    <td><?php echo $row['total_pagar'] ?></td>
                                    <td><?php echo $row['cedula_cliente'] ?></td>
                                    <td><?php echo $row['nombre_cliente'] ?></td>
                                    <td><?php echo $row['ciudad_cliente'] ?></td>
                                    <td><?php echo $row['email_cliente'] ?></td>
                                    <td><?php echo $row['celular_cliente'] ?></td>
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