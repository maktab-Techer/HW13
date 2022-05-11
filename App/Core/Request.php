<?php
namespace App\Core ;
class Request {
    public function getPath()
    {
        $path=$_SERVER["REQUEST_URI"];
        $index=strpos($path,"?");
        return ($index==false) ?
         $path :
         substr($path ,0,$index);
    }
    public function getMethod()
    {
       return strtolower($_SERVER["REQUEST_METHOD"]) ;
    }

}

// var_dump($_SERVER);