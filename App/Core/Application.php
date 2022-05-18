<?php
namespace App\Core;

class Application{
    




    private Router $router;
    private Request $request;
    public  function __construct()
    {
        $this->request=new Request;
        $this->router=new Router($this->request);
    }
    public static function GETCLASS()
    {
        return new self ;
    }
    public function GETPROPERTY(string $property)
    {   
        
        return (property_exists($this,$property)) ? 
        $this->$property : false;
    }

    public function get(string $path , $callback)
    {
        // var_dump($this);
        $this->router->get($path ,$callback);
    }
    public function post(string $path , $callback)
    {
        $this->router->post($path ,$callback);
    }
    /**
     * run all Application
     */
    public function run()
    {
        $this->router->startRouter();
    }


    
	
}