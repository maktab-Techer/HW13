<?php
namespace App\Controller;

use App\model\Doctor;
use Core\View;
class showController{
    //TODO must find where to do not be hardcode all show controller
    public function _404 ()
    {   
        $V=new View;
      
        $V->show('_404');
        
        
    }

    public function home()
    {   
        $doctor=Doctor::GETCLASS()->all();
        $path="home";
        $V=new View;
        echo"<pre>";
        var_dump($doctor);
        echo"</pre><hr>";
        $V->show($path ,compact("doctor"));
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