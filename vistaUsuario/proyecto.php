<?php require_once "../componentesVistaUsuario/proyecto_superior.php";
?>





<!--INICIO del cont principal-->
<div class="container">
    <?php

    $consulta = 'SELECT id, nombre, repositorioGit FROM proyecto WHERE id LIKE "%'.$id.'%"';
    $resultado = $obtenerConexion->prepare($consulta);
    $resultado->execute();
    $data=$resultado;
    ?>



<div class="row">
    <?php                            
     foreach($data as $dat) {                                                        
    ?>    
        <div class="col-6">
            <h3 style="color:#242c75" ;><?php echo $dat['nombre'] ?></h3>
        </div>
    <?php
    break;
    }
    ?>


        <div class="col-sm">
            <button class="btn btn-secondary btn-icon-split" id="btnRepo">
                <span class="icon text-white-80">
                    <i class="fab fa-github fa-lg"></i>
                </span>
                <span class="text">Repositorio</span>
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
                        <div class="modal-body">
                            
                            <label for="nombreInput">Nombre:</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" >

                            <label for="descripcionInput">Descripcion:</label>
                            <input class="form-control" type="text" name="descripcion" id="descripcion" >
                            
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="prioridad">Prioridad</label>
                                </div>
                                <select class="custom-select"  name="prioridad" id="prioridad" >
                                    <option selected></option>
                                    <option value="baja">Baja</option>
                                    <option value="media">Media</option>
                                    <option value="alta">Alta</option>
                                </select>
                            </div>

                            <label for="fechaInput" class="col-form-label">Fecha:</label>
                            <input class="form-control" type="date" name="fecha" id="fecha" >
                            <br>

                            <button class="btn btn-dark" type="submit" id="add">Agregar</button>
                        </div>
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
                <?php                            
                foreach($data as $dat) {                                                        
                ?>    
                <div class="col-lg" <label for="repositorio"> <?php echo $dat['repositorioGit'] ?></label></div>
                <?php
                }
                ?>
                
                <br>
            </div>
        </div>
    </div>

</div>
<!--FIN del cont principal-->

<?php require_once "../componentesVistaUsuario/proyecto_inferior.php"?>