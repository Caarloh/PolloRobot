<?php require_once "../componentesVistaAdministrador/admin_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Gestion de Usuario</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-bg-gradient-primary">Ejemplo con una tabla</h3>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <button id="btnNuevoTrabajador" type="button" class="btn btn-success bg-gradient-primary" data-toggle="modal">Nuevo</button>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tablaTrabajadores" class="table table-striped table-bordered table-condensed"
                            style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Rol</th>
                                    <th>Correo electronico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    <td>123456</td>
                                    <td>Armando</td>
                                    <td>Castillo</td>
                                    <td>tester</td>
                                    <td>acastillo@gmail.com</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTrabajador">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_proveedor" class="col-form-label">Proveedor:</label>
                            <input type="number" class="form-control" id="id_proveedor">
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="forma" class="col-form-label">Forma:</label>
                            <input type="text" class="form-control" id="forma">
                        </div>
                        <div class="form-group">
                            <label for="precio" class="col-form-label">Precio:</label>
                            <input type="number" class="form-control" id="precio">
                        </div>
                        <div class="form-group">
                            <label for="stock" class="col-form-label">Stock:</label>
                            <input type="number" class="form-control" id="stock">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   


</div>
<!--FIN del cont principal-->

<?php require_once "../componentesVistaAdministrador/admin_inferior.php"?>