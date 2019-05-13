<?php
require_once 'fpdf181/fpdf.php';
require_once'Database.php';
class PDFHandler{
    public function generateTutoriaPDF($alumnoID, $tutoriaID){
        $fontSize = 10;

        $db = new MySQLDB();

        $db->connect();
        $alumno = $db->Query("SELECT * FROM db_tutorias.Alumno WHERE AlumnoID = $alumnoID;")[0];
        $db->close();
        $db->connect();
        $tutoria =
            $db->
            Query("SELECT * FROM db_tutorias.tutoriasbyAlumno WHERE idalumno = $alumnoID AND idtutoria =$tutoriaID;")[0];
        $db->close();

        $title =
            "
            INSTITUTO POLITECNICO NACIONAL \n
            SECRETARIA ACADEMICA \n
            DIRECCION DE EDUCACION MEDIA SUPERIOR \n
            CECyT \" Juan de Dios Batiz \" SERVICIOS ACADEMICOS \n \n
            PROGRAMA INSTITUCIONAL DE TUTORIAS (PIT) \n
        ";
        $sexo =$alumno['Sexo']== 'H'? '(X) Masculino () Femenino':' (X) Femenino';
        $tipoTutoria = $tutoria['tipoTutoria'] == 'Regularizacion'?
            'Regularizacion(X) Recuperacion()':'Regularizacion() Recuperacion(X)';
        $alumnoData =
            "
            Alumno: {$alumno['Nombre']} {$alumno['Apel_pat']} {$alumno['Apel_mat']} \n
            No. de Boleta: {$alumno['Boleta']} Grupo: Sin grupo \n
            Tel. Casa: {$alumno['Tel_casa']}    Cel: {$alumno['Celular']}\n
            Correo Electronico: {$alumno['Mail']}  \n
            Genero: $sexo \n
            Tipo de Tutoria: $tipoTutoria

        ";
        $alumnoData2 =  "
            Alumno Tutorado: {$alumno['Nombre']} {$alumno['Apel_pat']} {$alumno['Apel_mat']}.  Nombre del profesor: {$tutoria['profesor']}. \n
            Unidad de aprendizaje: {$tutoria['unidad']} ({$tutoria['tipoTutoria']}).

        ";
        $alumnoImageURL = explode('/',$alumno['fotoURL'])[2];


        $pdf = new FPDF();

        //$pdf->SetMargins(10,20,10);
        $pdf->SetFont('Arial','',13);
        //PRIMERA PAGINA
        $pdf->AddPage();
        //IMAGENES DE LAS INSTITUCIONES
        $pdf->Image(
            'http://localhost/tutorias/src/logoipn.png',
            10,
            10,
            30,
            32,
            "PNG");
        $pdf->Image(
            'http://localhost/tutorias/src/cecyt9logo.png',
            $pdf->GetPageWidth() - 40,
            10,
            30,
            29,
            "PNG");
        $pdf->Image(
            "http://localhost/tutorias/uploadedimages/$alumnoImageURL",
            $pdf->GetPageWidth() - 55,
            95,
            30,
            30,
            "PNG");

        $pdf->MultiCell($pdf->GetPageWidth() - 25,3,$title,0,'C');
        $pdf->SetFont('Arial',"B", $fontSize);
        $pdf->Cell($pdf->GetPageWidth() - 15,4,"FICHA DE ACCION TUTORIAL",0,1,"C");
        $pdf->SetFont('Arial','',$fontSize);
        $pdf->Cell($pdf->GetPageWidth() - 15,4,"Enero-Junio 2019",0,1,"C");
        $pdf->Ln(10);
        $pdf->SetFont('Arial',"B", $fontSize);
        $pdf->SetFillColor(191,191,191);
        $pdf->Cell($pdf->GetPageWidth() - 20,9,"Datos personales del Alumno",1,1,"C",1);
        $pdf->SetFont('Arial','',$fontSize);
        $pdf->MultiCell($pdf->GetPageWidth() - 20, 4,$alumnoData,1,'J');

        $pdf->Ln(5);
        $pdf->SetFont('Arial',"B", $fontSize);
        $pdf->Cell($pdf->GetPageWidth() -20,5,'Unidades de Aprendizaje que inscribe en el PIT',
            1,0,'C',1);

        $pdf->Ln(5);
        $pdf->Cell($pdf->GetPageWidth()/2,5,'Unidad de Aprendizaje',
            1,0,'C',0);
        $pdf->Cell($pdf->GetPageWidth()/2 -20,5,'Nombre del profesor',
            1,0,'C',0);
        $pdf->SetFont('Arial','',$fontSize);
        $pdf->Ln(5);
        $pdf->Cell($pdf->GetPageWidth()/2,5,$tutoria['unidad'].' ('.$tutoria['tipoTutoria'].')',
            1,0,'C',0);
        $pdf->Cell($pdf->GetPageWidth()/2 -20,5,$tutoria['profesor'],
            1,0,'C',0);
        $pdf->Ln(50);

        $pdf->Cell($pdf->GetPageWidth() -20,5,'Firma del alumno: _________________________________',
            0,0,'C',0);

        $pdf->AddPage();
        $pdf->MultiCell($pdf->GetPageWidth(),3,$alumnoData2,0,'J');
        $pdf->Ln(1);

        $pdf->Cell($pdf->GetPageWidth()/10,5,'No. Sesion',
            1,0,'C',0);
        $pdf->Cell($pdf->GetPageWidth()/10,5,'Fecha',
            1,0,'C',0);
        $pdf->Cell($pdf->GetPageWidth()/10,5,'Horas',
            1,0,'C',0);
        $pdf->Cell($pdf->GetPageWidth()/2 -30,5,'Tematica de la tutoria',
            1,0,'C',0);
        $pdf->Cell($pdf->GetPageWidth()/3 -20,5,'Firma del alumno',
            1,0,'C',0);
        $pdf->Ln(5);
        for ($i = 0; $i<24; $i++){
            $pdf->Cell($pdf->GetPageWidth()/10,10,' ',
                1,0,'C',0);
            $pdf->Cell($pdf->GetPageWidth()/10,10,' ',
                1,0,'C',0);
            $pdf->Cell($pdf->GetPageWidth()/10,10,' ',
                1,0,'C',0);
            $pdf->Cell($pdf->GetPageWidth()/2 -30,10,' ',
                1,0,'C',0);
            $pdf->Cell($pdf->GetPageWidth()/3 -20,10,' ',
                1,0,'C',0);
            $pdf->Ln(10);
        }



        $pdf->Output();


        flush();
        exit(0);
    }
    public function AlumnobyTutoriaPDF($idtutoria){
        $fontSize = 14;
        $db = new MySQLDB();


        $alumnos = $db->Query("SELECT * FROM db_tutorias.alumnobytutorias where idtutoria = $idtutoria;");
        $tutoria = $db->Query("SELECT * FROM tutorias where idtutoria = $idtutoria;")[0];

        $title =
            "
            INSTITUTO POLITECNICO NACIONAL \n
            SECRETARIA ACADEMICA \n
            DIRECCION DE EDUCACION MEDIA SUPERIOR \n
            CECyT \" Juan de Dios Batiz \" SERVICIOS ACADEMICOS \n \n
            PROGRAMA INSTITUCIONAL DE TUTORIAS (PIT) \n
        ";
        $tutoriaData =
            "
            Unidad: {$tutoria['unidad']}   \n
            profesor:{$tutoria['profesor']} \n
            Lugares disponibles:{$tutoria['disponibles']}\n
            tipo de tutoria: {$tutoria['tipoTutoria']} 

        ";
        $pdf = new FPDF();

        //$pdf->SetMargins(10,20,10);
        $pdf->SetFont('Arial','',13);
        //PRIMERA PAGINA
        $pdf->AddPage();
        //IMAGENES DE LAS INSTITUCIONES
        $pdf->Image(
            'http://localhost/tutorias/src/logoipn.png',
            10,
            10,
            30,
            32,
            "PNG");
        $pdf->Image(
            'http://localhost/tutorias/src/cecyt9logo.png',
            $pdf->GetPageWidth() - 40,
            10,
            30,
            29,
            "PNG");



        $pdf->MultiCell($pdf->GetPageWidth() - 25,3,$title,0,'C');
        $pdf->SetFont('Arial',"B", $fontSize);
        $pdf->Cell($pdf->GetPageWidth() - 15,4,"LISTA DE ALUMNOS INSCRITOS EN LA TUTORIA",0,1,"C");
        $pdf->SetFont('Arial','',$fontSize);
        $pdf->Cell($pdf->GetPageWidth() - 15,5,"Enero-Junio 2019",0,1,"C");
        $pdf->Ln(10);
        $pdf->SetFont('Arial',"B", $fontSize);
        $pdf->SetFillColor(191,191,191);
        $pdf->Cell($pdf->GetPageWidth() - 20,9,"Tutoria",1,1,"C",1);
        $pdf->SetFont('Arial','',$fontSize);
        $pdf->MultiCell($pdf->GetPageWidth() - 20, 4,$tutoriaData,1,'J');

        $pdf->Ln(5);

        $pdf->Cell($pdf->GetPageWidth()/2,5,'Alumno',
            1,0,'C',0);
        $pdf->Cell($pdf->GetPageWidth()/2 -22,5,'Boleta',
            1,0,'C',0);

        $pdf->Ln(5);

        if ($alumnos != $db::$NO_DATA_ERROR){
            foreach ($alumnos as $alumno){
                $pdf->Cell($pdf->GetPageWidth()/2,7,"{$alumno['Nombre']} {$alumno['Apel_pat']} {$alumno['Apel_mat']}",
                    1,0,'C',0);
                $pdf->Cell($pdf->GetPageWidth()/2 -22,7,"{$alumno['Boleta']}",
                    1,0,'C',0);
                $pdf->Ln(7);
            }
        }




        $pdf->Output();
        flush();
        exit(0);


    }
}
/**/