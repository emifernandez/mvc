<?php 
class Asdf extends Controller{
    function __construct(){
        parent::__construct();
    }

    function render() {
        $this->view->render('rol/asdf');
    }
}
?>