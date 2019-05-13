<?php
require "../src/Database.php";
$db = new MySQLDB();

$type = $_REQUEST['type'];
$id = $_REQUEST['id'];

if ($type == 'unidad' ){
    $db->SQL("DELETE FROM unidad WHERE idunidad = $id;");
}else if($type == 'profesor'){
    $db->SQL("DELETE FROM profesor WHERE idprofesor = $id;");
}
