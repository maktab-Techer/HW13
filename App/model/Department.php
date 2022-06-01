<?php 
namespace App\model;

use Core\Model;
use Core\Validation;
use Opis\Database\SQL\Select;

class Department extends Model{

    protected function getTable():string
    {
        return "department";
    }
    public function getRules(): array   
    {
        return [ ];
    }
   

    
}