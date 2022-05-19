<?php

namespace Core\DB\Connection;

use Opis\Database\Connection;
class MySqlConnection implements ConnectionInterface
{
    private static $instance = null;
    private $host = $_ENV["HOST_DB"];
    private $name = $_ENV["NAME_DB"];
    private $user = $_ENV["USER_DB"];
    private $pass = $_ENV["PASSWORD_DB"];

    private Connection $conn;

    private function __construct()
    {   
        $dsn="mysql:host={$this->host};dbname={$this->name}" ;
        $this->conn = new Connection($dsn,$this->user,$this->pass);
        $this->conn->options(
                   [
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ]
        )
      
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