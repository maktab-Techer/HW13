<?php
namespace App\Controller;

use App\model\Doctor;
use Core\View;

class SearchController{

    public function doctorSearchBarHome()
    {
        $search=$_POST["doctor_search_bar"]   ;
        $doctors=Doctor::GETCLASS()->NameSearch($search);
        // echo'<pre>';
        // var_dump($like);
        // var_dump($doctorsSearch);
        // var_dump(Doctor::GETCLASS()->all());
        // echo'</pre>';
        (new View)->Show("home",compact('doctors','search'));
    }

}