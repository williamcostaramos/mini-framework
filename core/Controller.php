<?php

/**
 * <b>Controller</b>
 * Classe responsavel por auxiliar os controlers na
 *
 * @author William Ramos
 */
class Controller {

    public function loadView($viewFile, $viewData = array()) {
        extract($viewData);
        require_once 'views/' . $viewFile . '.php';
    }
    public function loadTemplate($viewFile, $viewData = array()) {
        
        require_once 'views/template.php';
        
    }
    public function loadViewInTemplate($viewFile, $viewData = array()) {
        extract($viewData);
        require_once 'views/' . $viewFile . '.php';
        
    }

}
