<?php
class Login extends Controller
{
    function __construct() {
        parent::__construct();
        $this->view->mensaje = "";
    }

    function render() {
        $this->view->render('login/index');
    }

    function ingresar () {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $mensaje = "";

        if(!empty($usuario) && !empty($password)) {
            if($this->model->ingresar([
                'usuario' => $usuario,
                'password' => $password ])) {
                $this->view->render('main/index');
            } else {
                $this->view->mensaje = "Credenciales incorrectas";
                $this->render();
            }
        } else {
            $this->view->mensaje = "Introduzca credenciales";
            $this->render();
        }
        

    }
}
?>