<?php
include('../configuraciones/bd.php');

$conexionBD = BD::crearInstacia();

$sql="SELECT * FROM alumnos";

$listaAlumnos=$conexionBD->query($sql);
$alumnos=$listaAlumnos->fetchall();

//print_r($alumnos);
?>