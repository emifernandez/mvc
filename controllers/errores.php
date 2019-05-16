<?php 
class Errores extends Controller
{
    function __construct() {
        parent::__construct();
        $this->view->mensaje = "Mensaje de error personalizado";
        $this->view->render('errores/index');
        
    }
}
?>