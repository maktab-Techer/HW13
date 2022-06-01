<?php


namespace Core;

use Core\DB\MySqlConnection;
use Opis\Database\Database;
use Opis\Database\SQL\Select;

abstract class Model{
    // protected $wheres=[];
    // protected $selects=[];
    protected  $statement;
    protected $conn;
    protected $table;
    abstract protected function getTable(): string;
    abstract   public function getRules(): array;

    public function __construct()
    {
        $this->conn=$db = new Database(MySqlConnection::getInstance()->getConnection());
        $this->table = $this->getTable();
        // $this->statement->conn->from($this->table);
    }
    public static function GETCLASS(){
        return new static;
    }

    public function IsExist(string $value, string $col = 'email')
    {   
        return 
        (count
        (
            $this->conn->from($this->table)->where($col)->is($value)->select()->all()
        )  !=
        0
        );
         
    }
    public function find( $value, string $col = 'id')
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
        $this->conn
        ->from($this->table)
        ->where('id')->is($id)
        ->delete();
    }
   
    public function update(array $updateData, string $col, string $find, string $operation = '='){

       switch ($operation) {
           case '=':
            $this->conn
            ->update($this->table)
            ->where($col)->is($find)
            ->set($updateData);
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
    public function NameSearch(string $like): array
    {
 
      
    return   $this->conn->
        from($this->table)
             ->where('name')->is($like)
             ->orWhere("family_name")->like($like)

             ->orWhere("name")->like('%'.trim($like).'%')
             ->orWhere("family_name")->like('%'.trim($like).'%')

             ->orWhere("name")->like('%'.trim($like))
             ->orWhere("family_name")->like('%'.trim($like))

             ->orWhere("name")->like(trim($like).'%')
             ->orWhere("family_name")->like(trim($like).'%')
             
             ->select()
             ->all();
    }
    
   
	/**
	 * @return mixed
	 */
	
	/**
	 * @return mixed
	 */
	function getStatement() {
		return $this->statement;
	}
    public function join(Model $table,$thisModel,$thatModel)
    {     
        $id=[
          'thisID' => $this->table.'.'. $thisModel,
          'thatOD' =>$table->getTable().'.'.$thatModel
        ];


        return   $this->conn
        ->from($this->table)
             ->join($table->getTable(), function($join) use($id){
                $join->on($id['thisId'], $id['thatId']);
             })
        ->select()
        ->all();
    }
    public function findID($value,$col)
    {   
        $ids=[];
        foreach( $this->find($value,$col) as $row ){
            $ids[]=$row['id'];
        }
        return $ids;
    }
}