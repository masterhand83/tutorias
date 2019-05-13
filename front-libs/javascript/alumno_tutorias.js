$(function () {
    console.log('documento listo')
})
function askTutoria(tutoriaID, userID) {
    Swal.fire({
        title: 'Confirmar',
        text: '¿Seguro que quieres aplicar para esta tutoria?',
        type: 'question',
        confirmButtonText: 'Seguro',

    }).then(result =>{
        console.log(result)
        if (result.value == true){
            applyTutoria(tutoriaID,userID)
        }
    })
}
function applyTutoria(tutoriaID, userID) {
    toastr.options.closeButton = true;
    toastr.options.preventDuplicates = true;
    let button = document.getElementById(`tutoria-button${tutoriaID}`);
    let tutoria = document.getElementById(`tutoria${tutoriaID}`);
    $.ajax({
        url: `http://${location.hostname}/tutorias/requests/tutoriaApply.php`,
        method: 'POST',
        data: {
            tutoriaID,
            userID
        },
        beforeSend () {
            button.disabled = true;
            button.innerText = 'Cargando...';
        },
        success (data) {
            if (data == 'R:1') {
                tutoria.remove();
            }
            if (data == 'R:00'){
                toastr.warning('revisa tus tutorias, una de ellas translapa')
                button.disabled = false;
                button.innerText = 'Aplicar para tutoria'
            }
        },
        complete (){
            button.disabled = false;
            button.innerText = 'Aplicar para tutoria'
        }
    })
}