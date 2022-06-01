<?php
namespace App\Controller;

use App\model\Admin;
use App\model\Doctor;
use App\model\Patient;
use Core\Application;
use Core\Login;
use Core\View;

class AuthController{
//TODO do validation register
public function doRegister()
{   
    if($_POST["role"]=="patient")
    {
        $this->patientRegister();
    } 
    if($_POST["role"]=="doctor")
    {
        $this->doctorRegister();
    }  
    if($_POST["role"]=="admin")
    {
        $this->adminRegister();
    }  
}

//TODO do validation login
public function doLogin()
{   
    if($_POST["role"]=="patient")
    {
        $this->patientLogin();
    } 
    if($_POST["role"]=="doctor")
    {
        $this->doctorLogin();
    }  
    if($_POST["role"]=="admin")
    {
        $this->adminLogin();
    }  
}

private function patientLogin()
{
    $model=Patient::GETCLASS();
    
    $login=new Login($model,$_POST['user'],$_POST['password']);
    $isSuccess=$login->doLogin('patient');
    $error=$login->error;
    
    if($isSuccess==false){
        (new View)->Show('login', compact($error));
    }
    
    Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');
    
}
private function doctorLogin()
{
    $model=Doctor::GETCLASS();
    
    $login=new Login($model,$_POST['user'],$_POST['password']);
    $isSuccess=$login->doLogin('doctor');
    $error=$login->error;
    
    if($isSuccess==false){
        (new View)->Show('login', compact('error'));
    }else{

        Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');
    }


    
}
private function adminLogin()
{
    $model=Admin::GETCLASS();
    
    $login=new Login($model,$_POST['user'],$_POST['password']);
    $isSuccess=$login->doLogin('admin');
    $error=$login->error;
    
    if($isSuccess==false){
        (new View)->Show('login', compact($error));
    }

    Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');

}

private function patientRegister()
{
    $model=Patient::GETCLASS();

    if(!$model->IsExist($_POST['email']))
    {
        $model->create([
            "name"=>$_POST["name"],
            "family_name"=>$_POST["family_name"],
            "email"=>$_POST["email"],
            "password"=>$_POST['password']
        ]);
    }
    
    Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');

    
}
private function doctorRegister()
{
    
    $model=Doctor::GETCLASS();

    if(!$model->IsExist($_POST['email']))
    {
        $model->create([
            "name"=>$_POST["name"],
            "family_name"=>$_POST["family_name"],
            "email"=>$_POST["email"],
            "password"=>$_POST['password'],
            "status"=>0
        ]);
    }
    Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');

    
}
private function adminRegister()
{
    $model=Admin::GETCLASS();
    if(!$model->IsExist($_POST['email']))
    {
        $model->create([
            "name"=>$_POST["name"],
            "family_name"=>$_POST["family_name"],
            "email"=>$_POST["email"],
            "password"=>$_POST['password']
        ]);
    }

    Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');

}
public function logout()
{
    Login::logout();
    Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');
}

}