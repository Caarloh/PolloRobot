<?php 

    $conect = mysqli_connect('localhost','root','','pollorobot');

    $miembro=$_POST['miembro'];
    $rol=$_POST['rol'];
    $idref =$_POST['idref'];


    $sql = "INSERT into relacionproyectomiembro (refProyecto, refUsuario, rol)
                values ('$idref','$miembro','$rol')";
    echo mysqli_query($conect,$sql);
?>