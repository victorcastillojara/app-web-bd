<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'sitio web con php');
include ('../configuraciones/bd.php');

$conexionBD=BD::crearInstacia();

$id=isset($_POST['id'])?$_POST['id']:'';
$nombre_curso=isset($_POST['nombre_curso'])?$_POST['nombre_curso']:'';

$accion=isset($_POST['accion'])?$_POST['accion']:'';

if ($accion!='') {
    switch ($accion) {
        case 'agregar':
            $sql="INSERT INTO cursos (id, nombre_curso) VALUES (NULL, '$nombre_curso')";
            $consulta=$conexionBD->prepare($sql);
            $consulta->execute();
            echo $sql;
            break;
        case 'editar':
            $sql="INSERT INTO cursos (id, nombre_curso) VALUES (NULL, '$nombre_curso')";
            break;
        case 'borrar':
            $sql="INSERT INTO cursos (id, nombre_curso) VALUES (NULL, '$nombre_curso')";
            break;
        
        default:
            # code...
            break;
    }
}


$consulta=$conexionBD->prepare("SELECT * FROM cursos");
$consulta->execute();

$listaCursos=$consulta->fetchAll();



?>