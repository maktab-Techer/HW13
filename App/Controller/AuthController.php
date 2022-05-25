<?php
namespace App\Controller;

use App\model\Admin;
use App\model\Doctor;
use App\model\Patient;
use Core\Application;

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
private function patientRegister()
{
    $model=Patient::GETCLASS();
    $model->create([
        "name"=>$_POST["name"],
        "family_name"=>$_POST["family_name"],
        "email"=>$_POST["email"],
        "password"=>$_POST['password']
        
    ]);
    Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');
    
}
private function doctorRegister()
{
    $model=Doctor::GETCLASS();
    $model->create([
        "name"=>$_POST["name"],
        "family_name"=>$_POST["family_name"],
        "email"=>$_POST["email"],
        "password"=>$_POST['password']
    ]);
    Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');

    
}
private function adminRegister()
{
    $model=Admin::GETCLASS();
    $model->create([
        "name"=>$_POST["name"],
        "family_name"=>$_POST["family_name"],
        "email"=>$_POST["email"],
        "password"=>$_POST['password']
    ]);
    Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');

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
    // $model->create([
    //     "name"=>$_POST["name"],
    //     "family_name"=>$_POST["family_name"],
    //     "email"=>$_POST["email"],
    //     "password"=>$_POST['password']
        
    // ]);
    Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');
    
}
private function doctorLogin()
{
    $model=Doctor::GETCLASS();
    // $model->create([
    //     "name"=>$_POST["name"],
    //     "family_name"=>$_POST["family_name"],
    //     "email"=>$_POST["email"],
    //     "password"=>$_POST['password']
    // ]);
    Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');

    
}
private function adminLogin()
{
    $model=Admin::GETCLASS();
    // $model->create([
    //     "name"=>$_POST["name"],
    //     "family_name"=>$_POST["family_name"],
    //     "email"=>$_POST["email"],
    //     "password"=>$_POST['password']
    // ]);
    Application::GETCLASS()->GETPROPERTY("response")->setHeader('/');

}


}