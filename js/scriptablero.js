//variables
let tareaArrastrable;
let dropzones = document.querySelectorAll('.dropzone');

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
    $('#add').click(()=>{
        const nombre = $('#nombreInput').val()!==''?$('#nombreInput').val():null;
        const descripcion = $('#descripcionInput').val()!==''?$('#descripcionInput').val():null;
        const prioridad = $('#prioridadInput').val()!==''?$('#prioridadInput').val():null;
        const fecha = $('#fechaInput').val()!==''?$('#fechaInput').val():null;
        $('#nombreInput').val('');
        $('#descripcionInput').val('');
        $('#fechaInput').val('');
        $('#prioridadInput').val('');
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
    
    
});


$('#add').click(()=>{
    idref = window.idref;
    nombre = $('#nombre').val()!==''?$('#nombre').val():null;
    descripcion = $('#descripcion').val()!==''?$('#descripcion').val():null;
    prioridad = $('#prioridad').val()!==''?$('#prioridad').val():null;
    fecha = $('#fecha').val()!==''?$('#fecha').val():null;
    
    let datos= "Nom="+nombre+"&Desc="+descripcion+"&Prio="+prioridad+"&Fech="+fecha+"&id="+idref;
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
                <p class="descripcion">${card.prioridad}</p>
                <p class="fecha">${card.fecha}</p>
            </div>
            <form class="row mx-auto justify-content-between">                
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

 

$(function () {
    $('.list-group.checked-list-box .list-group-item').each(function () {
        
        // Settings
        var $widget = $(this),
            $checkbox = $('<input type="checkbox" class="hidden" />'),
            color = ($widget.data('color') ? $widget.data('color') : "primary"),
            style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };
            
        $widget.css('cursor', 'pointer')
        $widget.append($checkbox);

        // Event Handlers
        $widget.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });
          

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $widget.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $widget.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$widget.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $widget.addClass(style + color + ' active');
            } else {
                $widget.removeClass(style + color + ' active');
            }
        }

        // Initialization
        function init() {
            
            if ($widget.data('checked') == true) {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
            }
            
            updateDisplay();

            // Inject the icon if applicable
            if ($widget.find('.state-icon').length == 0) {
                $widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon + '"></span>');
            }
        }
        init();
    });
    
    $('#get-checked-data').on('click', function(event) {
        event.preventDefault(); 
        var checkedItems = {}, counter = 0;
        $("#check-list-box li.active").each(function(idx, li) {
            checkedItems[counter] = $(li).text();
            counter++;
        });
        $('#display-json').html(JSON.stringify(checkedItems, null, '\t'));
    });
});