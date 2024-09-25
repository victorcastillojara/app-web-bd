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
                                <option >Selecciona una opcion</option>
                                <option value="Curso 1">Curso 1</option>
                                <option value="Curso 2">Curso 2</option>
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
        <div class="col-7">
            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alumnos as $alumno) {?>
                        <tr >
                            <td><?php echo $alumno['id'] ?></td>
                            <td><?php echo $alumno['nombre'].' '.$alumno['apellido']?></td>
                            <td></td>
                        </tr>
                        <?php    }    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('../templates/pie.php'); ?>