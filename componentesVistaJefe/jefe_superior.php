<<<<<<< Updated upstream
=======
<?php
  require_once "../dataBase/conexion.php";
  // error_reporting(error_reporting() & ~E_NOTICE);
  $id = $_GET['id'];
  $conexionBase = new Conexion();
  $obtenerConexion = $conexionBase->Conectar();
?>

>>>>>>> Stashed changes
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pollo Robot</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="../css/tablero.css">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
<!-- Favicon  -->
<link rel="icon" href="../img/favicon.ico">

<!-- Latest compiled and minified JavaScript -->
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../vendor/datatables/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="../vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css"/>
  <style>
    #suggestions {
      box-shadow: 2px 2px 8px 0 rgba(0,0,0,.2);
      height: auto;
      position: absolute;
      top: 45px;
      z-index: 9999;
      width: 206px;
  }
 
  #suggestions .suggest-element {
      background-color: #EEEEEE;
      border-top: 1px solid #d6d4d4;
      cursor: pointer;
      padding: 8px;
      top: 45px;
      z-index: 9999;
      width: 100%;
      float: left;
  }</style>
  
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-block align-items-center justify-content-center" href="admin.php">
        <img class="img" src="https://1.bp.blogspot.com/-i2uV-KM_sJ4/X5Dmw-sOEQI/AAAAAAAACNU/cLtL_TM4K1UotOfNzx83DnP-L58GDSOnACLcBGAsYHQ/s300/LOGOTIPO.png">
        <br>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
<<<<<<< Updated upstream
        <a class="nav-link" href="../vistaJefe/jefeProyecto.php">
        <i class="fas fa-code"></i>
          <span style="font-size: 1.1em";>Proyectos</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../vistaJefe/tableroProyecto.php">
        <i class="fab fa-trello"></i>
          <span style="font-size: 1.1em";>Tareas</span></a>
=======
        <a class="nav-link" href="../vistaUsuario/usuario.php">
        <i class="fas fa-chevron-left"></i>
          <span style="font-size: 1.1em">Volver</span></a>
>>>>>>> Stashed changes
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
        <div class="col-lg-12">
            <button id="btnAddMiembro" type="button" class="btn btn-success bg-gradient-primary" data-toggle="modal">Añadir miembro</button>
        </div>
        <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!--Cabecera del modal-->
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formMiembro" >
                    <div class="modal-body">
                        <!-- Cuerpo del Modal-->
                        <div class="row justify-content-center align-items-center minh-100">
                            <!-- Inputs-->
                            <div class="col-sm-12 row justify-content-center align-items-center minh-100">
                                <div class="col-sm-12">
                                    
                                    <div class="form-group" method="post" action="#">
                                        <label for="miembro" class="col-form-label">Miembro:</label>
                                        <input class="form-control" type="text" name="miembro" id="miembro" placeholder="Buscar...">
                                    </div>
                                    <div class="form-group" id="suggestions"></div>
                                    <div class="form-group" id="tipos">
                                        <label for="cargo" class="col-form-label">Tipo de Empleado:</label><br>

                                            <input type="radio" name="tipo" id="analista" value="Analista">
                                            <label for="Analista">Analista </label><br>

                                            <input type="radio" name="tipo" id="diseniador" value="Diseniador">
                                            <label for="Diseniador">Diseñador </label><br>

                                            <input type="radio" name="tipo" id="programador" value="Programador">
                                            <label for="Programador">Programador </label><br>

                                            <input type="radio" name="tipo" id="tester" value="Tester">
                                            <label for="Tester">Tester </label><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                    </div>

                    <div class="modal-footer">
                        <!--Guardar y cancelar-->
                        <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnGuardar" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
      </hr>

<<<<<<< Updated upstream
       <!-- Nav Item - Plantas Collapse Menu -->
       <li class="nav-item">
        <a class="nav-link collapsed" href="../vistaJefe/informes.php" >
        <i class="fas fa-chart-bar"></i>
          <span style="font-size: 1.1em";>Informes</span>
        </a>
      </li>
=======


      <?php
          $arregloUsuarios = array();
          foreach($obtenerConexion->query("SELECT DISTINCT refUsuario FROM RelacionProyectoMiembro WHERE refProyecto='$id'") as $columna) {
            $refUsuario = $columna['refUsuario'];
              
            array_push($arregloUsuarios, $refUsuario);
          }


          for ($i = 0; $i < count($arregloUsuarios); $i++){
            foreach($obtenerConexion->query("SELECT * FROM Empleado WHERE usuario='$arregloUsuarios[$i]'") as $columna) {
              $datos = $id.'||'.$arregloUsuarios[$i];

              foreach($obtenerConexion->query("SELECT * FROM RelacionProyectoMiembro WHERE refProyecto='$id' AND refUsuario='$arregloUsuarios[$i]'") as $columna2) {
                if($columna2['rol']==" " || $columna2['rol']=="" || $columna2['rol']==null){

                }
                else{
                  $nuevo = '||'.$columna2['rol'];
                  $datos.=$nuevo;
                }
              }?>
              <li class="nav-item"><button class="btn btn-primary" data-toggle="modal" data-target="#modalVer" onclick="actualizaDatos('<?php echo $datos ?>')"><?php echo $columna['nombre'] ?></button></li>

              <?php }}?>
       
>>>>>>> Stashed changes

      
     

       

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">

     <!-- Topbar -->
     <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
  <div class="input-group">
    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button class="btn btn-primary" type="button">
        <i class="fas fa-search fa-sm"></i>
      </button>
    </div>
  </div>
</form>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
  <li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
      <form class="form-inline mr-auto w-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>

  <div class="topbar-divider d-none d-sm-block"></div>

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small">Jefe Proyecto</span>
      <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Perfil
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Salir
      </a>
    </div>
  </li>

</ul>

</nav>

<!-- Main Content -->
<div id="content">
  <!-- Topbar -->
  
  <!-- End of Topbar -->
  