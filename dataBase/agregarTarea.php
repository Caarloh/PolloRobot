<?php
include_once'../dataBase/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = $_POST['Nom'];
$descripcion = $_POST['Desc'];
$prioridad = $_POST['Prio'];
$fecha = $_POST['Fech'];

$consulta = "INSERT INTO tarea ( nombre, descripcion, prioridad, estado, fechaLimite, refProyecto) VALUES( '$nombre', '$descripcion', '$prioridad','valido' , '$fecha','1') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

?>
