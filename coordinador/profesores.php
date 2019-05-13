<?php

session_start();
if (isset($_SESSION['userID'])){
    if ($_SESSION['userType'] == 0){
        header("Location: /tutorias/alumno/dashboard.php");
    }
}else{
    header("Location: /tutorias/coordinador/login.php");
}
$place = 'profesores';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--FAVICONS-->
    <link rel="apple-touch-icon" sizes="180x180" href="../browserIcons/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/png" sizes="32x32" href="../browserIcons/favicon-32x32.png">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="../browserIcons/favicon-16x16.png">
    <link rel="manifest" href="../browserIcons/site.webmanifest">
    <link rel="mask-icon" href="../browserIcons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!--CSS-->
    <title>Coordinador - tutorias</title>
    <link rel="stylesheet" href="../front-libs/css/bootstrap2.min.css">
    <link rel="stylesheet" href="../front-libs/css/toastr.min.css">
    <link rel="stylesheet" href="../front-libs/fontawesome/css/all.css">
    <link rel="stylesheet" href="../front-libs/css/ipn.theme.css">
    <!--link rel="stylesheet" href="../vendor/css/toastify.css"-->
</head>
<?flush()?>
<body  class="">

<!--BARRA DE NAVEGACION-->
<?include_once 'Navbar.php'?>
<!--/BARRA DE NAVEGACION-->
<!--Informacion General-->
<?php
require '../src/Database.php';
$db = new MySQLDB();

$unidades = $db->Query("SELECT * FROM unidad;");
$profesores = $db->Query("SELECT * FROM profesor;")

?>
<div class="container mt-3">

    <div class="row">

        <div class="col-lg-6 col-md-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-light">
                    Profesores
                    <button class="btn btn-success float-right" onclick="createProfesor()">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <ul class="list-group overflow-auto" style="max-height: 75vh" >
                    <?
                    foreach ($profesores as $profesor){
                        ?>
                        <li class="list-group-item" id="profesor<?=$profesor['idprofesor']?>">
                            <?=$profesor['profesor']?>
                            <button class="btn btn-outline-danger float-right"
                                    onclick="deleteProfesor(<?=$profesor['idprofesor']?>)">
                                <i class="fa fa-trash"></i>
                            </button>
                            <button class="btn btn-outline-warning float-right mr-3"
                                    onclick="editProfesor(<?=$profesor['idprofesor']?>,'<?=$profesor['profesor']?>')">
                                <i class="fa fa-edit"></i>
                            </button>
                        </li>
                    <?}?>
                </ul>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-light">
                    Unidades
                    <button class="btn btn-success float-right" onclick="createUnidad()" >
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <ul class="list-group overflow-auto" style="max-height: 75vh;" >
                    <?
                    foreach ($unidades as $unidad){
                        ?>
                        <li class="list-group-item" id="unidad<?=$unidad['idunidad']?>">
                            <?=$unidad['unidad']?>
                            <button class="btn btn-outline-danger float-right"
                            onclick="deleteUnidad(<?=$unidad['idunidad']?>)">
                                <i class="fa fa-trash"></i>
                            </button>
                            <button class="btn btn-outline-warning float-right mr-3"
                                    onclick="editUnidad(<?=$unidad['idunidad']?>,'<?=$unidad['unidad']?>')">
                                <i class="fa fa-edit"></i>
                            </button>
                        </li>
                    <?}?>
                </ul>
            </div>
        </div>

    </div>

</div>
<!--/Informacion General-->
<!--MODALES-->
<div class="modal fade " id="edit-element">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header bg-warning text-light">
                <h5 class="modal-title" id="exampleModalLongTitle">Editar <span id="tipo"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <label for="edit-input" class="">Nuevo valor:</label>
                <input id="edit-input" type="text" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-warning" id="edit-form-button">Editar</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade " id="create-element">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="exampleModalLongTitle">Crear <span id="tipo"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <label for="create-input" class="" id="create-label"></label>
                <input id="create-input" type="text" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success" id="create-button">Crear</button>
            </div>

        </div>
    </div>
</div>

<?flush();?>
<script src="../front-libs/javascript/jquery.min.js"></script>
<script src="../front-libs/javascript/popper.min.js"></script>
<script src="../front-libs/javascript/bootstrap.min.js"></script>
<script src="../front-libs/javascript/toastr.min.js"></script>
<script src="../front-libs/javascript/sweetalert.min.js"></script>
<script src="../front-libs/javascript/coordinador/profesores.js"></script>
<script src="../front-libs/universal.js"></script>
</body>
</html>