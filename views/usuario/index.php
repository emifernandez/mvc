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
    <script src="<?php echo constant('URL') ?>public/bootstrap/js/toastr.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/js/main.js"></script>

    <title>Usuario</title>
    
</head>
<body onload="mostrarMensaje('<?php echo $this->mensaje; ?>', '<?php echo $this->tipo_mensaje; ?>')">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-plus-circle"></i> <strong> Agregar Usuario</strong> <a href="#" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Buscar Usuario</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Los campos con <span class="text-danger">*</span> son obligatorios</h5>
            
                <form action="<?php echo constant('URL') ?>usuario/agregar" method="post">
                    <div class="form-group row">
                        <label for="usuario" class="col-sm-2 col-form-label">Usuario: <span class="text-danger">*</span></label>
                        <input type="text" name="usuario" id="usuario" class="form-control col-sm-3" placeholder="Introduzca usuario" required>
                    </div>
                    <div class="form-group row">
                        <label for="contrasenna" class="col-sm-2 col-form-label">Contraseña: <span class="text-danger">*</span></label>
                        <input type="password" name="contrasenna" id="contrasenna" class="form-control col-sm-3" placeholder="Introduzca contraseña" required>
                    </div>
                    <div class="form-group row">
                        <label for="documento" class="col-sm-2 col-form-label">Doc. Identidad: <span class="text-danger">*</span></label>
                        <input type="text" name="documento" id="documento" class="form-control col-sm-3" placeholder="Introduzca documento de identidad" required>
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombres: <span class="text-danger">*</span></label>
                        <input type="text" name="nombre" id="nombre" class="form-control col-sm-6" placeholder="Introduzca nombres" required>
                    </div>
                    <div class="form-group row">
                        <label for="apellido" class="col-sm-2 col-form-label">Apellidos: </label>
                        <input type="text" name="apellido" id="apellido" class="form-control col-sm-6" placeholder="Introduzca apellidos">
                    </div>
                    <div class="form-group row">
                        <label for="direccion" class="col-sm-2 col-form-label">Dirección: </label>
                        <input type="text" name="direccion" id="direccion" class="form-control col-sm-6" placeholder="Introduzca dirección">
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email: </label>
                        <input type="text" name="email" id="email" class="form-control col-sm-6" placeholder="Introduzca email">
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono: </label>
                        <input type="text" name="telefono" id="telefono" class="form-control col-sm-3" placeholder="Introduzca teléfono">
                        <label for="estado" class="col-sm-1 col-form-label">Estado: </label>
                        <select class="form-control col-sm-2" name="estado" id="estado">
                            <?php 
                                foreach ($this->datos_estado as $estado) {
                            ?>
                                <option value="<?php echo $estado->estado_id ?>"><?php echo ucfirst($estado->estado_descripcion) ?></option>
                            <?php
                                } 
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button name="submit" id="submit" value="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i>Agregar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>