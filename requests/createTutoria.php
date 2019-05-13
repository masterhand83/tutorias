<?php
require_once "../src/Database.php";

$lunes = joinHorarios($_REQUEST['lun_inicio'],$_REQUEST['lun_termino']);
$martes = joinHorarios($_REQUEST['mart_inicio'],$_REQUEST['mart_termino']);
$miercoles = joinHorarios($_REQUEST['mi_inicio'],$_REQUEST['mi_termino']);
$jueves = joinHorarios($_REQUEST['ju_inicio'],$_REQUEST['ju_termino']);
$viernes = joinHorarios($_REQUEST['vi_inicio'],$_REQUEST['vi_termino']);
$sabado = joinHorarios($_REQUEST['sab_inicio'],$_REQUEST['sab_termino']);


$db = new MySQLDB();
$db->connect();
$db->SQL("INSERT INTO tutoria (idprofesor, idunidad, disponibles, lunes, martes, miercoles, jueves, viernes, sabado)
VALUES ({$_REQUEST['profesor']}, {$_REQUEST['unidad']},{$_REQUEST['disponibles']}, 
'$lunes','$martes', '$miercoles' ,'$jueves', '$viernes', '$sabado');");
$db->close();


function joinHorarios($inicio,$termino){
    if ($inicio !== '---' && $termino !== '---'){
        return $inicio.'-'.$termino;
    }else{
        return '---';
    }
}