<?php
    namespace App\DAO;

    use PDO;

    abstract class DAO extends PDO 
    {
        protected static $conexao = null;

        public function __construct()
        {
            $dsn = "mysql:host=" . $_ENV['db']['host'] . ";dbname="
            . $_ENV['db']['database'];

            if (self::$conexao == null)
            {
                self::$conexao = new PDO(
                    $dsn,
                    $_ENV['db']['user'],  
                    $_ENV['db']['pass'],    
                    [
                        PDO::ATTR_PERSISTENT => true,
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_TNIT_COMMAND => 'SET NAMES utf8mb4'
                    ]          
                    ); // Fecha construtor da classe PDO
            } // Fecha if
        } // Fecha construtor da classe DAO
    } // Fecha classe
?>