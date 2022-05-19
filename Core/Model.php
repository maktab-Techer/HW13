<?php

namespace App\Core;

use Core\DB\Connection\MySqlConnection;

abstract class Model{

    protected $statement;
    protected $conn;
    protected $table;

    public function __construct()
    {
        $this->conn=$db = new Database(MySqlConnection::getInstance()->getConnection());
        $this->table = $this->getTable();
    }
    public static function GETCLASS(){
        return new static;
    }
    abstract protected function getTable(): string;

    public function find(string $value, string $col = 'id')
    {
       
    }
    public function all()
    {
        
    }
    public function create(array $data)
    {
        $this->db->insert($data)->into($this->table);
    }
    public function delete($id){
        
    }
    public function where($oprand1, $oprand2, $operation = '=') : #self
    {
        
    }
  
    public function get() // return all the filtered  records by where method
    {
        
    } 
    public function update(array $data, string $val1, string $val2, string $operation = '='){

       
    }
   
}