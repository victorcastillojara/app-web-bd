<?php include('../templates/cabecera.php'); ?>
<?php include('../secciones/alumnos.php'); ?>

<div class="col-12">
    <br>
    <div class="row">
        <div class="col-md-5">
            <form action="" method="post">
                <div class="card">
                    <div class="card-header">Alumnos</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">ID</label>
                            <input
                                type="text"
                                class="form-control"
                                name="id"
                                id="id"
                                value="<?php echo $id; ?>"
                                aria-describedby="helpId"
                                placeholder="ID" />

                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input
                                type="text"
                                class="form-control"
                                name="nombre"
                                id="nombre"
                                value="<?php echo $nombre; ?>"
                                aria-describedby="helpId"
                                placeholder="nombre" />
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input
                                type="text"
                                class="form-control"
                                name="apellidos"
                                id="apellidos"
                                value="<?php echo $apellidos; ?>"
                                aria-describedby="helpId"
                                placeholder="apellidos" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Cursos del alumno</label>
                            <select
                                multiple
                                class="form-select form-select-lg"
                                name="cursos[]"
                                id="listaCursos">
                                <option disabled>Selecciona una opcion</option>
                                <?php foreach ($cursos as  $curso) { ?>
                                    <option
                                        <?php
                                        if (!empty($arregloCursos)):
                                            if (in_array($curso['id'], $arregloCursos)):
                                                echo "selected";
                                            endif;

                                        endif;
                                        ?>
                                        value=<?php echo $curso['id'];  ?>>
                                        <?php echo $curso['id']; ?> - <?php echo $curso['nombre_curso']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="btn-group" role="group" aria-label="Button group name">
                            <button
                                type="submit"
                                class="btn btn-success"
                                value="agregar"
                                name="accion">
                                Agregar
                            </button>
                            <button
                                type="submit"
                                class="btn btn-warning"
                                value="editar"
                                name="accion">
                                Editar
                            </button>
                            <button
                                type="submit"
                                class="btn btn-danger"
                                value="borrar"
                                name="accion">
                                Borrar
                            </button>
                        </div>



                    </div>
                </div>


            </form>
        </div>
        <div class="col-md-7">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alumnos as $alumno) { ?>
                            <tr>
                                <td><?php echo $alumno['id'] ?></td>
                                <td>
                                    <?php echo $alumno['nombre'] . ' ' . $alumno['apellido'] ?><br>
                                    <?php //print_r($alumno['cursos']); 

                                    foreach ($alumno['cursos'] as $curso) { ?>
                                        - <a href="certificado.php?idcurso=<?php echo $curso['id'] ?>&idalumno=<?php echo $alumno['id'] ?>"> <?php echo $curso['nombre_curso']; ?></a> <br>
                                    <?php } ?>


                                </td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="id" id="id" value="<?php echo $alumno['id']; ?>">
                                        <input type="submit" class="btn btn-info" name="accion" value="seleccionar">
                                    </form>

                                </td>
                            </tr>
                        <?php    }    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

<script>
    new TomSelect('#listaCursos');
</script>
<?php include('../templates/pie.php'); ?>