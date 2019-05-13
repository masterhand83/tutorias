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
$db->SQL("UPDATE tutoria SET
idprofesor= {$_REQUEST['profesor']}, idunidad ={$_REQUEST['unidad']}, 
disponibles = {$_REQUEST['disponibles']} , lunes = '$lunes', martes = '$martes', 
miercoles = '$miercoles', jueves = '$jueves', viernes = '$viernes', sabado = '$sabado' 
WHERE idtutoria = {$_REQUEST['idtutoria']};");
$db->close();
print_r($_REQUEST);
function joinHorarios($inicio,$termino){
    if ($inicio !== '---' && $termino !== '---'){
        return $inicio.'-'.$termino;
    }else{
        return '---';
    }
}