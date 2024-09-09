<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'sitio web con php');
include ('../configuraciones/bd.php');

$conexionBD=BD::crearInstacia();




$consulta=$conexionBD->prepare("SELECT * FROM cursos");
$consulta->execute();

$listaCursos=$consulta->fetchAll();
print_r($listaCursos);


?>