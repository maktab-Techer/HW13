<?php
namespace Core;
class Application{
    public $storage;
    public string $rootPath;
    private static $class;
    protected Router $router;
    protected Request $request;
    protected Response $response;
    public  function __construct()
    {   $this->storage=dirname(__DIR__)."/Storage/";
       $this->rootPath=dirname(__DIR__);
        self::$class=$this;
        $this->request=new Request;
        $this->router=new Router($this->request);
        $this->response= new Response();
    }

    public function get(string $path , $callback)
    {
       
        $this->router->get($path ,$callback);
    }
    public function post(string $path , $callback)
    {
        $this->router->post($path ,$callback);
    }
    public function put(string $path , $callback)
    {
        $this->router->put($path ,$callback);
    } 
    public function delete(string $path , $callback)
    {
        $this->router->delete($path ,$callback);
    }
    /**
     * run all Application
     */
    public function run()
    {
        $this->router->startRouter();
    }

    
    public static function GETCLASS()
    {   
    
        return self::$class ;
    }
    public function GETPROPERTY(string $property) : mixed
    {
        return (property_exists($this,$property))? $this->$property : false;
    }
    
	
}