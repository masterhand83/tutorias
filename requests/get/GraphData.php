<?php
header('Content-Type: application/json');
require "../../src/Database.php";
$db = new MySQLDB();
$result =
$tutoriasID = $db->Query("SELECT idtutoria FROM tutoria;");
$response;
for ($i = 0; $i < sizeof($tutoriasID); $i++){
    $id = $tutoriasID[$i]['idtutoria'];
    $unidad = $db->Query("SELECT unidad FROM tutorias WHERE idtutoria = $id")[0]['unidad'];
    $No_Alumnos = $db->Query("SELECT COUNT(*) FROM tutoria_Alumno WHERE idtutoria = $id")[0]['COUNT(*)'];
    $response[$i]["unidad"] = $unidad;
    $response[$i]["alumnos"] = $No_Alumnos;
}

print json_encode($response);