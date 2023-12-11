<?php
// Verifica si se recibió un ID
if (isset($_POST['id'])) {
  $id = $_POST['id'];

  // Simula el almacenamiento en una base de datos o cualquier almacenamiento persistente
  // Aquí deberías realizar la eliminación en una base de datos real
  // Pero por ahora, simplemente eliminamos el registro de la sesión para este ejemplo
  session_start();

  if (isset($_SESSION['registros'][$id])) {
    unset($_SESSION['registros'][$id]);

    // Devuelve la tabla actualizada
    echo generarTabla($_SESSION['registros']);
  } else {
    // Devuelve la tabla actualizada si el ID no existe (no debería pasar)
    echo generarTabla($_SESSION['registros']);
  }
}

function generarTabla($registros)
{
  $html = '';
  $totalPrecio = 0;
  $cantidadFinal = 0;

  foreach ($registros as $registro) {
    $precio = floatval(str_replace(',', '.', str_replace('.', '', $registro['precio'])));
    $cantidad = $registro['cantidad'];

    $subtotal = $precio * $cantidad;  // Calcula el subtotal para este producto
    $totalPrecio += $subtotal;  // Utiliza += para sumar el subtotal al total general

    $cantidadFinal += $cantidad;

    $html .= '<tr>';
    $html .= '<td class="d-none">' . $registro['id'] . '</td>';
    $html .= '<td>' . $registro['nombre'] . '</td>';
    $html .= '<td>' . $registro['descripcion'] . '</td>';
    $html .= '<td>' . number_format($precio, 0, ',', '.') . '</td>';
    $html .= '<td>' . $cantidad . '</td>';
    $html .= '<td>' . number_format($subtotal, 0, ',', '.') . '</td>';  // Muestra el subtotal
    $html .= '<td><button class="btn m-0 p-0 mx-1" data-toggle="tooltip" data-placement="top" title="Eliminar" id="btn-eliminar" onclick="eliminarRegistro(\'' . $registro['id'] . '\')"><i class="fa-solid fa-trash"></i></button></td>';
    $html .= '</tr>';
  }

  $html .= '<tr>';
  $html .= '<td colspan="7"><div class="bg-light bg-gradient d-flex justify-content-end">
  <div class="alert alert-dismissible fade show" role="alert">
  <strong>Total Productos:</strong> ' . $cantidadFinal . ' <br>
      <strong>Total a Pagar:</strong> ' . '$' . number_format($totalPrecio, 0, ',', '.') . '
  </div>
</div> </td>';
  $html .= '</tr>';

  return $html;
}