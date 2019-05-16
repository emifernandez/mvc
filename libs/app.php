<?php 
require_once 'controllers/errores.php';
class App {
    function __construct(){

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = explode('/',rtrim($url, '/'));

        //Cuando se ingresa sin definir controlador
        if (empty($url[0])) {
            $archivoController = 'controllers/Login.php';
            require_once $archivoController;
            $controller = new Login();
            $controller->loadModel('login');
            $controller->render();
            return false;
        }
        
        $archivoController = 'controllers/' . $url[0] . '.php';
        //Cuando se ingresa con contralador definido
        if (file_exists($archivoController)) {
            require_once $archivoController;
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            //Se verifican la cantidad de parametros definidos
            $nparam = sizeof($url);
            if ($nparam > 2) {
                $param = [];
                for ($i=2; $i < $nparam; $i++) {
                    array_push($param, $url[$i]);
                }
                $controller->{$url[1]}($param);
            } else {
                //Si se ingresa tambien un metodo que se requiere cargar
                if (isset($url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $controller->render();
                }
            }
        } else {
            $controller = new Errores();
        }
        
    }
}
?>