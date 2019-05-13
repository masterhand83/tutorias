
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
    <title>Coordinador - Tutoria</title>
    <link rel="stylesheet" href="../front-libs/css/bootstrap2.min.css">
    <link rel="stylesheet" href="../front-libs/css/toastr.min.css">
    <link rel="stylesheet" href="../front-libs/fontawesome/css/all.css">
    <link rel="stylesheet" href="../front-libs/css/ipn.theme.css">
    <!--link rel="stylesheet" href="../vendor/css/toastify.css"-->
</head>
<?ob_flush(); flush()?>

<!--BARRA DE NAVEGACION-->
<?include_once 'Navbar.php'?>
<!--/BARRA DE NAVEGACION-->
<!--Informacion General-->
<?php
require '../src/Database.php';

$db = new MySQLDB();
$db->connect();
$tutoria = $db->Query("SELECT * FROM tutorias WHERE idtutoria = {$_REQUEST['idtutoria']};")[0];
$db->close();

$db->connect();
$unidades = $db->Query('SELECT * FROM unidad;');
$db->close();

$db->connect();
$profesores = $db->Query('SELECT * FROM profesor;');
$db->close();

$lunes = explode('-',$tutoria['lunes']);
$martes = explode('-',$tutoria['martes']);
$miercoles = explode('-',$tutoria['miercoles']);
$jueves = explode('-',$tutoria['jueves']);
$viernes = explode('-',$tutoria['viernes']);
$sabado = explode('-',$tutoria['sabado']);
?>
<?ob_flush(); flush()?>
<body>
    <form onsubmit="return false;" id="edit-tutoria">
        <div class="container my-5">
            <div class="form-row">
                <div class="col-lg-6">
                    <div class="input-control">
                        <label for="unidad">Unidad de aprendizaje: </label>
                        <select class="custom-select" name="unidad" id="unidad" >
                            <?foreach ($unidades as $row){?>
                                <option value="<?=$row['idunidad']?>"
                                    <?if($row['unidad'] == $tutoria['unidad']){echo 'selected="selected"';}?>>
                                    <?=$row['unidad']?>
                                </option>
                            <?}?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-fd">
                        <label for="profesor">Profesor encargado: </label>
                        <select class="custom-select" name="profesor" id="profesor">
                            <?foreach ($profesores as $row){?>
                                <option value="<?=$row['idprofesor']?>"
                                    <?if($row['profesor'] == $tutoria['profesor']){echo 'selected="selected"';}?>>
                                    <?=$row['profesor']?>
                                </option>
                            <?}?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-row mt-2">
                <div class="col-lg-9">
                    <div class="input-df">
                        <label for="type">Tipo de tutoria: </label>
                        <select class="custom-select" name="type" id="type">
                            <?if($tutoria['tipoTutoria'] == 'Regularizacion'){
                                echo "
                    <option value='Regularizacion' selected='selected'>Regularizacion</option>
                    <option value='Recuperacion'>Recuperacion</option>";
                            }else{
                                echo "
                    <option value='Regularizacion'>Regularizacion</option>
                    <option value='Recuperacion' selected='selected'>Recuperacion</option>";
                            }?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="disponibles">Lugares disponibles: </label>
                        <input
                                name="disponibles"
                                step="1" min="1"
                                max="50"
                                type="number" class="form-control"
                                id="disponibles" value="<?=$tutoria['disponibles']?>">
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col-lg-12 text-center">
                    <h4>Horario de la semana</h4>
                </div>
                <div class="col-lg-2 border">
                    <strong >Lunes</strong>
                    <div class="form-group">
                        <label for="inicio">Inicio</label>
                        <input name="lun_inicio" type="time" class="form-control" id="lun-inicio"
                               value="<?=substr($lunes[0],0,5)?>">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="termino">Termino</label>
                        <input name="lun_termino" type="time" class="form-control" id="lun-termino"
                               value="<?=substr($lunes[1],0,5)?>">
                    </div>
                </div>
                <div class="col-lg-2 border">
                    <strong >Martes</strong>
                    <div class="form-group">
                        <label for="inicio">Inicio</label>
                        <input name="mart_inicio" type="time" class="form-control" id="mart-inicio"
                               value="<?=substr($martes[0],0,5)?>">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="termino">Termino</label>
                        <input name="mart_termino" type="time" class="form-control" id="mart-termino"
                               value="<?=substr($martes[1],0,5)?>">
                    </div>
                </div>
                <div class="col-lg-2 border">
                    <strong >Miercoles</strong>
                    <div class="form-group">
                        <label  for="inicio">Inicio</label>
                        <input  name="mi_inicio" type="time" class="form-control" id="mi-inicio"
                                value="<?=substr($miercoles[0],0,5)?>">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="termino">Termino</label>
                        <input name="mi_termino" type="time" class="form-control" id="mi-termino"
                               value="<?=substr($miercoles[1],0,5)?>">
                    </div>
                </div>
                <div class="col-lg-2 border">
                    <strong >Jueves</strong>
                    <div class="form-group">
                        <label for="inicio">Inicio</label>
                        <input name="ju_inicio" type="time" class="form-control" id="mart-inicio"
                               value="<?=substr($jueves[0],0,5)?>">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="termino">Termino</label>
                        <input name="ju_termino" type="time" class="form-control" id="mart-termino"
                               value="<?=substr($jueves[1],0,5)?>">
                    </div>
                </div>
                <div class="col-lg-2 border">
                    <strong >Viernes</strong>
                    <div class="form-group">
                        <label for="inicio">Inicio</label>
                        <input name="vi_inicio" type="time" class="form-control" id="mart-inicio"
                               value="<?=substr($viernes[0],0,5)?>">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="termino">Termino</label>
                        <input name="vi_termino" type="time" class="form-control" id="mart-termino"
                               value="<?=substr($viernes[1],0,5)?>">
                    </div>
                </div>
                <div class="col-lg-2 border">
                    <strong >Sabado</strong>
                    <div class="form-group">
                        <label for="inicio">Inicio</label>
                        <input name="sab_inicio" type="time" class="form-control" id="mart-inicio" value="<?=substr($sabado[0],0,5)?>">
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="termino">Termino</label>
                        <input name="sab_termino" type="time" class="form-control" id="mart-termino" value="<?=substr($sabado[1],0,5)?>">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <? include 'Alumnos_list.php' ?>
            </div>
            <div class="form-row">
                <input type="hidden" name="idtutoria" value="<?=$tutoria['idtutoria']?>">
                <button type="submit" class="btn btn-warning my-2 float-right">Editar</button>
            </div>
        </div>
    </form>

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