<?php
   require_once "config/app/config.php";
   $ruta = !empty($_GET[ 'url' ]) ? $_GET[ 'url' ] : "Home/index";
   $array = explode("/", $ruta);
   $controller = $array[0];
   $metodo = "index";
   $parametro = "";
   if(!empty($array[1])){
        if (!empty($array[1] != "")){
            $metodo = $array[1];
        }
    }   
    if (!empty($array[2])){
        if (!empty($array[2] != "")){
            for ($i=2; $i < count($array); $i++) {
                $parametro .= $array[$i]. ","; 
               
            }
            $parametro = trim($parametro, ",");
        }
    }
    require_once "config/app/autoload.php";
    $dirControllers = "controllers/".$controller.".php";
    if (file_exists($dirControllers)) {
        require_once $dirControllers;
        $controller = new $controller();
        if(method_exists($controller,$metodo)){
            $controller->$metodo($parametro);
        }else{
            echo "NO EXISTE EL METODO";
        }
    }else{
        echo "NO EXISTE EL CONTROLADOR";
    }
?>