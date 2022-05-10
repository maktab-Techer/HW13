<?php
namespace App\Core;
/**
 * This class is router
 */
class Router {
    private array $paths=[];
    protected Request $request;

    public function __construct(Request  $request)
    {
        $this->request=$request;
    }
    /**
     * save my GET path whit a callback function
     */
    public function get($path ,$callback)
    {
        $this->paths['get'][$path]=$callback;
        
    }
     /**
     * save my POST path whit a callback function
     */
    public function post($path ,$callback)
    {
        $this->paths['post'][$path]=$callback;
    }
    /**
     * router
     * This function if our path dont exsist in defult path give us error 404
     *  and if the path do exsist , call callback function from controller 
     */
    public function startRouter()
    {
        $path=$this->request->getPath();
        $method=$this->request->getMethod();
        $paths=$this->paths;
        $callback=$paths[$method][$path] ?? false; 
        if($paths[$method]==false){
            echo "not fuond 404";
        }
        
        call_user_func($callback);

    }
}