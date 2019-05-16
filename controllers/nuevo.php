<?php 
class Nuevo extends Controller
{
    function __construct() {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render() {
        $this->view->render('nuevo/index');
    }

    function insertar() {
        $producto_tipo_id     = $_POST['producto_tipo_id'];
        $producto_tipo_nombre = $_POST['producto_tipo_nombre'];
        if(isset($producto_tipo_id) && isset($producto_tipo_nombre)) {
            if($this->model->insert([
                'producto_tipo_id' => $producto_tipo_id,
                'producto_tipo_nombre' => $producto_tipo_nombre ])) {
                $mensaje = "Datos grabados correctamente";
            } else {
                $mensaje = "No se pudieron grabar los datos";
            }
            $this->view->mensaje = $mensaje;
            
        }
        $this->render();
    }
}
?>