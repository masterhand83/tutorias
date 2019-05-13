let tipo = $("#tipo");
let entrada = $('#edit-input');
let modal = $("#edit-element");
let boton = document.querySelector('#edit-form-button');

let centrada = $('#create-input');
let cmodal = $("#create-element");
let cboton = document.querySelector('#create-button');

let deleteOptions = {
    type: 'question',
    title: '¡Espera!',
    text: '¿Esta seguro de hacerlo?',
    footer: 'Esta accion no se puede deshacer',
    showCloseButton: true,
    showCancelButton: true,
    focusConfirm: false,
    confirmButtonText: 'Seguro',
    cancelButtonText: 'Cancelar'
}
function editUnidad(id,unidad) {
    tipo.text("Unidad");
    entrada.val(unidad);
    modal.modal();

    boton.onclick = function (event) {
        $.ajax({
            url: `http://${location.hostname}/tutorias/requests/put/UnidadProfesor.php`,
            type: 'POST',
            data: {
                idunidad: id,
                unidad: entrada.val(),
                type: 'unidad'
            },
            success (data){

                $(`#unidad${id}`).replaceWith(data);
            }
        });
    }
}
function editProfesor(id,profesor) {
    tipo.text("profesor");
    entrada.val(profesor);
    modal.modal();

    boton.onclick = function (event) {
        $.ajax({
            url: `http://${location.hostname}/tutorias/requests/put/UnidadProfesor.php`,
            type: 'POST',
            data: {
                idprofesor: id,
                profesor: entrada.val(),
                type: 'profesor'
            },
            success (data){

                $(`#profesor${id}`).replaceWith(data);
            }
        });
    }
}

function deleteUnidad(id) {
    Swal.fire(deleteOptions).then( res =>{
        if (res.value){
            deleteElement('unidad',id);
        }
    })
}
function deleteProfesor(id) {
    Swal.fire(deleteOptions).then( res =>{
        if (res.value){
            deleteElement('profesor',id);
        }
    })
}

function createUnidad() {
    $('#create-label').text("Nueva Unidad");
    cboton.onclick = function (event){
        $.ajax({
            url: `http://${location.hostname}/tutorias/requests/createUnidadProfesor.php`,
            type: 'POST',
            data: {
                unidad: centrada.val(),
                type: 'unidad'
            },
            success (data){

                console.log(data);
                location.reload();
            }
        });
    }

    $('#create-element').modal();
}
function createProfesor() {
    $('#create-label').text("Nuevo profesor");
    cboton.onclick = function (event){
        $.ajax({
            url: `http://${location.hostname}/tutorias/requests/createUnidadProfesor.php`,
            type: 'POST',
            data: {
                profesor: centrada.val(),
                type: 'profesor'
            },
            success (data){
              console.log(data);
              location.reload();
            }
        });
    }
    $('#create-element').modal();
}

function deleteElement(type, id) {
    $.ajax({
        url: `http://${location.hostname}/tutorias/requests/deleteUnidadProfesor.php`,
        type: 'POST',
        data: {
            id,
            type
        },
        success (data){
            console.log(data);
            $(`#${type}${id}`).remove();
        }
    });
}