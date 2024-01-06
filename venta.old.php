<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla Dinámica PHP</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

  <h2>Tabla Dinámica con PHP</h2>

  <table id="dynamic-table">
  <thead>
    <tr>
        <th>Id</th>
        <th>Nombre Producto</th>
        <th>Descripción</th>
        <th>Precio CDU</th>
        <th>Activo</th>
        <th>Acciones</th>
    </tr>
</thead>
    <tbody>
      <!-- Aquí se mostrarán los registros -->
    </tbody>
  </table>

  <form id="addForm">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre">
    <button type="button" onclick="agregarRegistro()">Agregar</button>
  </form>

    <button onclick="generarVenta()">Generar Venta</button>

 <script>
  function agregarRegistro() {
    var nombre = document.getElementById('nombre').value;

    // Verifica si el nombre está vacío
    if (nombre.trim() === '') {
      alert('Por favor, ingrese un nombre.');
      return;
    }

    // Realiza una solicitud AJAX para agregar el registro en el servidor
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Actualiza la tabla con los nuevos datos
        document.querySelector('#dynamic-table tbody').innerHTML = xhr.responseText;
      }
    };
    xhr.open('POST', 'agregar_registro.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('nombre=' + encodeURIComponent(nombre));
  }

  function eliminarRegistro(id) {
    // Realiza una solicitud AJAX para eliminar el registro en el servidor
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Actualiza la tabla con los nuevos datos
        document.querySelector('#dynamic-table tbody').innerHTML = xhr.responseText;
      }
    };
    xhr.open('POST', 'eliminar_registro.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('id=' + encodeURIComponent(id));
  }

    function generarVenta() {
    // Obtén todos los registros de la tabla
    var registros = document.querySelectorAll('#dynamic-table tbody tr');

    // Crea un array para almacenar los datos de los registros
    var datosRegistros = [];

    // Itera sobre los registros y extrae los datos
    registros.forEach(function(registro) {
      var id = registro.cells[0].innerText;
      var nombre = registro.cells[1].innerText;

      // Agrega los datos al array
      datosRegistros.push({ id: id, nombre: nombre });
    });

    // Realiza una solicitud AJAX para enviar los datos a otro archivo (procesar_venta.php)
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Muestra una alerta o realiza alguna acción con la respuesta si es necesario
        alert(xhr.responseText);
      }
    };
    xhr.open('POST', 'procesar_venta.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.send(JSON.stringify(datosRegistros));
  }
</script>

</body>
</html>
