<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="main">
        <h1 class="center">Nuevo</h1>
    </div>
    <div class="center"><?php echo $this->mensaje; ?></div>
    <div class="container">
        <form action="<?php echo constant('URL'); ?>nuevo/insertar" method="POST">
            <div class="form-group row">
                <label for="producto_tipo_id" class="col-sm-1 col-form-label">Código: </label>
                <div class="col-sm-2">
                    <input type="number" class="form-control form-control-sm" name="producto_tipo_id" id="producto_tipo_id">
                </div>
            </div>
            <div class="form-group row">
                <label for="producto_tipo_nombre" class="col-sm-1 col-form-label">Descripción: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-sm" name="producto_tipo_nombre" id="producto_tipo_nombre">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Grabar</button>
        </form>
    </div>
    <?php require 'views/footer.php' ?>
</body>
</html>