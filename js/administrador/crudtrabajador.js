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
    $("#modalCRUD").modal("show");        
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
    paginagit = $.trim($("#paginagit").val());    
    console.log("wena1");
    $.ajax({
        url: "../dataBase/crudtrabajador.php",        
        type: "POST",
        dataType: "json",
        data: {id_proveedor:id_proveedor, nombre:nombre, forma:forma, precio:precio, stock:stock, id:id, opcion:opcion},
        success: function(data){             
            console.log(data);
            id = data[0].id;
            id_proveedor = data[0].id_proveedor;            
            nombre = data[0].nombre;
            forma = data[0].forma;
            precio = data[0].precio;            
            stock = data[0].stock;
            if(opcion == 1){tablaPlantas.row.add([id,id_proveedor,nombre,forma, precio, stock]).draw();}
            else{tablaPlantas.row(fila).data([id,id_proveedor,nombre,forma, precio, stock]).draw();}            
        }, error: function(data) {
        console.log("No se ha podido obtener la información");
        }     
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});