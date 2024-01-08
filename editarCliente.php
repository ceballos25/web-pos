<?php
include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente_modal_update = $_POST['id_cliente_modal_update'];
    $nombre_cliente_modal_update = strtoupper($_POST['nombre_cliente_modal_update']);
    $tipo_documento_modal_update = strtoupper($_POST['tipo_documento_modal_update']);
    $numero_documento_modal_update = strtoupper($_POST['numero_documento_modal_update']);
    $ciudad_modal_update = strtoupper($_POST['ciudad_modal_update']);
    $direccion_domicilio_update = strtoupper($_POST['direccion_domicilio_update']);
    $celular_modal_update = strtoupper($_POST['celular_modal_update']);
    $email_modal_update = strtoupper($_POST['email_modal_update']);

    // Validar y escapar datos
    $id_cliente_modal_update = intval($id_cliente_modal_update);  // Asegura que sea un entero
    // ... Asegúrate de validar y escapar otras variables según sea necesario ...

    require 'conexion.php';

    // Utilizar declaración preparada para prevenir SQL Injection
    $stmt = $mysqli->prepare("UPDATE clientes SET nombre_cliente=?, tipo_documento=?, numero_documento=?, ciudad=?, direccion_domicilio=?, celular=?, email=? WHERE id=?");
    $stmt->bind_param("sssssssi", $nombre_cliente_modal_update, $tipo_documento_modal_update, $numero_documento_modal_update, $ciudad_modal_update, $direccion_domicilio_update, $celular_modal_update, $email_modal_update, $id_cliente_modal_update);
    
    if ($stmt->execute()) {
        echo '<script>
            Swal.fire({
                title: "Datos actualizados!",
                text: "Los datos se actualizaron correctamente",
                icon: "success",
                confirmButtonText: "Volver",
                confirmButtonColor: "#000"
            }).then(function() {
                window.location.href = "clientes.php";
            });
        </script>';
    } else {
        echo '<script>
            Swal.fire({
                title: "¡Ups...!",
                text: "Algo salió mal",
                icon: "error",
                confirmButtonText: "Volver a intentar",
                confirmButtonColor: "#000"
            }).then(function() {
                window.location.href = "clientes.php";
            });
        </script>';
    }

    $stmt->close();
    $mysqli->close();
}

include "footer.php";
?>
