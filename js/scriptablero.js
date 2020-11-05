//variables
let tareaArrastrable;
let numeroTarea = 1;
let dropzones = document.querySelectorAll('.dropzone');
let nombre;
let descripcion;
let prioridad;
let fecha;

// Tituos de las Tableros y colores
let dataColors = [
    {color:"gray", title:"Pendiente"},
    {color:"green", title:"En Proceso"},
    {color:"blue", title:"Probando"},
    {color:"purple", title:"Finalizado"}
];
let dataCards = {
    config:{
        maxid:0
    },
    cards:[]
};

//Inicio 

$(document).ready(()=>{
    $("#loadingScreen").addClass("d-none");
    //se crean los tableros
    initializeBoards();
    if(JSON.parse(localStorage.getItem('@kanban:data'))){
        dataCards = JSON.parse(localStorage.getItem('@kanban:data'));
        initializeComponents(dataCards);
    }
    //creacion de tareas en el tableros
    initializeCards();    
    
    
});


$('#add').click(()=>{
    nombre = $('#nombre').val()!==''?$('#nombre').val():null;
    descripcion = $('#descripcion').val()!==''?$('#descripcion').val():null;
    prioridad = $('#prioridad').val()!==''?$('#prioridad').val():null;
    fecha = $('#fecha').val()!==''?$('#fecha').val():null;
    let datos= "Nom="+nombre+"&Desc="+descripcion+"&Prio="+prioridad+"&Fech="+fecha
    $.ajax({
        url: "../dataBase/agregarTarea.php",        
        type: "POST",
        data: datos,
        success: function(data){             
            console.log(data);          
        }, error: function(data) {
        console.log("No se ha podido obtener la información");
        } 
    });

    $('#nombre').val('');
    $('#descripcion').val('');
    $('#fecha').val('');
    $('#prioridad').val('');
    if(nombre && descripcion && fecha && prioridad){
        let id = dataCards.config.maxid+1;           
        const newCard = {
            id,
            nombre,
            descripcion,
            prioridad,
            fecha,
            position:"gray"
        }
        dataCards.cards.push(newCard);
        dataCards.config.maxid = id;
        save();
        appendComponents(newCard);
        initializeCards();
    }
});

//funciones
function initializeBoards(){    
    dataColors.forEach(item=>{
        let htmlString = `
        <div class="board">
            <h3 class="text-center">${item.title.toUpperCase()}</h3>
            <div class="dropzone" id="${item.color}">
                
            </div>
        </div>
        `
        $("#boardsContainer").append(htmlString)
    });
    let dropzones = document.querySelectorAll('.dropzone');
    dropzones.forEach(dropzone=>{
        dropzone.addEventListener('dragenter', dragenter);
        dropzone.addEventListener('dragover', dragover);
        dropzone.addEventListener('dragleave', dragleave);
        dropzone.addEventListener('drop', drop);
    });
}

function initializeCards(){
    cards = document.querySelectorAll('.kanbanCard');
    
    cards.forEach(card=>{
        card.addEventListener('dragstart', dragstart);
        card.addEventListener('drag', drag);
        card.addEventListener('dragend', dragend);
    });
}

function initializeComponents(dataArray){
    dataArray.cards.forEach(card=>{
        appendComponents(card); 
    })
}

function appendComponents(card){
    //creacion en la pantalla de las tareas
    let htmlString = `
        <div id=${card.id.toString()} class="kanbanCard ${card.position}" draggable="true">
            <div class="content">               
                <h6 class="nombre" style="color:black" ;>${card.nombre}</h6>
                <p class="descripcion">${card.descripcion}</p>
                <div class="row justify-content-start">
                    <div class="col-4">
                    <p class="descripcion">${card.prioridad}</p>
                    </div>
                    <div class="col">
                    <p class="fecha">${card.fecha}</p>
                    </div>                    
                </div>
                                
                
            </div>
            <form class="row mx-auto justify-content-between"> 
            <span>          </span>               
                <button class="invisibleBtn">
                    <i class="fas fa-trash-alt fa-4x" onclick="deleteCard(${card.id.toString()})" style="color:red" ;></i>
                </button>
            </form>
        </div>
    `
    $(`#${card.position}`).append(htmlString);
    
}


//eliminacion de las cartas
function deleteCard(id){
    dataCards.cards.forEach(card=>{
        if(card.id === id){
            console.log("aqui wn")
            console.log(card.nombre)
            let datos= "Nom="+card.nombre
            $.ajax({
                url: "../dataBase/quitarTarea.php",        
                type: "POST",
                data: datos,
                success: function(data){             
                    console.log(data);          
                }, error: function(data) {
                console.log("No se ha podido obtener la información");
                } 
            });
            let index = dataCards.cards.indexOf(card);
            console.log(index)
            dataCards.cards.splice(index, 1);
            console.log(dataCards.cards);
            save();
        }
    })
}

//cambio de columna
function cambiarEstado(tareaArrastrable, color){
    tareaArrastrable.classList.remove('blue');
    tareaArrastrable.classList.remove('purple');
    tareaArrastrable.classList.remove('green');
    tareaArrastrable.classList.remove('gray');
    tareaArrastrable.classList.add(color);
    position(tareaArrastrable, color);
}

function save(){
    localStorage.setItem('@kanban:data', JSON.stringify(dataCards));
}

function position(tareaArrastrable, color){
    const index = dataCards.cards.findIndex(card => card.id === parseInt(tareaArrastrable.id));
    dataCards.cards[index].position = color;
    save();
}

//Empieza a arrastrar
function dragstart(){
    dropzones.forEach( dropzone=>dropzone.classList.add('highlight'));
    this.classList.add('is-dragging');
}
//arrastrando
function drag(){
    
}
// termina de arrastrar
function dragend(){
    dropzones.forEach( dropzone=>dropzone.classList.remove('highlight'));
    this.classList.remove('is-dragging');
}

//suelta la tarea
function dragenter(){

}

function dragover({target}){
    this.classList.add('over');
    tareaArrastrable = document.querySelector('.is-dragging');
    if(this.id ==="gray"){
        cambiarEstado(tareaArrastrable, "gray");
        
    }
    else if(this.id ==="green"){
        cambiarEstado(tareaArrastrable, "green");
    }
    else if(this.id ==="blue"){
        cambiarEstado(tareaArrastrable, "blue");
    }
    else if(this.id ==="purple"){
        cambiarEstado(tareaArrastrable, "purple");
    }
    else if(this.id ==="red"){
        cambiarEstado(tareaArrastrable, "red");
    }
    
    this.appendChild(tareaArrastrable);
}

function dragleave(){
  
    this.classList.remove('over');
}

function drop(){
    this.classList.remove('over');
}

$("#btnTarea").click(function(){
    $("#formPlantas").trigger("reset");
    $(".modal-header").css("background-color", "#4515CF");
    $(".modal-header").css("color", "white");
    $(".modal-title").text('Nueva Tarea');           
    $("#modalTarea").modal("show");        
    id=null;
    opcion = 1; //alta
});

$("#btnRepo").click(function(){
    $(".modal-header").css("background-color", "#4515CF");
    $(".modal-header").css("color", "white");
    $(".modal-title").text('Repositorio Git');           
    $("#modalRepo").modal("show");        
    id=null;
    opcion = 1; //alta
});

(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

