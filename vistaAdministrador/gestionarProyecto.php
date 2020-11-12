<?php require_once "../componentesVistaAdministrador/admin_superior.php"
?>
<div class="container">
    <h1>Gestion de Proyecto</h1>
<div class="container">


            <div class="row">
                <div class="col-lg-12">
                    <button id="btnNuevoProyecto" type="button" class="btn btn-success bg-gradient-primary" data-toggle="modal">Crear Proyecto</button>
                </div>
            </div>
    </div>

    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--Cabecera del modal-->
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formProyecto" >
                    <div class="modal-body">
                        <!-- Cuerpo del Modal-->
                        <div class="row justify-content-center align-items-center minh-100">
                            <!-- Imagen -->
                            <div class="col-sm-4">
                                <img src="../img/polloicon.png" class="rounded img-fluid " >
                            </div>
                            <!-- Inputs-->
                            <div class="col-sm-12 row justify-content-center align-items-center minh-100">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="nombre" class="col-form-label">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion" class="col-form-label">Descripcion:</label>
                                        <input type="text" class="form-control" id="descripcion">
                                    </div>
                                    <div class="form-group" method="post" action="#">
                                        <label for="jefe" class="col-form-label">Jefe de Proyecto:</label>
                                        <input class="form-control" type="text" name="jefe" id="jefe" placeholder="Buscar...">
                                    </div>
                                    <div class="form-group" id="suggestions"></div>
                                    <div class="form-group">
                                        <label for="repGit" class="col-form-label">Repositorio Git:</label>
                                        <input type="text" class="form-control" id="repGit">
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                    </div>

                    <div class="modal-footer">
                        <!--Guardar y cancelar-->
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--FIN del cont principal-->

<?php require_once "../componentesVistaAdministrador/admin_inferior.php"?>