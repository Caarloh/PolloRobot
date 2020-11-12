$(document).ready(function () {
tablaProyecto = $("#tablaProyecto").DataTable({
    "columnDefs": [{
        "targets": -1,
        "data": null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditarPlanta'>Editar</button><button class='btn btn-danger btnBorrarPlanta'>Borrar</button></div></div>"
    }],

    //Para cambiar el lenguaje a espa�ol
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros",
        "zeroRecords": "No se encontraron resultados",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sSearch": "Buscar:",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "�ltimo",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "sProcessing": "Procesando...",
    }
});

$("#btnNuevoProyecto").click(function () {
    $("#formPlantas").trigger("reset");
    $(".modal-header").css("background-color", "#1d3557");
    $(".modal-header").css("color", "white");
    $(".modal-title").text('Crear nuevo proyecto');
    $("#modal2").modal("show");
    id = null;
    opcion = 1; //alta
});

var fila; //capturar la fila para editar o borrar el registro

//bot�n EDITAR    
$(document).on("click", ".btnEditarProyecto", function () {
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    id_proveedor = parseInt(fila.find('td:eq(1)').text());
    nombre = fila.find('td:eq(2)').text();
    forma = fila.find('td:eq(3)').text();
    precio = parseInt(fila.find('td:eq(4)').text());
    stock = parseInt(fila.find('td:eq(5)').text());
    $("#id_proveedor").val(id_proveedor);
    $("#nombreP").val(nombre);
    $("#forma").val(forma);
    $("#precio").val(precio);
    $("#stock").val(stock);
    opcion = 2; //editar

    $(".modal-header").css("background-color", "#3498DB");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Trabajador");
    $("#modalCRUD").modal("show");

});

//bot�n BORRAR
$(document).on("click", ".btnBorrarProyecto", function () {
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("�Est� seguro de eliminar el registro: " + id + "?");
    if (respuesta) {
        $.ajax({
            url: "dataBase/crudproyecto.php",
            type: "POST",
            dataType: "json",
            data: { opcion: opcion, id: id },
            success: function () {
                tablaPlantas.row(fila.parents('tr')).remove().draw();
            }
        });
    }
});

$("#formProyectoP").submit(function (e) {
    e.preventDefault();
    nombre = $.trim($("#nombreP").val());
    descripcion = $.trim($("#descripcion").val());
    jefe = $.trim($("#jefe").val());
    repGit = $.trim($("#repGit").val());


    var showModal = true;
    if (nombre == "") {
        $("#nombreP").addClass("border-danger");
        showModal = false;
    }
    if (descripcion == "") {
        $("#descripcion").addClass("border-danger");
        showModal = false;
    }
    if (jefe == "") {
        $("#jefe").addClass("border-danger");
        showModal = false;
    }
    if (repGit == "") {
        $("#repGit").addClass("border-danger");
        showModal = false;
    }

    if (showModal) {
        $("#nombreP").removeClass("border-danger");
        $("#descripcion").removeClass("border-danger");
        $("#jefe").removeClass("border-danger");
        $("#repGit").removeClass("border-danger");
    }

    nombre = nombre;
    console.log(nombre);


    if (showModal) {
        $.ajax({
            url: "../dataBase/insertarP.php",
            type: "POST",
            data: { nombre: nombre, descripcion:descripcion, jefe:jefe, repGit:repGit},
            success: function (data) {
                console.log(data);

                nombre = data[0].nombre;            
                descripcion = data[0].descripcion;
                repGit = data[0].repositorioGit;
                jefe = data[0].jefeProyecto;
                

            }, error: function (data) {
                console.log("No se ha podido obtener la informaci�n");
            }
        });
        $("#modalCRUD").modal("hide");
    }
});

});

$(document).ready(function() {
    $('#jefe').on('keyup', function() {
        var jefe = $(this).val();        
        var dataString = 'jefe='+jefe;
    $.ajax({
            type: "POST",
            url: "../dataBase/buscar.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#jefe').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(1000);
                        alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                        return false;
                });
            }
        });
    });
}); 