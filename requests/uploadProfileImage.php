<?php
require '../src/Database.php';
$db = new MySQLDB();
$userID = 1;
//nombre del archivo
$filename = $_FILES['imagen']['name'];
//posicion del archivo
$location = "../uploadedimages/".$filename;
$uploadOK = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

$valid_extensions = array("jpg","jpeg","png");

if (! in_array(strtolower($imageFileType),$valid_extensions)){
    $uploadOK = 0;
}

if ($uploadOK == 0){
    echo 0;
}else{
    if (move_uploaded_file($_FILES['imagen']['tmp_name'],$location)){
        $db->connect();
        $db->SQL("UPDATE Alumno SET fotoURL = '$location' WHERE (AlumnoID = $userID)");
        $db->close();
        echo $location;
    }else{
        echo 0;
    }
}