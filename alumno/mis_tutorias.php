
<?php

session_start();
//unset($_SESSION['userID']);
if (isset($_SESSION['userID'])){
    if ($_SESSION['userType'] == 1){
        header("Location: /tutorias/coordinador/dashboard.php");
    }
}else{
    header("Location: /tutorias/alumno/login.php");
}
$tutoria_mode = 'show';
$place = "mis-tutorias";
$userID = $_SESSION['userID'];
function isNotEmpty($input){
    return $input == '' ? '':'disabled';
}
function isEmpty($input){
    return $input == ''? true:false;
}
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
    <title>Alumno - tutorias</title>
    <link rel="stylesheet" href="../front-libs/css/bootstrap2.min.css">
    <link rel="stylesheet" href="../front-libs/css/ipn.theme.css">
    <link rel="stylesheet" href="../front-libs/css/toastr.min.css">
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
$result = $db->Query("SELECT * FROM tutoriasbyalumno WHERE idalumno=$userID;");
$db->close();

?>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-block mt-0 mb-3 btn-warning">Descargar formato</button>
        </div>
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
<?flush();?>
<script src="../front-libs/javascript/jquery.min.js"></script>
<script src="../front-libs/javascript/popper.min.js"></script>
<script src="../front-libs/javascript/bootstrap.min.js"></script>
<script src="../front-libs/javascript/toastr.min.js"></script>
<script src="../front-libs/javascript/sweetalert.min.js"></script>
<script src="../front-libs/javascript/alumno/mis_tutorias.js"></script>
<script src="../front-libs/universal.js"></script>
</body>
</html>