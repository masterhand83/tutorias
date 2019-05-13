<?php
require_once '../src/Database.php';
$db = new MySQLDB();
$db->connect();
$db->SQL("DELETE FROM tutoria_Alumno WHERE idtutoria = {$_REQUEST['idtutoria']}");
$db->close();
$db->connect();
$db->SQL("DELETE FROM tutoria WHERE idtutoria = {$_REQUEST['idtutoria']}");
$db->close();
