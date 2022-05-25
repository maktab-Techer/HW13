<?php


namespace Core;

use Core\DB\MySqlConnection;
use Opis\Database\Database;


abstract class Model{

    protected $statement;
    protected $conn;
    protected $table;
    abstract protected function getTable(): string;
    abstract   public function getRules(): array;

    public function __construct()
    {
        $this->conn=$db = new Database(MySqlConnection::getInstance()->getConnection());
        $this->table = $this->getTable();
    }
    public static function GETCLASS(){
        return new static;
    }

    public function find(string $value, string $col = 'id')
    {
        return   $this->conn->from($this->table)->where($col)->is($value)->select()->all();
    }
    public function all()
    {
       return $this->conn->from($this->table)->select()->all();
    }
    public function create(array $data)
    {
        $this->conn->insert($data)->into($this->table);
    }
    public function delete($id){
        $this->conn->from('users')->where('id')->is($id)->delete();
    }
    // public function where($oprand1, $oprand2, $operation = '=') : #self
    // {
        
    // }
  
    // public function get() // return all the filtered  records by where method
    // {
        
    // } 
    public function update(array $updateData, string $col, string $find, string $operation = '='){

       switch ($operation) {
           case '=':
            $this->conn->update($this->table)->where($col)->is($find)->set($updateData);
               break;
            case '<':
            $this->conn->update($this->table)->where($col)->lessThan($find)->set($updateData);
                break;
            case ">":
                $this->conn->update($this->table)->where($col)->greaterThan($find)->set($updateData);
                 break;
           default:
              return false;
              
       }
    }
    
   
}