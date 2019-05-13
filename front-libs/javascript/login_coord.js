var usuarioInput = document.querySelector('#usuario');
var contraInput = document.querySelector('#contra');
var loginButton = document.querySelector('#loginBtn');
$(()=>{
    toastr.options.closeButton = true;
    toastr.options.preventDuplicates = true;
    usuarioInput.addEventListener('keyup',valid);
    contraInput.addEventListener('keyup',valid);
    valid();
    loginButton.addEventListener('click',function () {
        $.ajax({
            url: `http://${location.hostname}/tutorias/requests/login.php`,
            method: 'POST',
            data: {
                type: 1,
                password: contraInput.value,
                user: usuarioInput.value
            }
        }).done(function (data) {
            console.log(data);
            if (data == 1) {
                location.href = `http://${location.hostname}/tutorias/coordinador/dashboard.php`
            }else if (data == 0){
                toastr.error('Su usuario o contraseña son incorrectos');
            }
        })
    })


})
function valid() {
    if (
        new RegExp('[a-zA-z]+').test(usuarioInput.value) &&
        new RegExp('.+').test(contraInput.value)
    ){
        loginButton.disabled = false;

    }else{
        loginButton.disabled = true;
    }
}