<?php
require '../vendor/autoload.php';
require  '../src/Database.php';
$input = $_FILES['file']['tmp_name'];
print_r($input);

$db = new MySQLDB();
$spread = \PhpOffice\PhpSpreadsheet\IOFactory::load($input);
$data = $spread->getActiveSheet()->toArray();

for ($i = 1; $i < sizeof($data); $i++){
    $row = $data[$i];
    $unidad = $db->Query("SELECT * FROM unidad WHERE unidad = '{$row[0]}'")[0];
    $profesor = $db ->Query("SELECT * FROM profesor WHERE profesor = '{$row[1]}'")[0];

    if ($unidad != 'n' && $profesor != 'n'){

        $lunes = parseDate($row[4]);
        $martes = parseDate($row[5]);
        $miercoles = parseDate($row[6]);
        $jueves = parseDate($row[7]);
        $viernes = parseDate($row[8]);
        $sabado = parseDate($row[9]);

        $sql = "
        INSERT INTO 
          tutoria (idprofesor,idunidad,disponibles,lunes,martes,miercoles,jueves,viernes,sabado,tipoTutoria)
        VALUES
          ({$profesor['idprofesor']},{$unidad['idunidad']},{$row[3]},'$lunes','$martes','$miercoles','$jueves',
        '$viernes','$sabado','{$row[2]}');";
        $db->SQL($sql);

    }

}


function parseDate($input){

    return $input == 'none'? '---': $input;
}