<?php
require('../src/Database.php');
require('../src/PDFHandler.php');
$userID = 1;
$tutoriaID= $_REQUEST['idtutoria'];
$pdf = new PDFHandler();

$pdf->AlumnobyTutoriaPDF($tutoriaID);