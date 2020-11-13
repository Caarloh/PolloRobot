$(document).ready(function(){
    tablaTrabajadores = $("#tablaTrabajadores").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditarPlanta'>Editar</button><button class='btn btn-danger btnBorrarPlanta'>Borrar</button></div></div>"  
       }],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevoTrabajador").click(function(){
    $("#formPlantas").trigger("reset");
    $(".modal-header").css("background-color", "#1d3557");
    $(".modal-header").css("color", "white");
    $(".modal-title").text('Registrar Nuevo Trabajador');           
    $("#modal1").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditarTrabajador", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    id_proveedor = parseInt(fila.find('td:eq(1)').text());
    nombre = fila.find('td:eq(2)').text();
    forma = fila.find('td:eq(3)').text();
    precio = parseInt(fila.find('td:eq(4)').text());
    stock = parseInt(fila.find('td:eq(5)').text());
    $("#id_proveedor").val(id_proveedor);
    $("#nombre").val(nombre);    
    $("#forma").val(forma);
    $("#precio").val(precio);
    $("#stock").val(stock);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#3498DB");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Trabajador");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrarTrabajador", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "dataBase/crudtrabajador.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaPlantas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});
    
$("#formTrabajador").submit(function(e){   
    e.preventDefault();
    nombre = $.trim($("#nombre").val());
    apellidos = $.trim($("#apellidos").val());
    correo = $.trim($("#correo").val());    
    perfilGit = $.trim($("#paginagit").val());   
    cargo = $('input[name=cargo]:checked', '#formTrabajador').val();
    
    var showModal = true;
    if(nombre == ""){
        $("#nombre").addClass("border-danger");
        showModal =false;
    }
    if(apellidos == ""){
        $("#apellidos").addClass("border-danger");
        showModal =false;
    }
    if(correo == ""){
        $("#correo").addClass("border-danger");
        showModal =false;
    }
    if(perfilGit == ""){
        $("#paginagit").addClass("border-danger");
        showModal =false;
    }
    if(cargo == ""){
        showModal =false;
    }
    if(showModal){
        $("#nombre").removeClass("border-danger");
        $("#apellidos").removeClass("border-danger");
        $("#correo").removeClass("border-danger");
        $("#paginagit").removeClass("border-danger");
    }    
    if(cargo == "Empleado"){
        tipoEmpleado = $('input[name=tipo]:checked', '#formTrabajador').val();
    }else{
        tipoEmpleado = cargo;
    }
    
    usuario = nombre+"_"+apellidos;
    contrasena = nombre.charAt(0)+nombre.charAt(1)+apellidos.charAt(0)+apellidos.charAt(1);
    console.log(usuario);
    console.log(contrasena);
    
    if(showModal){
        $.ajax({
            url: "../dataBase/insertar.php",        
            type: "POST",
            data: {usuario:usuario, nombre:nombre, apellidos:apellidos, correo:correo, cargo:cargo, contrasena:contrasena, perfilGit:perfilGit, tipoEmpleado:tipoEmpleado},
            success: function(data){             
                console.log(data);
                
                
                usuario = data[0].usuario;
                nombre = data[0].nombre;            
                apellidos = data[0].apellidos;
                correo = data[0].correo;
                cargo = data[0].cargo;            
                contrasena = data[0].contrasena;
                paginagit = data[0].perfilGit;
                tipoEmpleado = data[0].tipoEmpleado; 
                        
            }, error: function(data) {
            console.log("No se ha podido obtener la información");
            }     
        });
        $("#modal1").modal("hide");   
    }
     
    
    
});    
    
});