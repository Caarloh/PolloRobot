<?php 

    $conect = mysqli_connect('localhost','root','','pollorobot');

    
    if ($sql = $conect->query("SELECT * FROM proyecto")){

        $id = $sql->num_rows;
    }
    $nombre=$_POST['nombre'];
    $descripcion=$_POST['descripcion'];
    $repGit=$_POST['repGit'];
    $jefe=$_POST['jefe'];


    $sql = "INSERT into proyecto (id, nombre, descripcion, repositorioGit, jefeProyecto)
                values ('$id','$nombre','$descripcion','$repGit','$jefe')";
    echo mysqli_query($conect,$sql);
?>