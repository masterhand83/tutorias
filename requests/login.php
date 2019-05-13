<?php
require '../src/Database.php';

$db = new MySQLDB();

if ($_REQUEST['type'] == 0){
    $boleta = $_REQUEST['boleta'];
    $mail = $_REQUEST['correo'];

    $result =
        $db->Query("SELECT AlumnoID FROM Alumno WHERE Boleta = '$boleta' AND Mail = '$mail' ");

    //sleep(1);
    if ($result != $db::$NO_DATA_ERROR){
        session_start();
        $_SESSION['userType'] = 0;
        $_SESSION['userID'] = $result[0]['AlumnoID'];
        echo 1;
    }else{
        echo 0;
    }
}

if ($_REQUEST['type'] == 1){
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['password'];
    $db->connect();
        $result =
            $db->Query("SELECT idcoordinador FROM coordinador WHERE usuario = '$user' AND contraseña = '$pass'");
    $db->close();
    if ($result != $db::$NO_DATA_ERROR){
        session_start();
        $_SESSION['userType'] = 1;
        $_SESSION['userID'] = $result[0]['idcoordinador'];
        echo 1;
    }else{
        echo 0;
    }
}
