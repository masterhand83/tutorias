<?php
header('Content-type: text/plain');
require ("../src/Database.php");
header("Access-Control-Allow-Origin: *");
$db = new MySQLDB();
$inputJSON = file_get_contents('php://input');
$request = json_decode($inputJSON,true);

//print_r($_REQUEST);
$db->connect();
    $result = $db->Query("SELECT * FROM tutoriasbyalumno WHERE idalumno = '{$_REQUEST['userID']}'");
$db->close();
$db->connect();
    $tutoria = $db->Query("SELECT * FROM tutorias WHERE idtutoria = {$_REQUEST['tutoriaID']} ")[0];

$db->close();
    $success = 0;
    if ($result != $db::$NO_DATA_ERROR){
        foreach ($result as $row){
            if(
            overlaps($row['lunes'],$tutoria['lunes'], 'lunes') ||
            overlaps($row['martes'],$tutoria['martes'],'martes') ||
            overlaps($row['miercoles'],$tutoria['miercoles'], 'miercoles') ||
            overlaps($row['jueves'],$tutoria['jueves'],'jueves') ||
            overlaps($row['viernes'],$tutoria['viernes'],'viernes') ||
            overlaps($row['sabado'],$tutoria['sabado'],'sabado') == true){
                $success = 0;
                break;
            }else{
                $success = 1;
            }
        }
    }else{
        $success = 1;
    }
    if ($success == 1){
        $db->connect();
            $resultado = $db->SQLCall("joinTutoria({$_REQUEST['userID']},{$_REQUEST['tutoriaID']})");
            if ($resultado == true){
                echo "R:1";
            }else{
                echo "R:0";
            }
        $db->close();
    }else{

        echo "R:00";

    }

    function overlaps($target, $value, $name = "d")
    {
        if ($target !== "---" && $value !== "---") {
            $iT = explode("-", $target)[0];
            $fT = explode("-", $target)[1];
            $inicioTarget = strtotime($iT);
            $finTarget = strtotime($fT);

            $iV = explode("-", $value)[0];
            $fV = explode("-", $value)[1];
            $inicioValue = strtotime($iV);
            $finValue = strtotime($fV);

            //echo "$name:\n\tT: $iT - $fT\n\tV: $iV - $fV \n";
            if ($inicioTarget == $inicioValue && $finTarget == $finValue){
                return true;
            }
            if ($inicioTarget <= $inicioValue && $inicioValue < $finTarget){
                return true;
            }
            if ($inicioTarget < $finValue && $finValue < $finTarget){
                return true;
            }
            if ($inicioValue < $inicioTarget && $finTarget < $finValue){
                return true;
            }
            return false;
        } else {
            return false;
        }
    }
