<?php
namespace Core ;
class Request {
    public function getPath()
    {
        $path=$_SERVER["REQUEST_URI"];
        $index=strpos($path,"?");
        return ($index==false) ?
         $path :
         substr($path ,0,$index);
    }
    public function getMethod(): string
    {   
        $method=strtolower($_SERVER["REQUEST_METHOD"]);
        if($method==="get")
        {
            return $method;
        }
        if(isset($_POST["_method"]) && $_POST["_method"]=="put")
        {
            return "put";
        }elseif(isset($_POST["_method"]) && $_POST["_method"]=="delete"){
            return "delete";

        }
        return $method;
        
    }

}

// var_dump($_SERVER);