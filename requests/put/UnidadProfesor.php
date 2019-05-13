<?php
require "../../src/Database.php";

$db = new MySQLDB();

if ($_REQUEST['type'] == 'unidad'){
    $db->SQL("UPDATE unidad SET unidad = '{$_REQUEST['unidad']}' WHERE idunidad = {$_REQUEST['idunidad']};");


    echo "
<li class=\"list-group-item\" id='unidad{$_REQUEST['idunidad']}'>
    {$_REQUEST['unidad']}
    <button class=\"btn btn-outline-danger float-right\"
    onclick=\"deleteUnidad({$_REQUEST['idunidad']})\">
        <i class=\"fa fa-trash\"></i>
    </button>
    <button class=\"btn btn-outline-warning float-right mr-3\"
            onclick=\"editUnidad({$_REQUEST['idunidad']},'{$_REQUEST['unidad']}')\">
        <i class=\"fa fa-edit\"></i>
    </button>
</li>";

}else if ($_REQUEST['type'] == 'profesor'){
    $db->SQL("UPDATE profesor SET profesor = '{$_REQUEST['profesor']}' WHERE idprofesor = {$_REQUEST['idprofesor']};");

    echo "
<li class=\"list-group-item\" id=\"profesor{$_REQUEST['idprofesor']}\">
    {$_REQUEST['profesor']}
    <button class=\"btn btn-outline-danger float-right\"
            onclick=\"deleteProfesor({$_REQUEST['idprofesor']})\">
        <i class=\"fa fa-trash\"></i>
    </button>
    <button class=\"btn btn-outline-warning float-right mr-3\"
            onclick=\"editProfesor({$_REQUEST['idprofesor']},'{$_REQUEST['profesor']}')\">
        <i class=\"fa fa-edit\"></i>
    </button>
</li>";
}