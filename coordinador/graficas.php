<?php

session_start();
if (isset($_SESSION['userID'])){
    if ($_SESSION['userType'] == 0){
        header("Location: /tutorias/alumno/dashboard.php");
    }
}else{
    header("Location: /tutorias/coordinador/login.php");
}
$place = 'graficas';
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
    <link rel="stylesheet" href="../front-libs/fontawesome/css/all.css">
    <link rel="stylesheet" href="../front-libs/css/ipn.theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
    <!--link rel="stylesheet" href="../vendor/css/toastify.css"-->
</head>
<?flush()?>
<body  class="">

<!--BARRA DE NAVEGACION-->
<?include_once 'Navbar.php'?>
<!--/BARRA DE NAVEGACION-->
<?php
require '../src/Database.php';
$db = new MySQLDB();

$unidades = $db->Query("SELECT * FROM unidad;");
$profesores = $db->Query("SELECT * FROM profesor;")

?>

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-sm-12 col-md-12 col-lg-8" style="overflow-y: auto;">
                <canvas id="alumnosByTutoria" style="width: 300px; height: 200px; overflow-y: auto">
                    tu buscador no soporta la generacion de graficas
                </canvas>
        </div>
        <div class="col-lg-2" ></div>
    </div>


</div>
<!--MODALES-->

<?flush();?>
<script src="../front-libs/javascript/jquery.min.js"></script>
<script src="../front-libs/javascript/popper.min.js"></script>
<script src="../front-libs/javascript/bootstrap.min.js"></script>
<script src="../front-libs/javascript/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="../front-libs/javascript/coordinador/graficas.js"></script>
<script src="../front-libs/universal.js"></script>
</body>
</html>