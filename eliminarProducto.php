<?php
include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];

    require 'conexion.php';

    // Utilizar declaración preparada para prevenir SQL Injection
    $stmt = $mysqli->prepare("DELETE FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo '<script>
            Swal.fire({
                title: "Producto eliminimado!",
                icon: "success",
                confirmButtonText: "Volver",
                confirmButtonColor: "#000"
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
