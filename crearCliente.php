<?php

include "header.php";

if ($_POST) {
    $nombre_cliente = strtoupper($_POST['nombre_cliente']);
    $tipo_documento = strtoupper($_POST['tipo_documento']);
    $numero_documento = strtoupper($_POST['numero_documento']);
    $ciudad = strtoupper($_POST['ciudad']);
    $direccion_domicilio = strtoupper($_POST['direccion_domicilio']);
    $celular = strtoupper($_POST['celular']);
    $email = strtoupper($_POST['email']);

    require 'conexion.php';
    $sql = "INSERT INTO clientes(id, nombre_cliente, tipo_documento, numero_documento, ciudad, direccion_domicilio, celular, email, fecha_creacion) VALUES (null, '$nombre_cliente','$tipo_documento','$numero_documento','$ciudad','$direccion_domicilio','$celular','$email', current_timestamp())";
    $resultado = $mysqli->query($sql);


    if ($resultado == 1) {
        echo '<script>
        Swal.fire({
            title: "¡Cliente Creado!",
            text: "El cliente se creó correctamente",
            icon: "success",
            confirmButtonText: "Volver"
        }).then(function() {
            window.location.href = "clientes.php";});
    </script>';
    } else {
        echo '<script>
        Swal.fire({
            title: "¡Ups...!",
            text: "Algo salió mal",
            icon: "error",
            confirmButtonText: "Volver a intentar"
        }).then(function() {
            window.location.href = "clientes.php";});
    </script>';
    }
}

include "footer.php";
