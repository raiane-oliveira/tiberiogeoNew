<?php

namespace App\Models;

use CodeIgniter\Model;

class VarietyModel extends Model
{
    public function getAllVariety(): array
    {
        $jsonString = file_get_contents(APPPATH. 'Base/category-variety.json');
        $dataCategoryVariety = json_decode($jsonString, true); 
        return $dataCategoryVariety;
    }
}
