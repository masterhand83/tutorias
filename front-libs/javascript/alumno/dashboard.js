$(function () {
    toastr.options.preventDuplicates = true;
    toastr.options.closeButton = true;
    let submitButton = document.getElementById('complete-info-btn');
    let submitImageButton = document.getElementById('upload-image');
    if (submitButton){
        updateInformation(submitButton);
    }
    uploadImage(submitImageButton)



})

function updateInformation(button) {
    button.addEventListener('click', function () {

        let telefono = document.getElementById('telefono').value;
        let celular = document.getElementById('celular').value;
        let email = document.getElementById('email').value;
        let calle = document.getElementById('calle').value;
        let num_ext = document.getElementById('num-ext').value;
        let num_int = document.getElementById('num-int').value;
        let colonia = document.getElementById('colonia').value;
        let cp = document.getElementById('cp').value;
        let estado = document.getElementById('estado').value;
        let delegacion = document.getElementById('delegacion').value;

        let datos = {
            telefono, celular, email, calle, num_ext, num_int, colonia, cp, estado, delegacion
        }

        $.ajax ({
            url: `http://${location.hostname}/tutorias/requests/fillAlumnoData.php`,
            type: 'POST',
            data: datos,
            beforeSend: function () {
                button.disabled = true;
                button.textContent = 'Enviando...'
            },
            success: function (data) {
                button.hidden = true;
                console.log(data);
                //reloadPage(`http://${location.hostname}/tutorias/alumno/dashboard.php`)
                toastr.success(data);
                setInterval(function () {
                    location.reload();
                }, 750)
            },
            error: function (err) {
                console.log(err);
                button.hidden = false;
                button.disabled = false;
                toastr.error('succedio un error');
            },
            complete: function (data, status) {
                button.textContent = 'Completar informacion'
            }
        })
    })
}

function uploadImage(button) {
    let fd = new FormData();
    let inputImage = document.getElementById('imagen-perfil');
    button.addEventListener('click', function () {
        let file = inputImage.files[0];
        console.log(file);
        fd.append('imagen', file);

        $.ajax({
            url: `http://${location.hostname}/tutorias/requests/uploadProfileImage.php`,
            type: 'POST',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                setTimeout(function () {
                    location.reload();
                },750);
            }
        })
    })
}