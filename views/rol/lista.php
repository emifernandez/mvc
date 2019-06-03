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
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/datatables/datatables.min.css">
    <script src="<?php echo constant('URL') ?>public/bootstrap/js/jquery-3.4.0.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/datatables/datatables.min.js"></script>
    <script src="<?php echo constant('URL') ?>public/bootstrap/js/toastr.min.js"></script>

    <script src="<?php echo constant('URL') ?>public/js/main.js"></script>

    <script>
        $(document).ready(function() {
            $('#datos').DataTable();
        } );
    </script>

    <title>Roles</title>
</head>
<body onload="mostrarMensaje('<?php echo $this->mensaje; ?>', '<?php echo $this->tipo_mensaje; ?>')">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-fw fa-globe"></i> <strong> Buscar Roles</strong> <a href="<?php echo constant('URL') ?>rol" class="float-right btn btn-dark btn-sm"><i class="fas fa-plus-circle"></i> Agregar Nuevo Rol</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="datos" style="width:100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($this->datos as $rol) {
                            ?>
                            <tr>
                                <td><?php echo $rol['rol_id']; ?></td>
                                <td><?php echo ucfirst($rol['rol_descripcion']); ?></td>
                                <td><?php echo ucfirst($rol['estado_descripcion']); ?></td>
                                <td>
                                    <a href="<?php echo constant('URL') ?>rol/editar/<?php echo $rol['rol_id']; ?>"><i class="fa fa-edit"></i>Editar</a> | 
                                    <a class="text-danger" href="<?php echo constant('URL') ?>rol/eliminar/<?php echo $rol['rol_id']; ?>"><i class="fas fa-trash"></i>Eliminar</a> </td>
                            </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>