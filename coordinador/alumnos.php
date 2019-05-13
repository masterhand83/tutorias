<?php
/*
session_start();
//unset($_SESSION['userID']);
if (isset($_SESSION['userID'])){
    if ($_SESSION['userType'] == 0){
        header("Location: alumno/dashboard.php");
    }else if ($_SESSION['userType'] == 1){
        header("Location: coordinador/dashboard.php");
    }
}
*/
$place = 'alumnos';
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
$db->connect();
$alumnos = $db->Query("SELECT * FROM Alumno;");
$db->close();

?>
<div class="container mt-3">
    <!--div class="row">
        <div class="col"></div>
        <div class="col-lg-9 col-md-11 col-sm-12">
            <button class="btn btn-success float-right btn-lg mb-3">+</button>
        </div>
        <div class="col"></div>
    </div-->
    <div class="row">
        <div class="col"></div>
        <div class="col-lg-9 col-md-11 col-sm-12">
            <ul class="list-group">
                <li class="list-group-item active">Alumnos</li>
                <? foreach ($alumnos as $alumno){?>
                    <li class="list-group-item">
                        <?=$alumno['Apel_pat']?> <?=$alumno['Apel_mat']?> <?=$alumno['Nombre']?>

                        <button class="btn btn-outline-danger float-md-right ml-2">Eliminar</button>
                        <button onclick="showInfo(<?=$alumno['AlumnoID']?>)" type="button" class="btn btn-outline-info float-md-right">
                            Informacion
                        </button>
                    </li>

                <?}?>
            </ul>
        </div>
        <div class="col"></div>
    </div>

</div>
<!--/Informacion General-->
<!--MODALES-->
<div class="modal fade" id="alumnoModal"
     tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="alumno-modal-body">

        </div>
    </div>
</div>
<?flush();?>
<script src="../front-libs/javascript/jquery.min.js"></script>
<script src="../front-libs/javascript/popper.min.js"></script>
<script src="../front-libs/javascript/bootstrap.min.js"></script>
<script src="../front-libs/javascript/toastr.min.js"></script>
<script src="../front-libs/javascript/sweetalert.min.js"></script>
<script src="../front-libs/javascript/coordinador/alumnos.js"></script>
<script src="../front-libs/universal.js"></script>
</body>
</html>