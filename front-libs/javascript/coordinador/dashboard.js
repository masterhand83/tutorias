let form = document.getElementById('create-tutoria');
let editForm = document.getElementById('edit-tutoria')
let tutoriaFile = document.getElementById('tutoria-file');
let fileLabel = document.getElementById('fileName');
let fileButton = document.getElementById('upload-file');
/**
 * DATOS
 * unidad
 * profesor
 * type
 * disponibles
 * lun_inicio
 * lun_termino
 * mart_inicio
 * mart_termino
 * mi_inicio
 * mi_termino
 * ju_inicio
 * ju_termino
 * vi_inicio
 * vi_termino
 * sab_inicio
 * sab_termino
 * */
let url = window.location.pathname;
if (form){
    form.addEventListener('submit', function () {
        console.log(formatData(this))
        let data = formatData(this);
        if (data != false){
            $.ajax({
                method: 'POST',
                url: `http://${location.hostname}/tutorias/requests/createTutoria.php`,
                data: data,
                success (res) {
                    location.reload();
                }
            })
        }
    })
}
if (editForm){
    editForm.addEventListener('submit',function(){
        let data = formatData(this);
        if (data != false){
            $.ajax({
                method: 'POST',
                url: `http://${location.hostname}/tutorias/requests/editTutoria.php`,
                data: data,
                success (res) {
                    location.reload();
                }
            })
        }
    })
}
if (tutoriaFile && fileLabel){
    fileButton.addEventListener('click',function () {
        data = new FormData();
        data.set('file',$('#tutoria-file')[0].files[0], 'archivo');
        $.ajax({
            method: 'POST',
            url: `http://${location.hostname}/tutorias/requests/insertManyTutorias.php`,
            data: data,
            processData: false,
            contentType: false,
            success (res) {
                console.log(res);
            }
        })
    })
}

function leaveTutoria(idalumno, idtutoria) {
    $.ajax({
        method: 'POST',
        url: `http://${location.hostname}/tutorias/requests/leaveTutoria.php`,
        data: {
            idalumno,
            idtutoria
        },
        success (res) {
            location.reload();
        }
    })
}

function formatData(f) {
    if (f.disponibles.value){
        return {
            unidad: f.unidad.value,
            profesor: f.profesor.value,
            tipo_tutoria: f.type.value,
            disponibles: f.disponibles.value,
            lun_inicio: sanitizeHorario(f.lun_inicio.value),
            lun_termino: sanitizeHorario(f.lun_termino.value),
            mart_inicio: sanitizeHorario(f.mart_inicio.value),
            mart_termino: sanitizeHorario(f.mart_termino.value),
            mi_inicio: sanitizeHorario(f.mi_inicio.value),
            mi_termino: sanitizeHorario(f.mi_termino.value),
            ju_inicio: sanitizeHorario(f.ju_inicio.value),
            ju_termino: sanitizeHorario(f.ju_termino.value),
            vi_inicio: sanitizeHorario(f.vi_inicio.value),
            vi_termino: sanitizeHorario(f.vi_termino.value),
            sab_inicio: sanitizeHorario(f.sab_inicio.value),
            sab_termino: sanitizeHorario(f.sab_termino.value),
            idtutoria: f.idtutoria.value
        }
    } else{
        return false;
    }
}

function sanitizeHorario(value) {
    return value? value+':00': "---";
}

function generateAlumnoList(idtutoria) {
    location.href = `http://${location.hostname}/tutorias/requests/generateAlumnoList.php?idtutoria=${idtutoria}`
}
function goToEditTutoria(idtutoria) {
    location.href = `http://${location.hostname}/tutorias/coordinador/editTutoria.php?idtutoria=${idtutoria}`
}

function assignTutoria(idtutoria) {
    let alumno = document.getElementById('selected-alumno');
    $.ajax({
        method: 'POST',
        url: `http://${location.hostname}/tutorias/requests/tutoriaApply.php`,
        data: {
            userID: alumno.value,
            tutoriaID: idtutoria
        },
        success (res) {
            console.log(res);
            location.reload();
        }
    })
}

function deleteTutoria(idtutoria){
    $.ajax({
        method: 'POST',
        url: `http://${location.hostname}/tutorias/requests/deleteTutoria.php`,
        data: {
            idtutoria,
        },
        success (res) {
            document.getElementById(`tutoria${idtutoria}`).remove();
        }
    })
}