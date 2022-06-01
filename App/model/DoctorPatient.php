<?php
namespace App\model;

use Core\Model;
use Core\Validation;

class DoctorPatient extends Model{
    protected function getTable():string    
    {
        return "doctor_patient";
    }
    public function getRules(): array
    {
        return [];  
    }
    public function sameDoctorPatient($id)
    {
        
    }
    private function Doctor($idDoc)
    {   
        return \App\model\Doctor::GETCLASS()->find($idDoc);
    }
    private function Patient($idPat)
    {   
        return \App\model\Patient::GETCLASS()->find($idPat)[0];
    }
    private function dates($idWork)
    {   
        return \App\model\WorkTime::GETCLASS()->find($idWork);
    }

    public function getPatientWhitIdDoctor($id)
    {   
       $idPatients= $this->find($id,"id_Doctor") ;
       $patients=[];
       foreach($idPatients as $idPatient){
           $patients[]=$this->Patient($idPatient);
       }
       return $patients;
    }

}