<?php

/**
 * <b>Insert</b>
 * Classe responsavel por realizar cadastro genericos no banco de dados.
 *
 * @author William Ramos
 */
class Insert {

    private $tabela;
    private $dados;
    private $result;

    /** @var PDOStatement */
    private $create;

    /** @var PDO */
    private $con;

    public function __construct($tabela, array $dados) {
        $this->insert($tabela, $dados);
    }

    public function insert($tabela, array $dados) {

        $this->tabela = (string) $tabela;
        $this->dados = $dados;
        $this->getSintax();
    }
    
    public function getResult() {
        return $this->result;
        
    }

    private function connect() {
        $this->con = Connection::getConnection();
        $this->create = $this->con->prepare($this->create);
    }

    private function getSintax() {
        $colunas = implode(', ', array_keys($this->dados));
        $valores = ':' . implode(', :', array_keys($this->dados));
        $this->create = "INSERT INTO {$this->tabela} ({$colunas}) VALUES ({$valores})";
    }

    private function execute() {

        $this->connect();
        try {

            $this->create->execute($this->dados);
            $this->result = $this->con->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    

}
