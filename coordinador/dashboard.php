
<?php
session_start();
if (isset($_SESSION['userID'])){
    if ($_SESSION['userType'] == 0){
        header("Location: /tutorias/alumno/dashboard.php");
    }
}else{
    header("Location: /tutorias/coordinador/login.php");
}
$place = 'dashboard';
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

$result = $db->Query("SELECT * FROM tutorias;");
$db->close();

?>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col"></div>
        <div class="col-lg-12 col-sm-12 mb-3">
            <button type="button" class="btn btn-success btn-lg float-right" data-toggle="modal" data-target="#exampleModalLong">
                <i class="fas fa-plus"></i>
            </button>
            <button type="button" class="btn btn-success btn-lg float-right mr-3" data-toggle="modal" data-target="#upload-tutoria">
                <i class="fas fa-file-import"></i>
            </button>
        </div>
        <div class="col"></div>
    </div>
    <div class="row">

        <?
        if ($result != $db::$NO_DATA_ERROR){
            foreach ($result as $row){
                include 'Tutoria.php';
            }
        }
        ?>
    </div>
</div>
<!--/Informacion General-->
<!--MODALES-->
<form onsubmit="return false" id="create-tutoria">
    <?include 'CreateTutoria.php'?>
</form>

<div class="modal fade " id="upload-tutoria"
     tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">

            <div class="modal-header bg-success text-light">
                <h5 class="modal-title" id="exampleModalLongTitle">Ingresar Tutorias</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <div class="modal-body">
                    <div class="custom-control">
                        <label for="tutoria-file" class="custom-file-label" id="fileName"></label>
                        <input name="excel-file" type="file" class="custom-file-input" id="tutoria-file">
                    </div>
                    <hr>
                    <h4>Ejemplo de como llenar las tablas</h4>
                    <img src="../front-libs/img/excelExample.png" class="img-fluid my-3">
                    <ul>

                        <li>Los horarios se deben de mostrar de esta forma [hh:mm:00] para que sea valida</li>
                        <li>Si no se planea tener un horario para ciertos días de la semana, basta con escribir "none"</li>
                        <li class="text-warning">Solo existen dos tipos de tutoria por el momento: "Regularizacion" y "Recuperacion" </li>
                        <li class="text-warning">El formato recomendable es .xlsx</li>
                        <li class="text-danger">La informacion no se guardará en caso de que la unidad o el profesor no
                            se encuentren en la base de datos. Para mas informacion sobre Profesores y unidades visite
                            la seccion de "Alumnos y profesores" </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="upload-file">Subir tutoria</button>
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
<script src="../front-libs/javascript/coordinador/dashboard.js"></script>
<script src="../front-libs/universal.js"></script>
</body>
</html>