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

    <title>Roles</title>
    
</head>
<body onload="mostrarMensaje('<?php echo $this->mensaje; ?>' , '<?php echo $this->tipo_mensaje; ?>')">
    <?php require 'views/header.php'; ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-plus-circle"></i> <strong> <?php echo $this->op == 3 ? 'Editar Rol' : 'Agregar Nuevo Rol' ?></strong> <a href="<?php echo constant('URL') ?>rol/listar" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Buscar Roles</a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Los campos con <span class="text-danger">*</span> son obligatorios</h5>
            
                <form action="<?php echo $this->op == 3 ?  constant('URL').'rol/editar/'.$this->rol['rol_id'] : constant('URL').'rol/agregar'; ?>" method="post">
                    <div class="form-group row">
                        <label for="rol_id" class="col-sm-2 col-form-label">Código: <span class="text-danger">*</span></label>
                        <input type="text" name="rol_id" id="rol_id" class="form-control col-sm-6" placeholder="0"
                        value="<?php echo $this->op == 3 ? $this->rol['rol_id'] : $this->id; ?>" required readonly>
                    </div>
                    
                    <div class="form-group row">
                        <label for="rol_descripcion" class="col-sm-2 col-form-label">Descripción: <span class="text-danger">*</span></label>
                        <input type="text" name="rol_descripcion" id="rol_descripcion" class="form-control col-sm-6" placeholder="Introduzca descripción"
                        value="<?php echo $this->op == 3 ? $this->rol['rol_descripcion'] : ''; ?>" required>
                    </div>
                   
                    <div class="form-group row">
                        <label for="estado" class="col-sm-2 col-form-label">Estado: </label>
                        <select class="form-control col-sm-2" name="estado" id="estado">
                            <?php 
                                foreach ($this->datos_estado as $estado) {
                            ?>
                                <option value="<?php echo $estado->estado_id ?>"
                                 <?php echo $this->op == 3 && $this->rol['estado_id'] == $estado->estado_id ? 'selected' : '' ?>>
                                    <?php echo ucfirst($estado->estado_descripcion) ?>
                                </option>
                            <?php
                                } 
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button name="submit" id="submit" value="submit" class="btn btn-primary col-sm-2"><i class="fa fa-fw fa-check"></i>
                            Grabar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>