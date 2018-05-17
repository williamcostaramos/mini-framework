<?php

/**
 * Classe <b>Core</b>:
 *  Responsavel por mapear as URL do 
 * sistema e direcionar para a classe especifica.
 *
 * @author William Ramos
 */
class Core {

    private $controller;
    private $action;
    private $parametros;

    public function run() {

        $this->parametros = array();
        $url = "/";

        if (filter_input(INPUT_GET, 'url', FILTER_DEFAULT) != null):
            $url .= filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            if (!empty($url) && $url != '/'):
                $url = explode("/", $url);

                array_shift($url);

                $this->controller = $url[0] . "Controller";
                array_shift($url);


                if (isset($url[0]) && !empty($url[0])):
                    $this->action = $url[0];
                    array_shift($url);
                else:
                    $this->action = 'index';
                endif;

                if (count($url) > 0):
                    $this->parametros = $url;
                endif;


            endif;
        else:
            $this->controller = 'homeController';
            $this->action = "index";

        endif;
        $classe = new $this->controller();
        call_user_func_array(array($classe, $this->action), $this->parametros);
    }

}
