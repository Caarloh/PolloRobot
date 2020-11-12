<?php require_once "../componentesVistaAdministrador/admin_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Panel de Administración</h1>

    <div class="grid-container">
        <div class="card">

                        <div class="card-bodyAdmin">
                            <img class="img-card" src="https://static.wixstatic.com/media/a2eeb0_d88071155db24fcaa7f8025f3e0433d0~mv2.jpg/v1/fill/w_580,h_365,al_c,q_90/a2eeb0_d88071155db24fcaa7f8025f3e0433d0~mv2.jpg">
                        </div>
                        <button id="btnNuevoTrabajador" type="button" class="btnAdmin btn-successAdmin bg-gradient-primaryAdmin" data-toggle="modal" data-target="#modal1">Ingresar Usuario</button>                   
    </div>

    <div class="card">
   
                    <div class="card-bodyAdmin">
                        <img class="img-card" src="https://www.nyfa.edu/student-resources/wp-content/uploads/2015/04/laptop-3373638_640.jpg">
                    </div>
                    <button id="btnNuevoProyecto" type="button" class="btnAdmin btn-successAdmin bg-gradient-primaryAdmin" data-toggle="modal" data-target="#modal2">Crear Proyecto</button>
                        </div>
                   
    </div>




            
    </div>
    
            </div>
        </div>
    </div>
    
    <!--Modal para CRUD-->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form id="formTrabajador" >
                    <div class="modal-body">
                        <!-- Cuerpo del Modal-->
                        <div class="row justify-content-center align-items-center minh-100">
                            <!-- Imagen -->
                            <div class="col-sm-4">
                                <img src="../img/polloRegistro.jpg" class="rounded img-fluid " >
                            </div>
                            <!-- Inputs-->
                            <div class="col-sm-12 row justify-content-center align-items-center minh-100">
                                <div class="col-sm-12">
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
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="cargo" class="col-form-label">Cargo:</label><br>

                                            <input type="radio" name="cargo" id="jefeProyecto" value="Jefe de Proyecto" onclick="ocultarTipos()">
                                            <label for="Jefe de Proyecto">Jefe de Proyecto</label><br>
                                        
                                            <input type="radio" name="cargo" id="empleado" value="Empleado" onclick="mostrarTipos()">
                                            <label for="Empleado">Empleado</label><br>
                                    </div>
                                    <div class="form-group" id="tipos">
                                        <label for="cargo" class="col-form-label">Tipo de Empleado:</label><br>

                                            <input type="radio" name="tipo" id="analista" value="Analista">
                                            <label for="Analista">Analista </label><br>

                                            <input type="radio" name="tipo" id="diseniador" value="Diseniador">
                                            <label for="Diseniador">Diseñador </label><br>

                                            <input type="radio" name="tipo" id="programador" value="Programador">
                                            <label for="Programador">Programador </label><br>

                                            <input type="radio" name="tipo" id="tester" value="Tester">
                                            <label for="Tester">Tester </label><br>
                                    </div>
                                    <div class="form-group" id="prueba" >
                                        <label for="paginagit" class="col-form-label">Página de Git:</label>
                                        <input type="text" class="form-control" id="paginagit">
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                    <div class="modal-footer">
                        <!--Guardar y cancelar-->
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-success" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <button type="submit" id="btnGuardar1" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   
   


</div>
<!--FIN del cont principal--> 
<script>
    function mostrarTipos(){
        document.getElementById("tipos").style.display = "block";
    }
    function ocultarTipos(){
        document.getElementById("tipos").style.display = "none";
    }

    
</script>
<?php require_once "../componentesVistaAdministrador/admin_inferior.php"?>
