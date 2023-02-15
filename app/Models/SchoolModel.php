<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolModel extends Model
{


    /**
     * [Description for getSchool]
     *
     * @return array
     * 
     */
    public function getSchool(): array
    {
        $jsonString = file_get_contents(defineUrlDb().'school.json');
        $dataSchool = json_decode($jsonString, true);        
        return $dataSchool;
    }
}
