<?php 
namespace App\model;

use Core\Model;
use Core\Validation;
use Opis\Database\SQL\Select;

class Doctor extends Model{

    protected function getTable():string
    {
        return "Doctor";
    }
    public function getRules(): array   
    {
        return [
            'email' => [Validation::required, Validation::email],
            'password' => [Validation::required],
        ];
    }

    
}