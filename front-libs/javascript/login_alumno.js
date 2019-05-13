var correoInput = document.querySelector('#correo');
var boletaInput = document.querySelector('#boleta');
var loginAlumnoButton = document.querySelector('#loginBtn');
$(()=>{

    toastr.options.closeButton = true;
    toastr.options.preventDuplicates = true;
    valid();

    correoInput.addEventListener('keyup',valid);
    boletaInput.addEventListener('keyup',valid);

    loginAlumnoButton.addEventListener('click',function () {
        $.ajax({
            url: `http://${location.hostname}/tutorias/requests/login.php`,
            method: 'POST',
            data: {
                type: 0,
                boleta: boletaInput.value,
                correo: correoInput.value
            }
        }).done(function (data) {
            console.log(data);
            if (data == 1) {
                location.href = `http://${location.hostname}/tutorias/alumno/dashboard.php`
            }else if (data == 0){
                toastr.error('Su usuario o contraseña son incorrectos');
                $('#loginForm').trigger('reset');
            }
        })
    })


})

function valid() {
    if (
        new RegExp('[a-zA-z]+').test(correoInput.value) &&
        new RegExp('[0-9]+').test(boletaInput.value)
    ){
        loginAlumnoButton.disabled = false;

    }else{
        loginAlumnoButton.disabled = true;
    }
}