<?php

/**
 * <b>Insert</b>
 * Classe responsavel por realizar cadastro genericos no banco de dados.
 *
 * @copyright (c) 2018, William Ramos
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

    /**
     * Metodo responsavel por realizar o cadastro
     * Informe uma tabela e um Array de dados Associativo  (nome da coluna => dado a ser Inserido).
     * @param type $tabela
     * @param array $dados
     */
    public function insert($tabela, array $dados) {

        $this->tabela = (string) $tabela;
        $this->dados = $dados;
        $this->getSintax();
    }

    /**
     * <b>getResult</b>
     * Metodo responsavel por retornar o ultimo resultado inserido no banco.
     * 
     */
    public function getResult() {
        return $this->result;
    }

    /**
     * <b>connect</b>
     * Metodo por realizar a conexao com o banco de dados.
     */
    private function connect() {
        $this->con = Connection::getConnection();
        $this->create = $this->con->prepare($this->create);
    }

    /**
     * <b>getSintax</b>
     * Metodo responsavel por montar a query de Inserção no banco de Dados.
     */
    private function getSintax() {
        $colunas = implode(', ', array_keys($this->dados));
        $valores = ':' . implode(', :', array_keys($this->dados));
        $this->create = "INSERT INTO {$this->tabela} ({$colunas}) VALUES ({$valores})";
    }

    /**
     * <b>execute</b>
     * Metodo responsavel por executar a query no banco de dados.
     */
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
