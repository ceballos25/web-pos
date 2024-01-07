<?php
require 'conexion.php';
$sql = "SELECT id, nombre_producto, descripcion_producto, precio_producto, activo FROM productos";
$resultado = $mysqli->query($sql);

include("header.php");
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Generar Venta</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="principal.php">Panel de Control</a></li>
                <li class="breadcrumb-item active">Generar Venta</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tabla de Ventas
                </div>
                <div class="card-body">
                    <form id="addForm" class="d-flex flex-row">
                        <div class="form-group me-2">
                            <label for="descripcion_producto" class="form-label">Codigo Producto</label>
                            <input type="text" class="form-control text-uppercase" id="codigo_producto" name="codigo_producto" required onchange="buscarProducto()">
                        </div>
                        <div class="form-group me-2">
                            <label for="nombre_producto" class="form-label">Nombre Producto</label>
                            <input style="cursor: not-allowed;" readonly type="text" class="form-control text-uppercase bg-light" id="nombre_producto" name="nombre_producto" required>
                        </div>
                        <div class="form-group me-2">
                            <label for="descripcion_producto" class="form-label">Descripción Producto</label>
                            <input style="cursor: not-allowed;" readonly type="text" class="form-control text-uppercase bg-light" id="descripcion_producto" name="descripcion_producto" required>
                        </div>
                        <div class="form-group me-2">
                            <label for="precio_producto" class="form-label">Precio CDU</label>
                            <input type="text" class="form-control text-uppercase precio_producto" id="precio_producto" name="precio_producto" required>
                        </div>
                        <div class="form-group me-2">
                            <label for="precio_producto" class="form-label">Cantidad</label>
                            <input type="text" value="1" class="form-control text-uppercase" id="cantidad_producto" name="cantidad_producto" required>
                        </div>
                    </form>
                    <div class="mt-2 mb-2 d-flex">
                        <button type="button" class="btn btn-info" onclick="agregarRegistro()">
                            Añadir <i class="fas fa-cart-plus"></i>
                        </button>
                    </div>

                    <table class="table table-hover dynamic-table" id="dynamic-table">
                        <thead>
                            <tr>
                                <th class="d-none">Id</th>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Precio CDU</th>
                                <th>Cantidad</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Aquí se mostrarán los registros relacionados -->
                        </tbody>
                    </table>

                    <div class="container d-flex">
                        <button type="button" class="btn btn-success ms-auto boton-venta"  onclick="mostrarModalCliente()">
                            Finalizar Venta <i class="fas fa-file-invoice-dollar"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <!-- Agrega esto a tu HTML -->
        <div class="modal fade" id="modalCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Información del Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formCliente" class="row g-3">
                            <div class="col-md-6">
                                <label for="cedulaClienteBuscar" class="form-label">N° documento</label>
                                <input type="number" class="form-control text-uppercase" id="cedulaClienteBuscar" name="cedulaClienteBuscar" required onchange="buscarCliente()">
                            </div>
                            <div class="col-md-6">
                                <label for="tipoDocumentoCliente" class="form-label">Tipo Doc.</label>
                                <input type="text" style="cursor: not-allowed;" readonly class="form-control text-uppercase bg-light" id="tipoDocumentoCliente" name="tipoDocumentoCliente" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nombreCliente" class="form-label">Nombre</label>
                                <input type="text" style="cursor: not-allowed;" readonly class="form-control text-uppercase bg-light" id="nombreCliente" name="nombreCliente" required>
                            </div>

                            <div class="col-6">
                                <label for="ciudadCliente" class="form-label">Ciudad</label>
                                <input type="text" style="cursor: not-allowed;" readonly class="form-control text-uppercase bg-light" id="ciudadCliente" name="ciudadCliente" required>
                            </div>
                            <div class="col-6">
                                <label for="direccionCliente" class="form-label">Dirección</label>
                                <input type="text" style="cursor: not-allowed;" readonly class="form-control text-uppercase bg-light" id="direccionCliente" name="direccionCliente" required>
                            </div>
                            <div class="col-md-6">
                                <label for="celularCliente" class="form-label">N° Celular</label>
                                <input type="number" style="cursor: not-allowed;" readonly class="form-control text-uppercase bg-light" id="celularCliente" name="celularCliente" required>
                            </div>

                            <div class="col-md-12">
                                <label for="emailCliente" class="form-label">Correo Electrónico</label>
                                <input type="email" style="cursor: not-allowed;" readonly class="form-control text-uppercase bg-light" id="emailCliente" name="emailCliente" required>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" onclick="enviarFormulario()">Facturar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        function agregarRegistro() {
            var nombre = document.getElementById('nombre_producto').value;
            var descripcion = document.getElementById('descripcion_producto').value;
            var precio = document.getElementById('precio_producto').value;
            var cantidad = document.getElementById('cantidad_producto').value;

            // Verifica si el nombre está vacío
            if (nombre.trim() === '') {
                Swal.fire({
                    icon: "error",
                    title: "¡Algo salió mal!",
                    text: "Debe agregar al menos un producto",
                });
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
            xhr.send('nombre=' + encodeURIComponent(nombre) +
                '&descripcion=' + encodeURIComponent(descripcion) +
                '&precio=' + encodeURIComponent(precio) +
                '&cantidad=' + encodeURIComponent(cantidad));
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

        function buscarProducto() {
            // Obtén el valor del campo de código
            var codigo = document.getElementById('codigo_producto').value;

            // Realiza una solicitud AJAX para obtener los datos relacionados desde el servidor
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Parsea la respuesta JSON si hay contenido
                        if (xhr.responseText.trim() !== '') {
                            var respuesta = JSON.parse(xhr.responseText);

                            // Llena los campos del formulario con la información obtenida
                            if (respuesta.length > 0) {
                                document.getElementById('nombre_producto').value = respuesta[0].nombre_producto;
                                document.getElementById('descripcion_producto').value = respuesta[0].descripcion_producto;
                                document.getElementById('precio_producto').value = respuesta[0].precio_producto;
                            }
                        } else {
                            // No hay contenido, puedes manejarlo según tus necesidades
                            alert("Cod Producto no existe");
                        }
                    } else {
                        // Ocurrió un error en la solicitud
                        alert("Cod Producto no existe");
                    }
                }
            };

            // Realiza la solicitud POST al servidor (debes adaptar la URL según tu entorno)
            xhr.open('POST', 'buscar_producto.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('codigo_producto=' + encodeURIComponent(codigo));
        }

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Actualiza la tabla con los nuevos datos
                document.querySelector('#dynamic-table tbody').innerHTML = xhr.responseText;

                // Actualiza los totales
                actualizarTotales();
            }
        };

        // Declarar la variable fuera de las funciones
        var registros;
        var cedulaCliente,
            tipoDocumentoCliente,
            nombreCliente,
            ciudadCliente,
            direccionCliente,
            celularCliente,
            emailCliente;


    function mostrarModalCliente() {
    // Obtén todos los registros de la tabla
    registros = document.querySelectorAll('#dynamic-table tbody tr');

    var nombre_producto_venta = document.getElementById('nombre_producto').value;

    // Obtén el botón por su clase
    var botonVenta = document.querySelector('.boton-venta');

    // Verifica si el campo está vacío
    if (nombre_producto_venta.trim() === '') {
        // Si está vacío, añade una clase para ocultar el botón
        botonVenta.classList.add('oculto');
    } else {
        // Si no está vacío, quita la clase de ocultar el botón
        botonVenta.classList.remove('oculto');

        // Aquí puedes agregar cualquier otra lógica que necesites
    }

    if (nombre_producto_venta.trim() === '') {
        Swal.fire({
            icon: "error",
            title: "¡Algo salió mal!",
            text: "Debe agregar al menos un producto",
        });
        return;
    }

    var modalCliente = new bootstrap.Modal(document.getElementById('modalCliente'));
    modalCliente.show();
}


        function buscarCliente() {
            // Obtén el valor del campo de cédula
            var cedulaCliente = document.getElementById('cedulaClienteBuscar').value;

            // Realiza una solicitud AJAX para obtener los datos relacionados desde el servidor
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Intenta parsear la respuesta JSON
                        try {
                            var respuesta = JSON.parse(xhr.responseText);

                            // Verifica si hay contenido en la respuesta
                            if (respuesta && respuesta.length > 0) {
                                document.getElementById('tipoDocumentoCliente').value = respuesta[0].tipoDocumentoCliente;
                                document.getElementById('nombreCliente').value = respuesta[0].nombreCliente;
                                document.getElementById('ciudadCliente').value = respuesta[0].ciudadCliente;
                                document.getElementById('direccionCliente').value = respuesta[0].direccionCliente;
                                document.getElementById('celularCliente').value = respuesta[0].celularCliente;
                                document.getElementById('emailCliente').value = respuesta[0].emailCliente;
                            } else {
                                // No hay contenido, puedes manejarlo según tus necesidades
                                Swal.fire({
                                    icon: "error",
                                    title: "¡Algo salió mal!",
                                    text: "Cliente no Encontrado, Verifique N° Documento",
                                });
                            }
                        } catch (error) {
                            // Ocurrió un error al parsear la respuesta JSON
                            console.error("Error al parsear la respuesta JSON:", error);
                            Swal.fire({
                                icon: "error",
                                title: "¡Algo salió mal!",
                                text: "Contacte al Administrador",
                            });
                        }
                    } else {
                        // Ocurrió un error en la solicitud
                        console.error("Error en la solicitud:", xhr.status);
                        Swal.fire({
                            icon: "error",
                            title: "¡Algo salió mal!",
                            text: "Contacte al Administrador",
                        });
                    }
                }
            };

            // Realiza la solicitud POST al servidor (debes adaptar la URL según tu entorno)
            xhr.open('POST', 'buscar_cliente.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('cedulaClienteBuscar=' + encodeURIComponent(cedulaCliente));
        }

        function enviarFormulario() {
            // Verifica si registros está definido antes de usarlo
            if (registros) {
                // Obtén los datos del cliente
                cedulaCliente = document.getElementById('cedulaClienteBuscar').value;
                tipoDocumentoCliente = document.getElementById('tipoDocumentoCliente').value;
                nombreCliente = document.getElementById('nombreCliente').value;
                ciudadCliente = document.getElementById('ciudadCliente').value;
                direccionCliente = document.getElementById('direccionCliente').value;
                celularCliente = document.getElementById('celularCliente').value;
                emailCliente = document.getElementById('emailCliente').value; 
                
                //campos para suma y total pagar en el pdf
                var totalProductos = document.getElementById('totalProductos').value;
                var totalPagar = document.getElementById('totalPagar').value;

                // Asegúrate de usar el ID correcto del campo de correo

                // Obtén el formulario oculto
                var form = document.createElement('form');
                form.action = 'procesar_venta.php';
                form.method = 'post';
                form.style.display = 'none';

                // Itera sobre los registros y crea campos ocultos en el formulario
                registros.forEach(function(registro) {
                    agregarCampoOculto(form, 'nombre[]', registro.cells[1]?.innerText || '');
                    agregarCampoOculto(form, 'descripcion[]', registro.cells[2]?.innerText || '');
                    agregarCampoOculto(form, 'precio[]', registro.cells[3]?.innerText || '');
                    agregarCampoOculto(form, 'cantidad[]', registro.cells[4]?.innerText || '');
                    agregarCampoOculto(form, 'valorPagar[]', registro.cells[5]?.innerText || '');
                });

                // Agrega los datos del cliente al formulario
                document.body.appendChild(form);
                agregarCampoOculto(form, 'cedulaClienteBuscar', cedulaCliente);
                agregarCampoOculto(form, 'tipoDocumentoCliente', tipoDocumentoCliente);
                agregarCampoOculto(form, 'nombreCliente', nombreCliente);
                agregarCampoOculto(form, 'ciudadCliente', ciudadCliente);
                agregarCampoOculto(form, 'direccionCliente', direccionCliente);
                agregarCampoOculto(form, 'celularCliente', celularCliente);
                agregarCampoOculto(form, 'emailCliente', emailCliente);
                agregarCampoOculto(form, 'totalProductos', totalProductos);
                agregarCampoOculto(form, 'totalPagar', totalPagar);
                // Agrega los demás campos del cliente según tus necesidades

                // Adjunta el formulario al documento y envíalo
                form.submit();
            } else {
                console.error('La variable "registros" no está definida.');
            }
        }

        function agregarCampoOculto(form, nombre, valor) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = nombre;
        input.value = valor || '';
        form.appendChild(input);
}
    </script>

    <?php
    include("footer.php");
    ?>
    </body>

    </html>