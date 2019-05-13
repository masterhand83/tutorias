<?php
require '../src/Database.php';
$db = new MySQLDB();

print_r($_REQUEST);

if ($_REQUEST['type'] == 'unidad'){
    $db->SQL("INSERT INTO unidad(unidad) VALUES ('{$_REQUEST['unidad']}');");

}else if($_REQUEST['type'] == 'profesor'){
    $db->SQL("INSERT INTO profesor(profesor) VALUES ('{$_REQUEST['profesor']}');");
    echo "";
}