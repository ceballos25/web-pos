<?php
include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto_modal_update = $_POST['id_producto_modal_update'];
    $nombre_producto_modal_update = strtoupper($_POST['nombre_producto_modal_update']);
    $descripcion_producto_modal_update = strtoupper($_POST['descripcion_producto_modal_update']);
    $precio_producto_modal_update = $_POST['precio_producto_modal_update'];
    $activo_producto_modal_update = strtoupper($_POST['activo_producto_modal_update']);

    // Validar y escapar datos
    $id_producto_modal_update = intval($id_producto_modal_update);  // Asegura que sea un entero
    // ... Asegúrate de validar y escapar otras variables según sea necesario ...

    require 'conexion.php';

    // Utilizar declaración preparada para prevenir SQL Injection
    $stmt = $mysqli->prepare("UPDATE productos SET nombre_producto=?, descripcion_producto=?, precio_producto=?, activo=? WHERE id=?");
    $stmt->bind_param("ssssi", $nombre_producto_modal_update, $descripcion_producto_modal_update, $precio_producto_modal_update, $activo_producto_modal_update, $id_producto_modal_update);
    
    if ($stmt->execute()) {
        echo '<script>
            Swal.fire({
                title: "Datos actualizados!",
                text: "Los datos se actualizaron correctamente",
                icon: "success",
                confirmButtonText: "Volver"
            }).then(function() {
                window.location.href = "productos.php";
            });
        </script>';
    } else {
        echo '<script>
            Swal.fire({
                title: "¡Ups...!",
                text: "Algo salió mal",
                icon: "error",
                confirmButtonText: "Volver a intentar"
            }).then(function() {
                window.location.href = "productos.php";
            });
        </script>';
    }

    $stmt->close();
    $mysqli->close();
}

include "footer.php";
?>
