<?php

session_start();
//unset($_SESSION['userID']);
if (isset($_SESSION['userID'])){
    if ($_SESSION['userType'] == 0){
        header("Location: /tutorias/alumno/dashboard.php");
    }else if ($_SESSION['userType'] == 1){
        header("Location: /tutorias/coordinador/dashboard.php");
    }
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
    <title>Login - alumno</title>
    <link rel="stylesheet" href="../front-libs/css/bootstrap2.min.css">
    <link rel="stylesheet" href="../front-libs/css/ipn.theme.css">
    <link rel="stylesheet" href="../front-libs/css/toastr.min.css">
</head>
<body  class="">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/tutorias">Tutorias</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link active" href="/tutorias/alumno/login.php">Alumno</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/tutorias/coordinador/login.php">Coordinador</a>
            </li>

        </ul>
    </div>
</nav>
<div class="container-fluid ">
    <div class="row mt-5">
        <div class="col-sm-1 col-md-2 col-lg-4"> &nbsp;</div>
        <div class="col-sm-10 col-md-8 col-lg-4">
            <div class="card mb-4">
                <div class="card-body">

                    <form id="loginForm" onsubmit="return false;">
                        <div class="form-group">
                            <label for="usuario">Correo</label>
                            <input name="correo" type="text" class="form-control" placeholder="Correo"
                            id="correo"
                            pattern="[a-zA-Z]+">
                        </div>
                        <div class="form-group">
                            <label for="contra">Boleta</label>
                            <input name="boleta" type="text" class="form-control" placeholder="Boleta"
                            id="boleta"
                            pattern="[0-9]+">
                        </div>
                        <input type="submit" class="btn btn-block btn-primary mt-5" value="Iniciar sesion"
                        id="loginBtn">
                    </form>

                </div>
            </div>
        </div>
        <div class="col-sm-1 col-md-2 col-lg-4">&nbsp;</div>
    </div>
</div>

<script src="../front-libs/javascript/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="../front-libs/javascript/toastr.min.js"></script>
<script src="../front-libs/javascript/bootstrap.min.js"></script>
<script src="../front-libs/javascript/login_alumno.js"></script>
</body>
</html>