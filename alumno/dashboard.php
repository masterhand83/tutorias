
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

$place = 'dashboard';
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
    <title>Alumno - principal</title>
    <link rel="stylesheet" href="../front-libs/css/bootstrap2.min.css">
    <link rel="stylesheet" href="../front-libs/css/ipn.theme.css">
    <link rel="stylesheet" href="../front-libs/css/toastr.min.css">
    <!--link rel="stylesheet" href="../vendor/css/toastify.css"-->
</head>
<body  class="">

<!--BARRA DE NAVEGACION-->
<? include 'Navbar.php'?>
<!--/BARRA DE NAVEGACION-->
<!--Informacion General-->
<?php
require '../src/Database.php';
$db = new MySQLDB();
$db->connect();
$result = $db->Query("SELECT * FROM Alumno WHERE AlumnoID = $userID;")[0];
$db->close();
?>
<div class="container-fluid ">
    <div class="row">
        <div class="col"></div>
        <div class="col-sm-12 col-md-9 col-lg-7">
            <div class="card my-4 shadow">
                <h3 class="card-header text-center text-light bg-primary shadow-sm">
                    <strong>INFORMACION GENERAL</strong>
                </h3>
                <div class="card-body  h5">
                <form  onsubmit="return false;">
                    <div class="row mb-5">
                        <div class="col">
                        </div>
                        <div class="col-sm-6">
                            <?if (isEmpty($result['fotoURL'])){?>
                                <img class="img-fluid img-thumbnail mb-2" src="../front-libs/img/lost_profile.png">
                                <button type="button" class="btn btn-info btn-block"
                                        data-toggle="modal" data-target="#exampleModal">
                                    Subir imagen
                                </button>
                            <?}else{?>
                                <img class="img-fluid img-thumbnail my-1" src=<?=$result['fotoURL']?> alt="">
                            <?}?>

                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <hr>
                     <div class="row mt-1">
                         <div class="col-sm-6">
                             Nombre: <?=$result['Nombre']?> <?=$result['Apel_pat']?> <?=$result['Apel_mat']?>
                         </div>
                         <div class="col-sm-6">
                             Boleta: <span class="text-primary"><?=$result['Boleta']?></span>
                         </div>
                     </div>
                    <div class="row mt-4">
                        <div class="col-sm-3">
                            Carrera: <?=$result['Carrera']?>
                        </div>
                        <div class="col-sm-3">
                            Turno: <?=$result['Turno']?>
                        </div>
                        <div class="col-sm-3">
                            Semestre: <?=$result['Semestre']?>
                        </div>
                        <div class="col-sm-3">
                            Grupo: <?=$result['Grupo']?>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6">
                            Fecha de nacimiento: <?=$result['Fec_nac']?>
                        </div>
                        <div class="col-sm-6">
                            Sexo: <?=$result['Sexo']?>
                        </div>
                    </div>
                    <!--FORMULARIO PARA COMPLETAR-->
                    <hr>
                    <div class="form-row mt-4">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Telefono de casa</label>
                                <input type="text" id="telefono"
                                       class="form-control"
                                       value="<?=$result['Tel_casa']?>"
                                       <?=isNotEmpty($result['Tel_casa'])?>>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Telefono celular</label>
                                <input type="text" id="celular"
                                       class="form-control"
                                       value="<?=$result['Celular']?>"
                                    <?=isNotEmpty($result['Celular'])?>>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="">Correo Electronico</label>
                                <input type="text" id="email"
                                       class="form-control"
                                       value="<?=$result['Mail']?>"
                                    <?=isNotEmpty($result['Mail'])?>>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Calle</label>
                                <input type="text" id="calle"
                                       class="form-control"
                                       value="<?=$result['Calle']?>"
                                    <?=isNotEmpty($result['Calle'])?>>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Numero Exterior</label>
                                <input type="number" id="num-ext"
                                       class="form-control"
                                       value="<?=$result['Num_ext']?>"
                                    <?=isNotEmpty($result['Num_ext'])?>>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Numero Interior</label>
                                <input type="number" id="num-int"
                                       class="form-control"
                                       value="<?=$result['Num_int']?>"
                                    <?=isNotEmpty($result['Num_int'])?>>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Colonia</label>
                                <input type="text" id="colonia"
                                       class="form-control"
                                       value="<?=$result['Colonia']?>"
                                    <?=isNotEmpty($result['Colonia'])?>>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Codigo Postal</label>
                                <input type="text" id="cp"
                                       class="form-control"
                                       value="<?=$result['Cp']?>"
                                    <?=isNotEmpty($result['Cp'])?>>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="">Delegacion</label>
                                <input type="text"
                                       id="delegacion"
                                       class="form-control"
                                       value="<?=$result['Delegacion']?>"
                                    <?=isNotEmpty($result['Delegacion'])?>>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <input type="text" id="estado"
                                       class="form-control"
                                       value="<?=$result['Estado']?>"
                                    <?=isNotEmpty($result['Estado'])?>>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?
                            if (isEmpty($result['Tel_casa']) ||
                                isEmpty($result['Celular']) ||
                                isEmpty($result['Mail']) ||
                                isEmpty($result['Calle']) ||
                                isEmpty($result['Num_ext']) ||
                                isEmpty($result['Num_int']) ||
                                isEmpty($result['Colonia']) ||
                                isEmpty($result['Cp']) ||
                                isEmpty($result['Delegacion']) ||
                                isEmpty($result['Estado'])){
                                echo "<div class='col-sm-12'>
                                    <button id='complete-info-btn' type='submit' class='btn btn-info btn-block'>
                                        Completar informacion
                                    </button>
                                    </div>";
                            }else{

                            }
                        ?>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>
<!--/Informacion General-->


<?if(isEmpty($result['fotoURL'])){?>
    <!--SUBIR ARCHIVO: MODAL-->
    <form onsubmit="return false;">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalLabel">Imagen de Alumno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="custom-file">
                        <input id="imagen-perfil" type="file" class="custom-file-input">
                        <label for="imagen-perfil" class="custom-file-label">Elegir imagen</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="upload-image" type="submit" class="btn btn-primary">Enviar Imagen</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?}else{?>
    <!--AQUI ESTARIA UNA FORMA DE ROMPER MI CODIGO...-->
    <!--SI HUBIERA UNA-->
<?}?>
<script src="../front-libs/javascript/jquery.min.js"></script>
<script src="../front-libs/javascript/popper.min.js"></script>
<script src="../front-libs/javascript/bootstrap.min.js"></script>
<script src="../front-libs/javascript/toastr.min.js"></script>
<!--script src="../vendor/javascript/toastify.js"></script-->
<script src="../front-libs/javascript/alumno/dashboard.js"></script>
<script src="../front-libs/universal.js"></script>
</body>
</html>