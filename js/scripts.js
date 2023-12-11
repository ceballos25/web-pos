
$(document).ready(function() {
        // Toggle the side navigation
        const sidebarToggle = document.body.querySelector('#sidebarToggle');
        if (sidebarToggle) {
            // Uncomment Below to persist sidebar toggle between refreshes
            // if (localStorage.getItem('sb|sidebar-toggle') === 'tarue') {
            //     document.body.classList.toggle('sb-sidenav-toggled');
            // }
            sidebarToggle.addEventListener('click', event => {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
            });
        }

        //INICIA SCRIPT CLIENTES
    $('.btn-editar').click(function() {
        // Obtener los valores de los atributos de datos
        var id_cliente = $(this).data('id');
        var nombre = $(this).data('nombre_cliente');
        var tipoDocumento = $(this).data('tipo-documento');
        var numeroDocumento = $(this).data('numero-documento');
        var ciudad = $(this).data('ciudad');
        var direccion = $(this).data('direccion');
        var celular = $(this).data('celular');
        var email = $(this).data('email');

        // Modificar dinámicamente los valores en el modal
        $('#id_cliente_modal_update').val(id_cliente);
        $('#nombre_cliente_modal_update').val(nombre);
        $('#tipo_documento_modal_update').val(tipoDocumento);
        $('#numero_documento_modal_update').val(numeroDocumento);
        $('#ciudad_modal_update').val(ciudad);
        $('#direccion_domicilio_update').val(direccion);
        $('#celular_modal_update').val(celular);
        $('#email_modal_update').val(email);

        // Mostrar el modal
        $('#modalEditarCliente').modal('show');
    });

    $('.btn-eliminar').click(function () {
        // Obtén el ID a eliminar desde el botón
        var idEliminar = $(this).data('id-eliminar');

        // Muestra una alerta de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción no se puede deshacer',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si se confirma, redirige a la página de eliminación con el ID
                window.location.href = 'eliminarCliente.php?id=' + idEliminar;
            }
        });
    });
        //--------------FINALIZA SCRIPT CLIENTES ----------------------------

        //--------------INICIA SCRIPT DE PRODUCTOS--------------------------
        $('.btn-editar-producto').click(function() {
            // Obtener los valores de los atributos de datos
            var id_producto = $(this).data('id');
            var nombre_pruducto = $(this).data('nombre_producto');
            var descripcion_producto = $(this).data('descripcion_producto');
            var precio_producto = $(this).data('precio_producto');
            var activo = $(this).data('activo');
    
            // Modificar dinámicamente los valores en el modal
            $('#id_producto_modal_update').val(id_producto);
            $('#nombre_producto_modal_update').val(nombre_pruducto);
            $('#descripcion_producto_modal_update').val(descripcion_producto);
            $('#precio_producto_modal_update').val(precio_producto);
            $('#activo_producto_modal_update').val(activo);
    
            // Mostrar el modal
            $('#modalEditarPoructo').modal('show');
        });
        
        $('.btn-eliminar-producto').click(function () {
            // Obtén el ID a eliminar desde el botón
            var idEliminarProducto = $(this).data('id-eliminar-producto');
    
            // Muestra una alerta de confirmación
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción no se puede deshacer',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si se confirma, redirige a la página de eliminación con el ID
                    window.location.href = 'eliminarProducto.php?id=' + idEliminarProducto;
                }
            });
        });
        //--------------FINALIZA SCRIPT DE PRODUCTOS------------------------


        //--------------INICIA BOTON PARA LOS CAMPOS DE TIPO PRECIO---------------
        //este código se usó para que no tengan que poner los puntos si no que el sistema se los ponga cada 3 dígitos
        //se utilizó por clase con el metodo querySelectorAll
        const precio = document.querySelectorAll('.precio_producto');

        precio.forEach(function(input) {
            input.addEventListener('input', function(e) {
                let value = this.value.toString().replace(/\./g, '');
                let formattedValue = '';

                value = value.replace(/[^0-9]/g, '');

        
                if (value.length >= 7) {
                    formattedValue = value.slice(0, -6) + '.' + value.slice(-6, -3) + '.' + value.slice(-3);
                } else if (value.length >= 4) {
                    formattedValue = value.slice(0, -3) + '.' + value.slice(-3);
                } else {
                    formattedValue = value;
                }
        
                // Asigna el valor formateado de vuelta al campo de entrada
                this.value = formattedValue;
            });
        });
                
});
