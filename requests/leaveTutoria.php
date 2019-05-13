<?php
require_once "../src/Database.php";
$db = new MySQLDB();
$db->connect();
$db->SQLCall("leaveTutoria({$_REQUEST['idalumno']},{$_REQUEST['idtutoria']})");
$db->close();