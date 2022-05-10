<?php
namespace App\Core;
class Application{
    protected Router $router;
    protected Request $request;
    protected  function __construct()
    {
        $this->Router=new Router;
        $this->request=new Request;

    } 
}