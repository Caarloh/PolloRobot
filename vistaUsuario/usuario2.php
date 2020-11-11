<?php require_once "../componentesVistaUsuario/usuario_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1 style="color:#0a133e">Proyectos a Cargo</h1>
        <div class="grid-container">
            <?php
                foreach($obtenerConexion->query("SELECT * FROM Proyecto WHERE jefeProyecto='$usuario'") as $columna) {
                    echo '
                    <div class="card">
                        <div class="card-header">
                        '.$columna['nombre'].'
                        </div>
                        <div class="card-body">
                                <p class="card-text">'.$columna['descripcion'].'</p>
                                <a href="#">'.$columna['repositorioGit'].'</a>
                        </div>
                        <div class="card-footer text-muted">
                                <a class="btn2 btn2-primary" href="../vistaJefe/jefeProyecto.php?id='.$columna['id'].'">ACCEDER</a>
                        </div>
                  </div>
                  
                        ';
                }
            ?>
            
            
        </div>
        <h1 style="color:#0a133e"></h1>
        <h1 style="color:#0a133e">Proyectos en lo que participas</h1>
        <div class="grid-container">
            <?php
                foreach($obtenerConexion->query("SELECT DISTINCT refProyecto FROM RelacionProyectoMiembro WHERE refUsuario='$usuario'") as $columna) {
                    $idProyecto = $columna['refProyecto'];
                    foreach($obtenerConexion->query("SELECT * FROM Proyecto WHERE id='$idProyecto' AND jefeProyecto!='$usuario'") as $columna2) {            
                    echo '
                    <div class="card">
                        <div class="card-header">
                        '.$columna2['nombre'].'
                        </div>
                        <div class="card-body">
                            <p class="card-text">'.$columna2['descripcion'].'</p>
                            <a href="#">'.$columna2['repositorioGit'].'</a>
                        </div>
                        <div class="card-footer text-muted">
                        <a class="btn2 btn2-primary" href="proyecto.php?id='.$columna2['id'].'">VER</a>
                        </div>
                  </div>
                  
                        ';
                }
            }
                
            ?>
            
            
        </div>


    
</div>
<!--FIN del cont principal-->

