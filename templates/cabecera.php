<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location:../index.php');
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>App web</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="../libreria/lucide-lab--basketball.png" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="index.php" aria-current="page">Inicio <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="vista_alumnos.php">Alumnos <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="vista_cursos.php">Cursos</a>
            <a class="nav-item nav-link" href="../secciones/cerrar.php">Cerrar sesion</a>
        </div>
    </nav>
    <div class="container">