
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Pollo Robot 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seguro deseas salir de sesion?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Presiona "Salir" si estas listo para terminar la sesion.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../login.php">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Logout Modal-->
 <div class="modal fade" id="modalVer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input class="form-control" type="text" id="idProyecto" readonly>
          </div>
          <div class="form-group">
            <input class="form-control" type="text" id="usuarioModal" readonly>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Analista" id="analista">
            <label class="form-check-label" for="defaultCheck1">
              Analista
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Diseñador" id="disenador">
            <label class="form-check-label" for="defaultCheck1">
              Diseñador
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Implementador" id="implementador">
            <label class="form-check-label" for="defaultCheck1">
              Implementador
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Tester" id="tester">
            <label class="form-check-label" for="defaultCheck1">
              Tester
            </label>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" id="actualizaDatos" data-dismiss="modal" onclick="guardarDatos()">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>  

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

 

  
    <!-- datatables JS -->
    <script type="text/javascript" src="../vendor/datatables/datatables.min.js"></script>  
    <script type="text/javascript" src="../js/jefe/jefe.js"></script>

    <!-- código propio JS --> 

    

</body>

</html>

