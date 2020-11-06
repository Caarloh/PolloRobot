<?php
    session_start();
    $usuario = $_SESSION["usuario"];
?>
<?php require_once "../componentesVistaUsuario/usuario_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">

    <?php
    include_once "../dataBase/conexion.php";
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT id, nombre, descripcion, reposirotioGit FROM proyecto";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>


    <div class="row">
        <div class="col-6">
            <h3 style="color:black" ;>Titulo del proyecto</h3>
        </div>
        <div class="col-sm">
            <button class="btn btn-secondary btn-icon-split" id="btnRepo">
                <span class="icon text-white-80">
                    <i class="fab fa-github fa-lg"></i>
                </span>
                <span class="text">Repositorio</span>
            </button>
        </div>
        <div class="col-sm">
            <button class="btn btn-secondary btn-icon-split" id="btnTarea">
                <span class="icon text-white-80">
                    <i class="fas fa-plus fa-lg"></i>
                </span>
                <span class="text">Agregar Tarea</span>
            </button>
        </div>
    </div>

    <br>

    <div id="loadingScreen">
        <div class="loader"></div>
    </div>

    <div class="boards overflow-auto p-0" id="boardsContainer">
    </div>

    <!--Modal para Tarea-->
    <div class="modal fade" id="modalTarea" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTarea">
                    <form class="form-inline">
                        <div class="modal-body">
                            <label for="nombreInput">Nombre:</label>
                            <input class="form-control form-control-sm" type="text" name="nombre" id="nombreInput"
                                autocomplete="off">

                            <label for="descripcionInput">Descripcion:</label>
                            <input class="form-control form-control-sm" type="text" name="descripcion"
                                id="descripcionInput" autocomplete="off">

                            <label for="prioridad" class="col-form-label">Participantes:</label>
                            <br>
                            <div class="well" style="max-height: 300px;overflow: auto;">
                                <ul class="list-group checked-list-box">
                                    <li class="list-group-item">Pepe</li>
                                    <li class="list-group-item">Juan</li>
                                    <li class="list-group-item">Etesech</li>
                                </ul>
                            </div>

                            <label for="prioridad" class="col-form-label">Prioridad:</label>
                            <br>
                            <input class="btn btn-success btn-md" type="button" value="Baja" id="prioridadInput">
                            <input class="btn btn-warning btn-md" type="button" value="Media" id="prioridadInput">
                            <input class="btn btn-primary btn-md" type="button" value="Alta" id="prioridadInput">
                            <input class="btn btn-danger btn-md" type="button" value="Critica" id="prioridadInput">
                            <br>

                            <label for="fechaInput" class="col-form-label">Fecha:</label>
                            <input class="form-control" type="date" id="fechaInput">
                            <br>

                            <button class="btn btn-dark" type="submit" id="add">Agregar</button>
                        </div>
                    </form>
                </form>
            </div>
        </div>
    </div>

    <!--Modal para Repositorio-->
    <div class="modal fade" id="modalRepo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <br>
                <div class="col-lg" <label for="repositorio"> https://github.com/Caarloh/PolloRobot</label>
                </div>
                <br>
            </div>
        </div>
    </div>

</div>
<!--FIN del cont principal-->

<?php require_once "../componentesVistaUsuario/usuario_inferior.php"?>