<?php
namespace App\Controller;
use App\Core\View;
class Control{
    public function home()
    {   
        // some how I must use login ???
        $path="home"   ;
        echo 'HELLO';
        $V=new View;
        $V->putNavbar(); 
        $V->show($path );

    }
    public function pagesSite()
    {
        
        // (new View)->show($path,$Datas)
    }
    
}