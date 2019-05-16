<?php 
class Consulta extends Controller
{
    function __construct() {
        parent::__construct();
        $this->view->datos = [];
    }

    function render() {
        $producto_tipos = $this->model->get();
        $this->view->datos = $producto_tipos;
        $this->view->render('consulta/index');
    }

    function ver($params = null) {
        $producto_tipo_id = $params[0];
        $producto_tipo = $this->model->getById($producto_tipo_id);

        // session_start();
        // $_SESSION['producto_tipo_id'] = $producto_tipo->producto_tipo_id;
        $this->view->producto_tipo = $producto_tipo;
        $this->view->mensaje = "";
        $this->view->render('consulta/detalle');
    }

    function actualizar() {
        // session_start();
        //$producto_tipo_id     = $_SESSION['producto_tipo_id'];
        $producto_tipo_id     = $_POST['producto_tipo_id'];
        $producto_tipo_nombre = $_POST['producto_tipo_nombre'];
        // unset($_SESSION['producto_tipo_id']);

        if ($this->model->update(['producto_tipo_id' => $producto_tipo_id, 'producto_tipo_nombre' => $producto_tipo_nombre])) {
            $producto_tipo = new ProductoTipo();
            $producto_tipo->producto_tipo_id = $producto_tipo_id;
            $producto_tipo->producto_tipo_nombre = $producto_tipo_nombre;
            $this->view->producto_tipo = $producto_tipo;
            $this->view->mensaje = "Datos grabados correctamente";
        } else {
            $this->view->mensaje = "No se pudieron grabar los datos";
        }
        $this->view->render('consulta/detalle');
        
    }

    function eliminar($param = null) {
        $producto_tipo_id = $param[0];
        if ($this->model->delete($producto_tipo_id)) {
            // $this->view->mensaje = "Datos eliminados correctamente";
            $mensaje = "Datos eliminados correctamente";
        } else {
            // $this->view->mensaje = "No se pudieron eliminar los datos";
            $mensaje = "No se pudieron eliminar los datos";
        }
        //$this->render();
        echo $mensaje;
    }
}
?>