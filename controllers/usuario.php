<?php
// error_reporting(0);
require_once 'models/estadomodel.php';
class Usuario extends Controller
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
        $this->view->render('usuario/index');
    }

    function listar() {
        $usuarios = $this->model->get();
        $this->view->datos = $usuarios;
        $this->view->render('usuario/lista');
    }


    function agregar() {
        $usuario_id = $_POST['usuario_id'];
        $usuario_documento_identidad = $_POST['documento'];
        $usuario_nombre = strtolower($_POST['nombre']);
        $usuario_apellido = strtolower($_POST['apellido']);
        $usuario_email = strtolower($_POST['email']);
        $usuario_usuario = strtolower($_POST['usuario']);
        $usuario_password = sha1(md5($_POST['contrasenna']));
        $usuario_direccion = strtolower($_POST['direccion']);
        $usuario_telefono = $_POST['telefono'];
        $estado_id = $_POST['estado'];
        $submit = $_POST['submit'];
        if(isset($submit)) {
            if($this->model->insert([
                'usuario_id'                  => $usuario_id,
                'usuario_documento_identidad' => $usuario_documento_identidad,
                'usuario_nombre'              => $usuario_nombre,
                'usuario_apellido'            => $usuario_apellido,
                'usuario_email'               => $usuario_email,
                'usuario_usuario'             => $usuario_usuario,
                'usuario_password'            => $usuario_password,
                'usuario_direccion'           => $usuario_direccion,
                'usuario_telefono'            => $usuario_telefono,
                'estado_id'                   => $estado_id
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