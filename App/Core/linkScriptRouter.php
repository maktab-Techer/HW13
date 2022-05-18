<?php

namespace App\Core;


use App\Core\Application;
use App\Core\Request;

class linkScriptRouter{
    private static $class;
    private Request $request;
    private array $linkScrip ;
    private function __construct()
    {
       
        $this->request=Application::GETCLASS()->GETPROPERTY('request');
       $this->linkScrip=[];
    }

    public static function GETCLASS()
    {
        if(!isset(linkScriptRouter::$request)){
            self::$class= new linkScriptRouter;
        }
        return self::$class;
    }
    public  function link() 
    {   
        $path=$this->request->getPath();
        $linkScrip=$this->linkScrip;
       
        return 
         (in_array($path,$linkScrip['link'])) ?
         $linkScrip['link'][$path] :
         $this->linkScrip['link']['defalt'] ??false ;
    }
    public  function script() 
    {
        $path=$this->request->getPath();
        $linkScrip=$this->linkScrip;
    
        return
         (in_array($path,$linkScrip['script'])) ? 
         $linkScrip['script'][$path] :
          $this->linkScrip['script']['defalt'] ?? false;
    }
    public function addLink(string $path, string $link, bool $defalt=false)
    {   
        $linkScrip=& $this->linkScrip;
        ($defalt)? 
        $linkScrip['link']['defalt']=$link :
        $linkScrip['link'][$path]=$link
       ;
       return $this;
    }
    public function addScript(string $path, string $link,bool $defalt=false)
    {
        $linkScrip=& $this->linkScrip;

        ($defalt)? 
       $linkScrip['script']['defalt']=$link :
       $linkScrip['script'][$path]=$link;
       return $this;

    }
}