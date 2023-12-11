<?php

include "header.php";

if ($_POST) {
    $nombre_producto = strtoupper($_POST['nombre_producto']);
    $descripcion_producto = strtoupper($_POST['descripcion_producto']);
    $precio_producto = strtoupper($_POST['precio_producto']);
    $activo = strtoupper($_POST['activo']);

    require 'conexion.php';
    $sql = "INSERT INTO productos(id, nombre_producto, descripcion_producto, precio_producto, activo) VALUES (null,'$nombre_producto','$descripcion_producto','$precio_producto','$activo')";
    $resultado = $mysqli->query($sql);


    if ($resultado == 1) {
        echo '<script>
        Swal.fire({
            title: "¡Producto Creado!",
            text: "Producto Creado Correctamente",
            icon: "success",
            confirmButtonText: "Volver"
        }).then(function() {
            window.location.href = "productos.php";});
    </script>';
    } else {
        echo '<script>
        Swal.fire({
            title: "¡Ups...!",
            text: "Algo salió mal",
            icon: "error",
            confirmButtonText: "Volver a intentar"
        }).then(function() {
            window.location.href = "productos.php";});
    </script>';
    }
}

include "footer.php";
