function actualizaDatos(datos){
    d=datos.split('||');
    if (d == null){

    }
    else{
        for (var i = 2; i < d.length; i++) {
            if(d[i] == "Analista"){
              $("#analista").prop("checked", true); 
      
            }
            if(d[i] == "Diseñador"){
              $("#disenador").prop("checked", true); 
      
            }
            if(d[i] == "Implementador"){
              $("#implementador").prop("checked", true); 
            }
            if(d[i] == "Tester"){
              $("#tester").prop("checked", true); 
            }
          }

    }
    $('#idProyecto').val(d[0]);
    $('#usuarioModal').val(d[1]);
}

function guardarDatos(){
    id = $('#idProyecto').val();
    usuario = $('#usuarioModal').val();
    analista = "";
    disenador = "";
    implementador = "";
    tester = "";
    var checkAnalista = document.getElementById("analista").checked;
    var checkDisenador = document.getElementById("disenador").checked;
    var checkImplementador = document.getElementById("implementador").checked;
    var checkTester = document.getElementById("tester").checked;
    if(checkAnalista){
        analista = "Analista";
    }
    if(checkDisenador){
        disenador = "Diseñador";
    }
    if(checkImplementador){
        implementador = "Implementador";
    }
    if(checkTester){
        tester = "Tester";
    }
    cadena = "id="+id+"&usuario="+usuario+"&analista="+analista+"&disenador="+disenador+"&implementador="+implementador+"&tester="+tester;
    $.ajax({
        type:"POST",
        url:"../dataBase/obtenerDatos.php",
        data:cadena,
        success:function(r){
          if(r==1){
            
          }else{
            alert("FALLO EN EL SERVIDOR");
          }
        }
      });
}

$("#btnAddMiembro").click(function () {
    $("#formPlantas").trigger("reset");
    $(".modal-header").css("background-color", "#1d3557");
    $(".modal-header").css("color", "white");
    $(".modal-title").text('Crear nuevo proyecto');
    $("#modalCRUD").modal("show");
    id = null;
    opcion = 1; //alta
});

$("#formMiembro").submit(function (e) {
    e.preventDefault();
    miembro = $.trim($("#miembro").val());
    idref = window.idref;

    var showModal = true;
    if (miembro == "") {
        $("#miembro").addClass("border-danger");
        showModal = false;
    }

    if (showModal) {
        $("#miembro").removeClass("border-danger");
    }

    rol = $('input[name=tipo]:checked', '#formMiembro').val();


    if (showModal) {
        $.ajax({
            url: "../dataBase/insertarM.php",
            type: "POST",
            data: {miembro: miembro, idref:idref, rol:rol},
            success: function (data) {
                console.log(data);
                

            }, error: function (data) {
                console.log("No se ha podido obtener la información");
            }
        });
        $("#modalCRUD").modal("hide");
    }
});

$(document).ready(function() {
    $('#miembro').on('keyup', function() {
        var miembro = $(this).val();        
        var dataString = 'miembro='+miembro;
    $.ajax({
            type: "POST",
            url: "../dataBase/buscarM.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada
                        $('#miembro').val($('#'+id).attr('data'));
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(1000);
                        alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
                        return false;
                });
            }
        });
    });
}); 
