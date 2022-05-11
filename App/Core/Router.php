<?php
namespace App\Core;
/**
 * This class is router
 */
class Router {
    public array $paths=[];
    public Request $request;

    public function __construct(Request  $request)
    {
        $this->request=$request;
    }
    /**
     * save my GET path whit a callback function
     */
    public function get(string $path , $callback)
    {
        $this->paths['get'][$path]=$callback;
        return $this;
        
    }
     /**
     * save my POST path whit a callback function
     */
    public function post(string $path , mixed  $callback)
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
       
        $callback=$this->paths[$method][$path] ?? false; 
        // var_dump($callback);
        if($callback==false){
            http_response_code(404);
            
            $callback=['App\Controller\Control',"_404"];
        }
        // var_dump($callback);

        
       
        call_user_func($callback);

    }
}