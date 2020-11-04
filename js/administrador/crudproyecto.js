$(document).ready(function () {
    tablaProyecto = $("#tablaProyecto").DataTable({
        "columnDefs": [{
            "targets": -1,
            "data": null,
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
                "sLast": "Último",
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
        $("#modalCRUD").modal("show");
        id = null;
        opcion = 1; //alta
    });

    var fila; //capturar la fila para editar o borrar el registro

    //botón EDITAR    
    $(document).on("click", ".btnEditarProyecto", function () {
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
    $(document).on("click", ".btnBorrarProyecto", function () {
        fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3 //borrar
        var respuesta = confirm("¿Está seguro de eliminar el registro: " + id + "?");
        if (respuesta) {
            $.ajax({
                url: "dataBase/crudtrabajador.php",
                type: "POST",
                dataType: "json",
                data: { opcion: opcion, id: id },
                success: function () {
                    tablaPlantas.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });

    $("#formProyecto").submit(function (e) {
        e.preventDefault();
        nombre = $.trim($("#nombre").val());

        var showModal = true;
        if (nombre == "") {
            $("#nombre").addClass("border-danger");
            showModal = false;
        }

        if (showModal) {
            $("#nombre").removeClass("border-danger");
        }

        usuario = nombre;

        console.log(usuario);


        if (showModal) {
            $.ajax({
                url: "../dataBase/insertar.php",
                type: "POST",
                data: { nombre: nombre},
                success: function (data) {
                    console.log(data);


                    nombre = data[0].nombre;

                }, error: function (data) {
                    console.log("No se ha podido obtener la información");
                }
            });
            $("#modalCRUD").modal("hide");
        }



    });

});