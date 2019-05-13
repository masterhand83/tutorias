$(()=>{
    console.log("documento listo")
})

function applyTutoria(tutoriaID, userID){
    $.ajax({
        method: 'POST',
        url: `http://${location.hostname}/tutorias/requests/tutoriaApply.php`,
        data: {
            tutoriaID,
            userID
        },
        beforeSend: function(){
            $(`#button_${tutoriaID}`).hide();
        },
        complete: function () {
            //$(`#button_${tutoriaID}`).show();
        }
    }).done(data =>{
        //console.log(data);
        if (data == "R:1"){
            console.log("suscrito");
            $(`#container_${tutoriaID}`).remove();
        }else if(data == "R:00"){
            console.log("Existe un translape");
            $(`#button_${tutoriaID}`).show();
        }else{
            console.log(data);
        }
    })
}
function closeSession() {
    $.ajax({
        url: `http://${location.hostname}/tutorias/session/session_handler.php`
    }).done(data =>{
        //console.log(data);
        location.href = "/tutorias"
    }).fail()
}