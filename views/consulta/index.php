<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Consulta</title>
</head>
<body>
    <?php require 'views/header.php'; ?>

    <div id="main">
        <h1 class="center">Consulta</h1>
        <div id="respuesta" class="center"></div>
        <table width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody id="tbody-producto-tipo">
                <?php 
                foreach ($this->datos as $producto_tipo) {
                ?>
                <tr id="fila-<?php echo $producto_tipo->producto_tipo_id; ?>">
                    <td><?php echo $producto_tipo->producto_tipo_id; ?></td>
                    <td align="center"><?php echo $producto_tipo->producto_tipo_nombre; ?></td>
                    <td>
                        <a href="<?php echo constant('URL') . 'consulta/ver/' . $producto_tipo->producto_tipo_id ?>">Editar</a>
                        <button class="btnEliminar" data-id="<?php echo $producto_tipo->producto_tipo_id; ?>">Eliminar</button>
                        <!-- <a href="<?php echo constant('URL') . 'consulta/eliminar/' . $producto_tipo->producto_tipo_id ?>">Eliminar</a> -->
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    
    <?php require 'views/footer.php' ?>
    <script src="<?php echo constant('URL') . 'public/js/main.js' ?>"></script>
</body>
</html>