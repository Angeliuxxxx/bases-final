<?php
class Controller{
    public function __construct(){
        $this->views = new views();
        $this->cargarModel();
    }
    public function cargarModel(){

        $model = get_class($this)."Model";
        $ruta = "models/".$model.".php";
        if (file_exists($ruta)){
            require_once $ruta;
            $this->model = new $model();
        }
    }   
}

?>