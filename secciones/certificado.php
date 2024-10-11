<?php
require('../libreria/fpdf.php');
include_once('../configuraciones/bd.php');

$conexionBD=BD::crearInstacia();

function agregarTexto($pdf,$texto,$x,$y,$align='L',$fuente,$size=10,$r=0,$g=0,$b=0){
    $pdf->SetFont($fuente,"",$size);
    $pdf->SetXY($x,$y);
    $pdf->SetTextColor($r,$g,$b);
    $pdf->Cell(0,10,$texto,0,0,$align);
}

function agregarImagen($pdf,$imagen,$x,$y){
    $pdf->Image($imagen,$x,$y,0);
}

$idcurso=isset($_GET['idcurso'])?$_GET['idcurso']:'';
$idalumno=isset($_GET['idalumno'])?$_GET['idalumno']:'';

$sql="SELECT alumnos.nombre, alumnos.apellido,cursos.nombre_curso
FROM alumnos, cursos WHERE 
alumnos.id=:idalumno AND cursos.id=:idcurso";
$consulta=$conexionBD->prepare($sql);
$consulta->bindParam(':idalumno',$idalumno);
$consulta->bindParam(':idcurso',$idcurso);
$consulta->execute();

$alumno=$consulta->fetch(PDO::FETCH_ASSOC);
//print_r($alumno['nombre'].' '.$alumno['apellido']);

$pdf = new FPDF('L','mm',array(254,194));
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
agregarImagen($pdf,'../src/certificado.jpg',0,0);
agregarTexto($pdf,utf8_decode($alumno['nombre'].' '.$alumno['apellido']),0,85,'C',"Helvetica",50,0,84,115);
agregarTexto($pdf,ucwords(utf8_encode($alumno['nombre_curso'])),0,122,'C',"Helvetica",40,0,84,115);
agregarTexto($pdf,date("m - d - Y"),100,135,'C',"Helvetica",15,0,84,115);
$pdf->Output();





?>