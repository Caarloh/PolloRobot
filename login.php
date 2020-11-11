<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pollo Robot - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Favicon  -->
 <link rel="icon" href="img/favicon.ico">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>






<body class="log-bg">
<div id="wrapper">   
<!-- Topbar -->
	<nav class="lg-bar">

		<img class="im-login" id=im-login src="https://1.bp.blogspot.com/-i2uV-KM_sJ4/X5Dmw-sOEQI/AAAAAAAACNU/cLtL_TM4K1UotOfNzx83DnP-L58GDSOnACLcBGAsYHQ/s300/LOGOTIPO.png">

	</nav>
</div>
  	<div class="container">

    <!-- Outer Row -->
    	<div class="row justify-content-center">

      		<div class="col-xl-10 col-lg-12 col-md-9">

        		<div class="card o-hidden border-0 shadow-lg my-5">
          			<div class="card-body p-0">
            		<!-- Nested Row within Card Body -->
            			<div class="row">
              				<div class="col-lg-6">
            					<div class="p-5">
              						<div class="text-center">
                						<h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
              						</div>
           							<form class="user" method="post">
			     						<table width="330" height="250" border="0" class="text">
			          						<div class="form-group">
			             						<td><input class="form-control" type="text" name="email" id="correo" placeholder="Ingresa el correo o usuario..."></td> 
			         						</div>
									        <tr>
									            <td><input class="form-control" type="password" name="password" id="pass" placeholder="Contraseña"></td> 
									        </tr>
									        <tr>
									            <td align="center">
									                <button class="blueButton" type="submit" id="boton" name="entrar" >Entrar</button>
									            </td>
									        </tr>
									    </table>
									</form>	

		                   		 	<?php
		                   		 		#Conexion
		                   		 		include_once "dataBase/conexion.php";
									    $objeto = new Conexion();
									    $conexion = $objeto->Conectar();

										$email="";
										$password="";
										$user="";
									    if(isset($_POST['entrar'])){
											$email=$_POST['email'];
											$user=$_POST['email'];
											$password=$_POST['password'];
											
									    }
		                    			#echo $email;
		                    			#echo $password;
			                    		#Consulta
										$sqlConsulta  ="SELECT * FROM Empleado";
										$resultado = $conexion->prepare($sqlConsulta);
									    $resultado->execute();
									    $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
									    $i=0;
										while($i<sizeof($data)){
											if( ($data[$i]['usuario']==$user or $data[$i]['correo']==$email)){
												if($data[$i]['contrasena']==$password){
													$_SESSION["usuario"] = $data[$i]['usuario'];//guardamos la variable
													$usuario = $_SESSION["usuario"];
													header ('Location: vistaUsuario/usuario.php');
													##header("location: index.php");
												}
											}
											$i++;
										}
			                    	?>
              						<hr>
	                  				<div class="text-center">
	                    				<a class="small" href="forgot-password.html">Olvido su contraseña?</a>
              						</div>
            					</div>
          					</div>
            			</div>
          			</div>
        		</div>
      		</div>
    	</div>
  	</div>




	  
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>




</body>

</html>
