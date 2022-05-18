<?php

namespace App\Core;

use App\Core\DB\MySqlDatabase;

abstract class Model{

    protected $statement;
    protected $conn;
    protected $table;

    public function __construct()
    {
      
    }
    public static function do(){
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