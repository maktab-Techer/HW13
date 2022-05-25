<?php

namespace Core\DB;

use Opis\Database\Connection;
class MySqlConnection implements ConnectionInterface
{
    private static $instance = null;
    private $host ;
    private $name ;
    private $user ;
    private $pass ;

    private Connection $conn;

    private function __construct()
    {      
        $this->host=$_ENV["HOST_DB"];
        $this->name = $_ENV["NAME_DB"];
        $this->user = $_ENV["USER_DB"];
        $this->pass = $_ENV["PASSWORD_DB"];
        
        $dsn="mysql:host={$this->host};dbname={$this->name}" ;
        $this->conn = new Connection($dsn,$this->user,$this->pass);
        $this->conn->options(
                   [
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ]
                   );
      
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}