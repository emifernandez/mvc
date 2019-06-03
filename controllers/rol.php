<?php
// error_reporting(0);
require_once 'models/estadomodel.php';
class Rol extends Controller
{
    function __construct() {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->op = 0;
    }

    function render() {
        $estado_model = new EstadoModel();
        $estados = $estado_model->get();
        $this->view->datos_estado = $estados;
        $this->view->render('rol/index');
    }

    function listar() {
        $roles = $this->model->get();
        $this->view->datos = $roles;
        $this->view->render('rol/lista');
    }


    function agregar() {
        $rol_descripcion = strtolower($_POST['rol_descripcion']);
        $estado = $_POST['estado'];
        $submit = $_POST['submit'];
        if(isset($submit)) {
            if($this->model->insert([
                'rol_descripcion' => $rol_descripcion,
                'estado' => $estado
                 ])) {
                $mensaje = "Datos grabados correctamente";
                $tipo_mensaje = "success";
            } else {
                $mensaje = "No se pudieron grabar los datos";
                $tipo_mensaje = "error";
            }
            $this->view->mensaje = $mensaje;
            $this->view->tipo_mensaje = $tipo_mensaje;
            
        }
        $this->render();
    }

    function editar($id) {
        $this->view->op = 3;
        $this->view->rol = $this->model->getById($id[0]);
        $this->render();
        if(isset($_POST['submit'])) {
            $rol_descripcion = strtolower($_POST['rol_descripcion']);
            $estado = $_POST['estado'];
            if($this->model->update([
                'rol_id' => $id[0],
                'rol_descripcion' => $rol_descripcion,
                'estado' => $estado
                 ])) {
                $mensaje = "Datos grabados correctamente";
                $tipo_mensaje = "success";
                $this->listar();
            } else {
                $mensaje = "No se pudieron grabar los datos";
                $tipo_mensaje = "error";
                $this->view->mensaje = $mensaje;
                $this->view->tipo_mensaje = $tipo_mensaje;
                $this->render();
            }
             
        }
        
    }
}
?>