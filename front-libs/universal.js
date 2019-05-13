function closeSession(id) {
    $.ajax({
        url: `http://${location.hostname}/tutorias/requests/unLogin.php`,
        method: 'POST',
        data: id,
        success(data){
            console.log(data);
            if (data == '') {
                location.href = '../'
            }
        }
    })
}