<?php
//INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES (NULL, 'sitio web con php');
include('../configuraciones/bd.php');

$conexionBD = BD::crearInstacia();

//condicional ternario
$id = isset($_POST['id']) ? $_POST['id'] : '';
$nombre_curso = isset($_POST['nombre_curso']) ? $_POST['nombre_curso'] : '';

$accion = isset($_POST['accion']) ? $_POST['accion'] : '';



if ($accion != '') {
    switch ($accion) {
        case 'agregar':
            $sql = "INSERT INTO cursos (id, nombre_curso) VALUES (NULL, :nombrecurso)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':nombrecurso', $nombre_curso);
            $consulta->execute();
            echo $sql;
            break;
        case 'editar':
            $sql = "UPDATE cursos SET nombre_curso=:nombrecurso WHERE id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':nombrecurso', $nombre_curso);

            $consulta->execute();
            break;
        case 'borrar':
            $sql = "DELETE FROM cursos WHERE id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            break;
        case 'seleccionar':
            $sql = "SELECT * FROM cursos WHERE id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $cursos = $consulta->fetch(PDO::FETCH_ASSOC);
            $nombre_curso=$cursos['nombre_curso'];
            $id=$cursos['id'];
            break;
    }
}


$consulta = $conexionBD->prepare("SELECT * FROM cursos");
$consulta->execute();

$listaCursos = $consulta->fetchAll();
