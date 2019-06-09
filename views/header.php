<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootsrap -->
	<link rel="stylesheet" href="<?php echo constant('URL') ?>public/bootstrap/css/bootstrap.min.css">
    <!--Fontawesome -->
	<link rel="stylesheet" href="<?php echo constant('URL') ?>public/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/bootstrap/css/toastr.min.css">
    <script src="<?php echo constant('URL') ?>public/bootstrap/js/jquery-3.4.0.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/bootstrap/js/toastr.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/main.js"></script>
    <title>Principal</title>
</head>
<body>
    <div id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo constant('URL') ?>main">
                <img src="<?php echo constant('URL') ?>/public/img/home.png" width="50" height="50" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo constant('URL') ?>/public/img/seguridad.png" width="30" height="30" class="d-inline-block align-top" alt="">
                        Seguridad
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo constant('URL') ?>rol">Roles</a>
                        <a class="dropdown-item" href="<?php echo constant('URL') ?>usuario">Usuarios</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- <ul>
            <li><a href="<?php echo constant('URL') ?>main">Inicio</a></li>
            <li><a href="<?php echo constant('URL') ?>nuevo">Nuevo</a></li>
            <li><a href="<?php echo constant('URL') ?>consulta">Consulta</a></li>
            <li><a href="<?php echo constant('URL') ?>ayuda">Ayuda</a></li>
            <li>Seguridad
                <ul>
                    <li><a href="<?php echo constant('URL') ?>rol">Roles</a></li>
                    <li><a href="<?php echo constant('URL') ?>usuario">Usuarios</a></li>
                </ul>
            </li>
        </ul> -->
    </div>
</body>
</html>