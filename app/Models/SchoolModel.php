<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolModel extends Model
{    
       
    /**
     * getSchool
     *
     * @return array
     */
    public function getSchool():array{

        
        $jsonString = file_get_contents(APPPATH. 'Base/school.json');
        $dataSchool = json_decode($jsonString, true); 
        return $dataSchool;
       
        
    }
}
