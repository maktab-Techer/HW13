<?php
namespace App\Core;
class Application{
    protected Router $router;
    protected Request $request;
    protected  function __construct()
    {
        $this->Router=new Router($this->request);
        $this->request=new Request;
    }
   
    /**
     * run all Application
     */
    public function run()
    {
        $this->router->startRouter();
    }


    
}