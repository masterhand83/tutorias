<?php
require '../src/Database.php';
$db = new MySQLDB();
$userID = 1;
$sql = "UPDATE Alumno SET 
        Tel_casa = '{$_REQUEST['telefono']}',
        Celular = '{$_REQUEST['celular']}',
        Mail = '{$_REQUEST['email']}',
        Calle = '{$_REQUEST['calle']}',
        Num_ext = '{$_REQUEST['num_ext']}',
        Num_int = '{$_REQUEST['num_int']}',
        Colonia = '{$_REQUEST['colonia']}',
        Cp = '{$_REQUEST['cp']}',
        Delegacion = '{$_REQUEST['delegacion']}',
        Estado = '{$_REQUEST['estado']}'
        WHERE (AlumnoID = $userID);";

$db->connect();
if ($db->SQL($sql) == TRUE){
    echo "Cambios exitosamente guardados";
}else{
    http_response_code(500);
}
$db->close();