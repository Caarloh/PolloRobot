<?php 

    $conect = mysqli_connect('localhost','root','','pollorobot');

    $usuario=$_POST['usuario'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $correo=$_POST['correo'];
    $cargo=$_POST['cargo'];
    $contrasena=$_POST['contrasena'];
    $perfilGit=$_POST['perfilGit'];
    $tipoEmpleado=$_POST['tipoEmpleado'];

    $sql = "INSERT into empleado (usuario, nombre, apellidos, correo, cargo, contrasena, perfilGit, tipoEmpleado)
                values ('$usuario','$nombre','$apellidos','$correo','$cargo','$contrasena','$perfilGit','$tipoEmpleado')";
    echo mysqli_query($conect,$sql);
?>