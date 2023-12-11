<?php
require 'conexion.php';
$sql = "SELECT id, nombre_cliente, tipo_documento, numero_documento, ciudad, direccion_domicilio, celular, email FROM clientes";
$resultado = $mysqli->query($sql);
?>

<?php

include("header.php");

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Clientes</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Panel de Control</a></li>
                <li class="breadcrumb-item active">Clientes</li>
            </ol>
            <div class="container-fluid m-3">
                <button type="button" class="btn btn-success d-flex ms-auto" data-bs-toggle="modal" data-bs-target="#modalAddCliente">
                    Nuevo Cliente <i class="fas fa-user-plus m-1" style="color: #ffffff;"></i>
                </button>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Tabla Clientes
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Tipo Doc.</th>
                                <th>N° Doc.</th>
                                <th>Ciudad</th>
                                <th>Dirección</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Tipo Doc.</th>
                                <th>N° Doc.</th>
                                <th>Ciudad</th>
                                <th>Dirección</th>
                                <th>Celular</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php while ($row = $resultado->fetch_assoc()) { ?>

                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['nombre_cliente'] ?></td>
                                    <td><?php echo $row['tipo_documento'] ?></td>
                                    <td><?php echo $row['numero_documento'] ?></td>
                                    <td><?php echo $row['ciudad'] ?></td>
                                    <td><?php echo $row['direccion_domicilio'] ?></td>
                                    <td><?php echo $row['celular'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td>
                                        <button class="btn btn-editar m-0 p-0" data-toggle="tooltip" data-placement="top" title="Editar" data-id="<?php echo $row['id'] ?>" data-nombre_cliente="<?php echo $row['nombre_cliente'] ?>" data-tipo-documento="<?php echo $row['tipo_documento'] ?>" data-numero-documento="<?php echo $row['numero_documento'] ?>" data-ciudad="<?php echo $row['ciudad'] ?>" data-direccion="<?php echo $row['direccion_domicilio'] ?>" data-celular="<?php echo $row['celular'] ?>" data-email="<?php echo $row['email'] ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-eliminar m-0 p-0 mx-1" data-toggle="tooltip" data-placement="top" title="Eliminar" id="btn-eliminar" data-id-eliminar="<?php echo $row['id'] ?>">
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

    <!-- Modal Agregar Cliente -->
    <div class="modal fade" id="modalAddCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Crear Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" action="crearCliente.php">
                        <div class="col-md-6">
                            <label for="nombre_cliente" class="form-label">Nombre</label>
                            <input type="text" class="form-control text-uppercase" id="nombre_cliente" name="nombre_cliente" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tipo_documento" class="form-label">Tipo Documento</label>
                            <select id="tipo_documento" name="tipo_documento" class="form-select" required>
                                <option></option>
                                <option value="C.C">C.C</option>
                                <option value="NIT">NIT</option>
                                <option value="PASAPORTE">Pasaporte</option>
                                <option value="C.E">Cedula de Extrangería</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="numero_documento" class="form-label">N° documento</label>
                            <input type="number" class="form-control text-uppercase" id="numero_documento" name="numero_documento" required>
                        </div>
                        <div class="col-6">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <select id="ciudad" name="ciudad" class="form-select" required>
                                <option selected>Seleccione...</option>
                                <option value="Arauca">Arauca</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Barranquilla">Barranquilla</option>
                                <option value="Bogotá">Bogotá</option>
                                <option value="Bucaramanga">Bucaramanga</option>
                                <option value="Cali">Cali</option>
                                <option value="Cartagena">Cartagena</option>
                                <option value="Cúcuta">Cúcuta</option>
                                <option value="Florencia">Florencia</option>
                                <option value="Ibagué">Ibagué</option>
                                <option value="Leticia">Leticia</option>
                                <option value="Manizales">Manizales</option>
                                <option value="Medellín">Medellín</option>
                                <option value="Mitú">Mitú</option>
                                <option value="Mocoa">Mocoa</option>
                                <option value="Montería">Montería</option>
                                <option value="Neiva">Neiva</option>
                                <option value="Pasto">Pasto</option>
                                <option value="Pereira">Pereira</option>
                                <option value="Popayán">Popayán</option>
                                <option value="Puerto Carreño">Puerto Carreño</option>
                                <option value="Puerto Inírida">Puerto Inírida</option>
                                <option value="Quibdó">Quibdó</option>
                                <option value="Riohacha">Riohacha</option>
                                <option value="San Andrés">San Andrés</option>
                                <option value="San José del Guaviare">San José del Guaviare</option>
                                <option value="Santa Marta">Santa Marta</option>
                                <option value="Sincelejo">Sincelejo</option>
                                <option value="Tunja">Tunja</option>
                                <option value="Valledupar">Valledupar</option>
                                <option value="Villavicencio">Villavicencio</option>
                                <option value="Yopal">Yopal</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="direccion_domicilio" class="form-label">Dirección</label>
                            <input type="text" class="form-control text-uppercase" id="direccion_domicilio" name="direccion_domicilio" required>
                        </div>
                        <div class="col-md-6">
                            <label for="celular" class="form-label">N° Celular</label>
                            <input type="number" class="form-control text-uppercase" id="celular" name="celular" required>
                        </div>

                        <div class="col-md-12">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control text-uppercase" id="email" name="email" required>
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

    <!-- Modal editar Cliente -->
    <div class="modal fade" id="modalEditarCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Editar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" action="editarCliente.php">
                        <div class="col-md-6">
                            <label for="id_cliente_modal_update" class="form-label">Id</label>
                            <input type="text" style="cursor: not-allowed;" class="form-control bg-light" id="id_cliente_modal_update" name="id_cliente_modal_update" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre_cliente_modal_update" class="form-label">Nombre</label>
                            <input type="text" class="form-control text-uppercase" id="nombre_cliente_modal_update" name="nombre_cliente_modal_update" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tipo_documento_modal_update" class="form-label">Tipo Documento</label>
                            <select id="tipo_documento_modal_update" name="tipo_documento_modal_update" class="form-select" required>
                                <option selected>Seleccione...</option>
                                <option value="C.C">C.C</option>
                                <option value="NIT">NIT</option>
                                <option value="PASAPORTE">Pasaporte</option>
                                <option value="C.E">Cedula de Extrangería</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="numero_documento_modal_update" class="form-label">N° documento</label>
                            <input type="number" class="form-control text-uppercase" id="numero_documento_modal_update" name="numero_documento_modal_update" required>
                        </div>
                        <div class="col-6">
                            <label for="ciudad_modal_update" class="form-label">Ciudad</label>
                            <select id="ciudad_modal_update" name="ciudad_modal_update" class="form-select" required>
                                <option selected>Seleccione...</option>
                                <option value="ARAUCA">Arauca</option>
                                <option value="ARMENIA">Armenia</option>
                                <option value="BARRANQUILLA">Barranquilla</option>
                                <option value="BOGOTÁ">Bogotá</option>
                                <option value="BUCARAMANGA">Bucaramanga</option>
                                <option value="CALI">Cali</option>
                                <option value="CARTAGENA">Cartagena</option>
                                <option value="CÚCUTA">Cúcuta</option>
                                <option value="FLORENCIA">Florencia</option>
                                <option value="IBAGUÉ">Ibagué</option>
                                <option value="LETICIA">Leticia</option>
                                <option value="MANIZALES">Manizales</option>
                                <option value="MEDELLÍN">Medellín</option>
                                <option value="MITÚ">Mitú</option>
                                <option value="MOCOA">Mocoa</option>
                                <option value="MONTERÍA">Montería</option>
                                <option value="NEIVA">Neiva</option>
                                <option value="PASTO">Pasto</option>
                                <option value="PEREIRA">Pereira</option>
                                <option value="POPAYÁN">Popayán</option>
                                <option value="PUERTO CARREÑO">Puerto Carreño</option>
                                <option value="PUERTO INÍRIDA">Puerto Inírida</option>
                                <option value="QUIBDÓ">Quibdó</option>
                                <option value="RIOHACHA">Riohacha</option>
                                <option value="SAN ANDRÉS">San Andrés</option>
                                <option value="SAN JOSÉ DEL GUAVIARE">San José del Guaviare</option>
                                <option value="SANTA MARTA">Santa Marta</option>
                                <option value="SINCELEJO">Sincelejo</option>
                                <option value="TUNJA">Tunja</option>
                                <option value="VALLEDUPAR">Valledupar</option>
                                <option value="VILLAVICENCIO">Villavicencio</option>
                                <option value="YOPAL">Yopal</option>

                            </select>
                        </div>
                        <div class="col-6">
                            <label for="direccion_domicilio_update" class="form-label">Dirección</label>
                            <input type="text" class="form-control text-uppercase" id="direccion_domicilio_update" name="direccion_domicilio_update" required>
                        </div>
                        <div class="col-md-6">
                            <label for="celular_modal_update" class="form-label">N° Celular</label>
                            <input type="number" class="form-control text-uppercase" id="celular_modal_update" name="celular_modal_update" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email_modal_update" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control text-uppercase" id="email_modal_update" name="email_modal_update" required>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Editar</button>
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