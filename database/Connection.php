<?php

/**
 * Description of Connection
 *
 * @author William Ramos
 */
class Connection {

    private static $HOST = HOST;
    private static $USER = USER;
    private static $PASS = PASS;
    private static $DBSA = DBSA;

    /**
     *
     * @var PDO
     * Armazena o objeto pdo
     */
    private static $pdo = null;

    private function __construct() {
        
    }
    
    private static function connect() {
        if (self::$pdo == null) {
            try {
                $dns='mysql:host=' . self::$HOST . ';dbname=' . self::$DBSA;
                $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
                self::$pdo = new PDO($dns, self::$USER, self::$PASS, $options);
                 self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "ERRO:".$e->getMessage();
            }
        }
        
       
        return self::$pdo;
    }
    
    public static function getConnection(){
        self::connect();
        return self::$pdo;
    }
    
    public static function closeConnection(){
        self::$pdo= null;
    }

}
