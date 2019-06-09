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
        $this->view->id = $this->model->getNextId();
        $this->view->render('rol/index');
    }

    function listar() {
        $roles = $this->model->get();
        $this->view->datos = $roles;
        $this->view->render('rol/lista');
    }


    function agregar() {
        $rol_id = $_POST['rol_id'];
        $rol_descripcion = strtolower($_POST['rol_descripcion']);
        $estado = $_POST['estado'];
        $submit = $_POST['submit'];
        if(isset($submit)) {
            if($this->model->insert([
                'rol_id'            => $rol_id,
                'rol_descripcion'   => $rol_descripcion,
                'estado'            => $estado
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
        
        if(isset($_POST['submit'])) {
            $rol_descripcion = strtolower($_POST['rol_descripcion']);
            $estado = $_POST['estado'];
            if($this->model->update([
                'rol_id'          => $id[0],
                'rol_descripcion' => $rol_descripcion,
                'estado'          => $estado
                 ])) {
                $mensaje = "Datos grabados correctamente";
                $tipo_mensaje = "success";
            } else {
                $mensaje = "No se pudieron grabar los datos";
                $tipo_mensaje = "error";
            }
            $this->view->mensaje = $mensaje;
            $this->view->tipo_mensaje = $tipo_mensaje;
            $this->listar();
        } else {
            $this->render();
        }       
    }

    function eliminar($id) {
        if($this->model->delete([
            'rol_id'=> $id[0]
             ])) {
            $mensaje = "Registro eliminado correctamente";
            $tipo_mensaje = "success";
        } else {
            $mensaje = "No se pudo eliminar el registro";
            $tipo_mensaje = "error";
        }
        $this->view->mensaje = $mensaje;
        $this->view->tipo_mensaje = $tipo_mensaje;
        $this->listar();
    }
}
?>