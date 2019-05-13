$(function () {
    console.log('Documento listo...')
})

function downloadTutoria(tutoriaID, userID) {
    location.href = `http://${location.host}/tutorias/requests/generateTutoriaPDF.php?idtutoria=${tutoriaID}`
}