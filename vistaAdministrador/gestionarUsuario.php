<?php require_once "../componentesVistaAdministrador/admin_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Gestion de Usuario</h1>

    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <button id="btnNuevoTrabajador" type="button" class="btn btn-success bg-gradient-primary" data-toggle="modal">Ingresar Usuario</button>
                </div>
            </div>
    </div>
    <!--<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-bg-gradient-primary">Ejemplo con una tabla</h3>
        </div>
        <br>
        
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
    </div>-->
    
    <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--Cabecera del modal-->
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTrabajador" >
                    <div class="modal-body">
                        <!-- Cuerpo del Modal-->
                        <div class="row justify-content-center align-items-center minh-100">
                            <!-- Imagen -->
                            <div class="col-sm-4">
                                <img src="../img/polloRegistro.jpg" class="rounded img-fluid " >
                            </div>
                            <!-- Inputs-->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre">
                                </div>
                                <div class="form-group">
                                    <label for="apellidos" class="col-form-label">Apellidos:</label>
                                    <input type="text" class="form-control" id="apellidos">
                                </div>
                                <div class="form-group">
                                    <label for="correo" class="col-form-label">Correo:</label>
                                    <input type="text" class="form-control" id="correo">
                                </div>
                                <div class="form-group">
                                    <label for="cargo" class="col-form-label">Cargo:</label><br>
                                        <input type="radio" name="cargo" id="jefeProyecto" value="Jefe de Proyecto">
                                        <label for="Jefe de Proyecto">Jefe de Proyecto</label><br>
                                       
                                        <input type="radio" name="cargo" id="empleado" value="Empleado">
                                        <label for="Empleado">Empleado</label><br>
                                </div>
                                <div class="form-group">
                                    <label for="paginagit" class="col-form-label">Página de Git:</label>
                                    <input type="text" class="form-control" id="paginagit">
                                </div>
                            </div>
                        </div>
                            
                    </div>
                    <div class="modal-footer">
                        <!--Guardar y cancelar-->
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