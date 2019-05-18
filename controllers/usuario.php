<?php
error_reporting(0);
class Usuario extends Controller
{
    function __construct() {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render() {
        $this->view->render('usuario/index');
    }

    function agregar() {
        $usuario     = $_POST['usuario'];
        $contrasenna = sha1(md5($_POST['contrasenna']));
        $documento = $_POST['documento'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $estado = $_POST['estado'];
        $submit = $_POST['submit'];
        if(isset($submit)) {
            if($this->model->insert([
                'usuario' => $usuario,
                'contrasenna' => $contrasenna,
                'documento' => $documento,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'email' => $email,
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
}
?>