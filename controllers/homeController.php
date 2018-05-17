<?php


class homeController extends Controller {
    public function index() {
        $aluno = new Aluno();
        $aluno->cadastrar("Aline", "FC200751");
        
    }
    
    public function teste(){
        
    }
}
