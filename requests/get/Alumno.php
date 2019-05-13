<?php
require_once "../../src/Database.php";
$db = new MySQLDB();
$alumno = $db->Query("SELECT * FROM Alumno WHERE AlumnoID = {$_REQUEST['id']}")[0];
$foto = $alumno['fotoURL'] != ""? $alumno['fotoURL']: "../front-libs/img/lost_profile.png";
echo "
<div class='modal-header bg-info text-light'>
    <h5 class='modal-title' id='alumno-titulo'>
    Informacion del Alumno: <span class='font-weight-bold'>{$alumno['Apel_pat']} {$alumno['Apel_mat']} {$alumno['Nombre']}</span>
    </h5>
    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
    </button>
</div>
<div class='modal-body' >
    <div class='container-fluid'>
        <div class='row my-5'>
            <div class='col-sm-2'></div>
            <div class='col'>
             <img src='$foto' alt='' class='img-fluid img-thumbnail'>
        
            </div>
            <div class='col-sm-2'></div>
        </div>
        <div class='row'>
            <div class='col'>
                <p>Boleta: {$alumno['Boleta']}</p>
                <p>Carrera:{$alumno['Carrera']} </p>
                <p>Turno: {$alumno['Turno']}</p>
                <p>grupo: {$alumno['Grupo']}</p>
            </div>
        </div>
    </div>
</div>
<div class='modal-footer'>
    <button type='button' class='btn btn-info' data-dismiss='modal'>Cerrar Informacion</button>
</div> 
";