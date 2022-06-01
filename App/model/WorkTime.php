<?php
namespace App\model;

use Core\Model;
use Core\Validation;

class WorkTime extends Model{
    protected function getTable():string    
    {
        return "dates";
    }
    public function getRules(): array
    {
    return [];
}
}