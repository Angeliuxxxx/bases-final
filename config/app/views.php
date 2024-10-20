<?php
    class views{

        public function getView($controador, $vista){
            $controador = get_class($controador);
            if ($controador == "Home"){
                $vista = "views/".$vista.".php";
            }else{
                $vista = "views/".$controador."/".$vista.".php";
            }
            require_once $vista;
        }
    }

?>