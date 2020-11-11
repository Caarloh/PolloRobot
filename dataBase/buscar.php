<?php
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'root');
define('DB_SERVER_PASSWORD', '');
define('DB_DATABASE', 'pollorobot');
 
$connexion = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
 
$html = '';
$jefe = $_POST['jefe'];
 
$result = $connexion->query(
    'SELECT * FROM empleado 
    WHERE usuario LIKE "%'.strip_tags($jefe).'%" 
    OR correo LIKE "%'.strip_tags($jefe).'%"'
);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<div><a class="suggest-element" data="'.utf8_encode($row['usuario']).'" id="usuario'.$row['usuario'].'">'.utf8_encode($row['usuario']).'</a></div>';
    }
} else {
    $html.="NO HAY DATOS :(";
}
echo $html;
?>