<?php
namespace App\model;

use Core\Model;
use Core\Validation;

class Patient extends Model{
    protected function getTable():string    
    {
        return "patient";
    }
    public function getRules(): array
    {
    return [
        'email' => [Validation::required, Validation::email],
        'password' => [Validation::required],
    ];
}
}