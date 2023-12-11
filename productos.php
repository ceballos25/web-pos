<?php
require 'conexion.php';
$sql = "SELECT id, nombre_producto, descripcion_producto, precio_producto, activo FROM productos";
$resultado = $mysqli->query($sql);
?>

<?php

include("header.php");

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Productos</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Panel de Control</a></li>
                <li class="breadcrumb-item active">Productos</li>
            </ol>
            <div class="container-fluid m-3">
                <button type="button" class="btn btn-success d-flex ms-auto" data-bs-toggle="modal" data-bs-target="#modalAddProducto">
                    Nuevo Producto <i class="fas fa-truck m-1" style="color: #ffffff;"></i>
                </button>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tabla Productos
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
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
                        <tfoot>
                            <tr>
                            <th>Id</th>
                                <th>Nombre Producto</th>
                                <th>Descripción</th>
                                <th>Precio CDU</th>
                                <th>Activo</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php while ($row = $resultado->fetch_assoc()) { ?>

                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['nombre_producto'] ?></td>
                                    <td><?php echo $row['descripcion_producto'] ?></td>
                                    <td><?php echo $row['precio_producto'] ?></td>
                                    <td><?php echo $row['activo'] ?></td>
                                    <td>
                                    <button class="btn btn-editar-producto m-0 p-0" data-bs-toggle="modal" data-bs-target="#modalEditarPoructo" data-toggle="tooltip" data-placement="top" title="Editar" data-id="<?php echo $row['id'] ?>" data-nombre_producto="<?php echo $row['nombre_producto'] ?>" data-descripcion_producto="<?php echo $row['descripcion_producto'] ?>" data-precio_producto="<?php echo $row['precio_producto'] ?>" data-activo="<?php echo $row['activo'] ?>">
                                        <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-eliminar-producto mx-1 p-0" data-toggle="tooltip" data-placement="top" title="Eliminar" data-id-eliminar-producto="<?php echo $row['id'] ?>" >
                                        <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Agregar producto -->
    <div class="modal fade" id="modalAddProducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crear Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" action="crearProducto.php">
                        <div class="col-md-6">
                            <label for="nombre_producto" class="form-label">Nombre Producto</label>
                            <input type="text" class="form-control text-uppercase" id="nombre_producto" name="nombre_producto" required>
                        </div>
                        <div class="col-md-6">
                            <label for="descripcion_producto" class="form-label">Descripción Producto</label>
                            <textarea class="form-control text-uppercase" id="descripcion_producto" name="descripcion_producto" rows="2" cols="10" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="precio_producto" class="form-label">Precio CDU</label>
                            <input type="text" class="form-control text-uppercase precio_producto" id="precio_producto" name="precio_producto" required>
                        </div>
                        <div class="col-6">
                            <label for="activo" class="form-label">Activo</label>
                            <select id="activo" name="activo" class="form-select" required>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>

                            </select>
                        </div>
                </div>
                
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Crear</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Modal editar producto -->
    <div class="modal fade" id="modalEditarPoructo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" action="editarProducto.php">
                        <div class="col-md-6">
                            <label class="form-label">Nombre Producto</label>
                            <input type="hidden" name="id_producto_modal_update" id="id_producto_modal_update">                            
                            <input type="text" class="form-control text-uppercase" id="nombre_producto_modal_update" name="nombre_producto_modal_update" required>
                        </div>
                        <div class="col-md-6">
                            <label for="descripcion_producto" class="form-label">Descripción Producto</label>
                            <textarea class="form-control text-uppercase" id="descripcion_producto_modal_update" name="descripcion_producto_modal_update" rows="2" cols="10" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="precio_producto" class="form-label">Precio CDU</label>
                            <input type="text" class="form-control text-uppercase" id="precio_producto_modal_update" name="precio_producto_modal_update" required>
                        </div>
                        <div class="col-6">
                            <label for="activo" class="form-label">Activo</label>
                            <select id="activo_producto_modal_update" name="activo_producto_modal_update" class="form-select" required>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>

                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <?php
    include("footer.php");
    ?>
    </body>

    </html>