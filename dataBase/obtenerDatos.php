<?php 
$id = $_POST['id'];
$usuario = $_POST['usuario'];
$analista = $_POST['analista'];
$disenador = $_POST['disenador'];
$implementador = $_POST['implementador'];
$tester = $_POST['tester'];

$user = 'root';
$password = '';
$basededatos = 'pollorobot';
$host = 'localhost';
$resultado = 0;


$conexion = mysqli_connect($host, $user, $password) or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
if (!$db) {
  die('Error de conexion ' . mysql_error());
}
$copiarAnalista = true;
$copiarDisenador = true;
$copiarImplementador = true;
$copiarTester = true;


if($analista == "Analista"){
    
    $consulta = "SELECT * FROM RelacionProyectoMiembro WHERE refProyecto='$id' AND refUsuario ='$usuario' AND rol='$analista'";
    $resultado = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos1");
    while ($columna = mysqli_fetch_array( $resultado )){
        $copiarAnalista = false;
    }
    if($copiarAnalista){
        $consulta = "INSERT INTO RelacionProyectoMiembro(refProyecto, refUsuario, rol) VALUES ('$id','$usuario','$analista')";
        $resultado = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos1");
    }
    
}
else{
    $consulta = "DELETE FROM RelacionProyectoMiembro WHERE refProyecto='$id' AND refUsuario='$usuario' AND rol='Analista'";
    $resultado = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos1");
}
if($disenador == "Diseñador"){
    $consulta2 = "SELECT * FROM RelacionProyectoMiembro WHERE refProyecto='$id' AND refUsuario ='$usuario' AND rol='$disenador'";
    $resultado2 = mysqli_query($conexion, $consulta2) or die ( "Algo ha ido mal en la consulta a la base de datos1");
    while ($columna2 = mysqli_fetch_array( $resultado2 )){
        $copiarDisenador = false;
    }
    if($copiarDisenador){
        $consulta2 = "INSERT INTO RelacionProyectoMiembro(refProyecto, refUsuario, rol) VALUES ('$id','$usuario','$disenador')";
        $resultado2 = mysqli_query($conexion, $consulta2) or die ( "Algo ha ido mal en la consulta a la base de datos1");
    }
}
else{
    $consulta2 = "DELETE FROM RelacionProyectoMiembro WHERE refProyecto='$id' AND refUsuario='$usuario' AND rol='Diseñador'";
    $resultado2 = mysqli_query($conexion, $consulta2) or die ( "Algo ha ido mal en la consulta a la base de datos1");
}

if($implementador == "Implementador"){
    $consulta = "SELECT * FROM RelacionProyectoMiembro WHERE refProyecto='$id' AND refUsuario ='$usuario' AND rol='$implementador'";
    $resultado = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos1");
    while ($columna = mysqli_fetch_array( $resultado )){
        $copiarImplementador = false;
    }
    if($copiarImplementador){
        $consulta = "INSERT INTO RelacionProyectoMiembro(refProyecto, refUsuario, rol) VALUES ('$id','$usuario','$implementador')";
        $resultado = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos1");
    }
}
else{
    $consulta = "DELETE FROM RelacionProyectoMiembro WHERE refProyecto='$id' AND refUsuario='$usuario' AND rol='Implementador')";
    $resultado = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos1");
}
if($tester == "Tester"){
    $consulta = "SELECT * FROM RelacionProyectoMiembro WHERE refProyecto='$id' AND refUsuario ='$usuario' AND rol='$tester'";
    $resultado = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos1");
    while ($columna = mysqli_fetch_array( $resultado )){
        $copiarTester = false;
    }
    if($copiarTester){
        $consulta = "INSERT INTO RelacionProyectoMiembro(refProyecto, refUsuario, rol) VALUES ('$id','$usuario','$tester')";
        $resultado = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos1");
    }
}
else{
    $consulta = "DELETE FROM RelacionProyectoMiembro WHERE refProyecto='$id' AND refUsuario='$usuario' AND rol='Tester'";
    $resultado = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos1");
}
echo $resultado;



?>