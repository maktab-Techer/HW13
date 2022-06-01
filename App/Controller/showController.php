<?php
namespace App\Controller;

use App\model\Doctor;
use Core\Login;
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
        $doctors=Doctor::GETCLASS()->all();
        $path="home";
        $V=new View;
        $V->show($path ,compact("doctors"));
    }
    public function Dashboard()
    {   
       if(!Login::loginCheck())
       \Core\Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');
       
       $role=\Core\Login::getRoleCookie();
       $V=new View;
       
       $namespace= trim('\App\model\ ') ;
       $model= new ($namespace.$role);
       $selfPerson=$model->GETCLASS()->find(\Core\Login::getUserCookie(),'email')[0];

     
       if ($role=='admin') 
       {
            $doctorModel=new ($namespace.'Doctor');
            $departmentModel=new ($namespace.'Department');
            
            $Admins=$model->all();
            if (($key = array_search($selfPerson, $Admins)) !== false) {
                unset($Admins[$key]);
            }
            $Doctors= $doctorModel->all();
            $Departments=$departmentModel->all();
            
            $V->show('DashboardAdmin',compact('Doctors','Departments','Admins','selfPerson'));
                
        } elseif($role=='doctor') {

            $patientWork=new ($namespace.'Patient');




            $V->show('DashboardDoctor',compact('selfPerson'));
        }else
        {
         $V->show('DashboardPatient',compact('selfPerson'));
        }
        
       

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