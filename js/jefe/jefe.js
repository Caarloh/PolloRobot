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