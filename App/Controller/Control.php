<?php
namespace App\Controller;
use Core\View;
class Control{
    public function _404 ()
    {   
        $V=new View;
        $V->show('_404');
    }

    public function home()
    {   
        // some how I must use login ???
        $path="home"   ;
        // echo "hello";
        $V=new View;
        $V->putNavbar(); 
        $V->show($path );
    }
    public function Dashboard()
    {
        $V=new View;
        $V->show( 'Dashboard');
    }
    public function login()
    {
        $V=new View;
        $V->show( 'login');
    }public function register()
    {   
        $V=new View;
        $V->show( 'register');

    }

    public function pagesSite()
    {
        
        // (new View)->show($path,$Datas)
    }
    
}