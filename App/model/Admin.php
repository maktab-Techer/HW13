<?php
namespace App\model;

use Core\Model;
use Core\Validation;

class Admin extends Model{
protected function getTable(): string
{
    return "admin";

}
public function getRules(): array
{
    return [
        'email' => [Validation::required, Validation::email],
        'password' => [Validation::required],
    ];
}
}