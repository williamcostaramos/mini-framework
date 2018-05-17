<?php

/**
 * Description of galeriaController
 *
 * @author William Ramos
 */
class galeriaController extends Controller {

    public function index() {

        $dados=array("fotos" => "01.jpg");
       $this->loadTemplate('galeria',$dados);
    }

    public function abrir($id) {
        echo "abrindo galeria " . $id;
    }

}
