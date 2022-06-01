<?php
namespace App\Controller;

use App\model\Department;
use Core\Application;

class AdminController {
    public function updateControlMethod()
    {
        if (isset($_POST['department_id'])) {
            $this->updateDepartmentEdit($_POST['department_id'],$_POST["department_edit"]);
        }
        if (isset($_POST['doctor_id'])) {
            $this->updateDoctorStatus($_POST['doctor_id'],$_POST["doctor_status"]);
        }
        if (isset($_POST['admin_id'])) {
            $this->updateAdminStatus($_POST['admin_id'],$_POST["admin_status"]);
        }

        Application::GETCLASS()->GETPROPERTY("response")->setHeader('/Dashboard');
    }
    public function deleteControlMethod()
    {  
        if (isset($_POST['doctor_id']) ) {
            $this->doctorDelete($_POST['doctor_id']);
        }
        if (isset($_POST['admin_id'])  ) {
            $this->AdminDelete($_POST['admin_id']);
        }
   
        if (isset($_POST['department_id'])  ) {
            $this->DepartmentDelete($_POST['department_id']);
        }
        Application::GETCLASS()->GETPROPERTY("response")->setHeader('/Dashboard');
    }

    
    private function addDepartment()
    {
        $model=Department::GETCLASS();
        $model->create([
            "name"=>$_POST["Add_department"],
        ]);
    
        Application::GETCLASS()->GETPROPERTY("response")->setHeader('/Dashboard');
    }
    
    private function updateDoctorStatus($id,int $status)
    {
        $status= ($status==0)? 0 :1;
        \App\model\Doctor::GETCLASS()->update(['status'=>$status],'id',$id);
    }
    private function DepartmentDelete($id)
    {
        \App\model\Department::GETCLASS()->delete($id);
    }
    private function updateDepartmentEdit($id,$input)
    {
        \App\model\Department::GETCLASS()->update(['name'=>$input],'id',$id);
    }

    private function updateAdminStatus($id,int $status )
    {
        $status= ($status==0)? 0 :1;
        \App\model\Admin::GETCLASS()->update(['status'=>$status],'id',$id);
    }
    private function doctorDelete($id)
    {
         //TODO  doctorDelete
        $id;
    }
    private function AdminDelete($id)
    {
        \App\model\Admin::GETCLASS()->delete($id);
    }
}