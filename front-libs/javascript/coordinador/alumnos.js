function showInfo(idalumno){
    $.ajax({
        url: `http://${location.hostname}/tutorias/requests/get/Alumno.php`,
        method: 'GET',
        data: {
            id: idalumno
        },
        success(data){
            console.log(data);
            $('#alumno-modal-body').html(data);
            $('#alumnoModal').modal();

        }
    })
}