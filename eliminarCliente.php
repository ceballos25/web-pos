<?php
include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    require 'conexion.php';

    // Utilizar declaración preparada para prevenir SQL Injection
    $stmt = $mysqli->prepare("DELETE FROM clientes WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo '<script>
            Swal.fire({
                title: "¡Cliente eliminimado!",
                icon: "success",
                confirmButtonText: "Volver"
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
                confirmButtonText: "Volver a intentar"
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
