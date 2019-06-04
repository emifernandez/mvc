<?php
error_reporting(0);
class Login extends Controller
{
    function __construct() {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->tipo_mensaje = "";
    }

    function render() {
        $this->view->render('login/index');
    }

    function ingresar () {
        $usuario = $_POST['usuario'];
        $password = sha1(md5($_POST['password']));
        $mensaje = "";

        if(!empty($usuario) && !empty($password)) {
            if($this->model->ingresar([
                'usuario' => $usuario,
                'password' => $password ])) {
                $this->view->render('main/index');
            } else {
                $this->view->mensaje = "Credenciales incorrectas";
                $this->view->tipo_mensaje = "warning";
                $this->render();
            }
        } else {
            $this->view->mensaje = "Introduzca credenciales";
            $this->view->tipo_mensaje = "warning";
            $this->render();
        }
        

    }
}
?>