<?php
include_once'../dataBase/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = $_POST['Nom'];


$consulta = "DELETE FROM tarea WHERE tarea.nombre= '$nombre' ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

?>
