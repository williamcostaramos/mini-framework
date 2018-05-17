<?php


/**
 * Description of Aluno
 *
 * @author William Ramos
 */
class Aluno{
    
    private $con;
    public function __construct() {
        $this->con= Connection::getConnection();
        
    }

    public function cadastrar($nome, $matricula) {
        $sql= "INSERT INTO aluno(nome,matricula)VALUES(:nome,:matricula)";
        
        $stm= $this->con->prepare($sql);
        $stm->bindValue(":nome", $nome);
        $stm->bindValue(":matricula", $matricula);
        $stm->execute();
        
        
        
    }
}
