<?php
include('../configuraciones/bd.php');

$conexionBD = BD::crearInstacia();


//print_r($_POST);

//condicional ternario
$id = isset($_POST['id']) ? $_POST['id'] : '';
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
$cursos = isset($_POST['cursos']) ? $_POST['cursos'] : '';
$accion = isset($_POST['accion']) ? $_POST['accion'] : '';

//transforma todo el nombre a mayuscula
$nombreM = strtoupper($nombre);
$apellidoM = strtoupper($apellidos);

if ($accion != '') {
    switch ($accion) {
        case 'agregar':
            $sql = "INSERT INTO alumnos (id, nombre,apellido) VALUES (NULL, :nombre,:apellidos)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':nombre', $nombreM);
            $consulta->bindParam(':apellidos', $apellidoM);
            $consulta->execute();

            //recupera el ultimo id insertado
            $idAlumno = $conexionBD->lastInsertId();
            //echo $sql;

            foreach ($cursos as $curso) {
                $sql = "INSERT INTO alumnos_cursos (id, idalumno,idcurso) VALUES (NULL, :idalumno,:idcurso)";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':idalumno', $idAlumno);
                $consulta->bindParam(':idcurso', $curso);
                $consulta->execute();
            }
            $arregloCursos = $cursos;

            break;
        case 'editar':
            $sql = "UPDATE alumnos SET nombre=:nombre,apellido=:apellido WHERE id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':apellido', $apellidoM);
            $consulta->bindParam(':nombre', $nombreM);
            $consulta->execute();

            if (isset($cursos)) {
                $sql = "DELETE FROM alumnos_cursos WHERE idalumno = :idalumno";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':idalumno', $id);
                $consulta->execute();
            }

            foreach ($cursos as $curso) {
                $sql = "INSERT INTO alumnos_cursos (id,idalumno,idcurso) VALUES (NULL,:idalumno,:idcurso)";
                $consulta = $conexionBD->prepare($sql);
                $consulta->bindParam(':idalumno', $id);
                $consulta->bindParam(':idcurso', $curso);
                $consulta->execute();
            }

            break;
        case 'borrar':
            $sql = "DELETE FROM alumnos WHERE id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            break;
        case 'seleccionar':
            $sql = "SELECT * FROM alumnos WHERE id=:id";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $alumnos = $consulta->fetch(PDO::FETCH_ASSOC);
            $nombre = $alumnos['nombre'];
            $apellidos = $alumnos['apellido'];
            //echo $alumnos['id'];

            $sql = "SELECT cursos.id FROM alumnos_cursos
            INNER JOIN cursos ON cursos.id=alumnos_cursos.idcurso
            WHERE alumnos_cursos.idalumno=:idalumno";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':idalumno', $id);
            $consulta->execute();
            $cursosAlumnos = $consulta->fetchAll(PDO::FETCH_ASSOC);
            // print_r($cursosAlumnos);

            foreach ($cursosAlumnos as $curso) {
                $arregloCursos[] = $curso['id'];
            }

            break;
    }
}


$sql = "SELECT * FROM alumnos";
$listaAlumnos = $conexionBD->query($sql);
$alumnos = $listaAlumnos->fetchall();

foreach ($alumnos as $clave => $alumno) {
    $sql = "SELECT * FROM cursos WHERE id IN(SELECT idcurso FROM alumnos_cursos WHERE idalumno=:idalumno)";
    $consulta = $conexionBD->prepare($sql);
    $consulta->bindParam(':idalumno', $alumno['id']);
    $consulta->execute();
    $cursosAlumno = $consulta->fetchAll();
    $alumnos[$clave]['cursos'] = $cursosAlumno;
}
//print_r($alumnos);


$sql = "SELECT * FROM cursos";
$listaCursos = $conexionBD->query($sql);
$cursos = $listaCursos->fetchAll();

//print_r($cursos);
