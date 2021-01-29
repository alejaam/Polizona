<?php
include_once 'db.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Polizona</title>
</head>
<nav class="navbar navbar-expand-lg sticky-top big-container">
    <a class="navbar-brand">Alamar Martínez Javier Alejandro</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="clasificador.php">Clasificación</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="agrupador.php">Argupación</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="isan.php">Calculo de ISAN</a>
            </li>
            <li class="nav-item">
                <button class='badge badge-light' onclick="toggleTheme('dark');">Light</button>
                <button class='badge badge-dark' onclick="toggleTheme('light');">Dark Mode</button>
            </li>
        </ul>
    </div>
</nav>

<body>