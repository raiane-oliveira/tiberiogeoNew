<?php

namespace App\Models;

use CodeIgniter\Model;

class CuriosityModel extends Model
{
    public function getAllCuriosities(): array
    {
        $jsonString = file_get_contents('../category-curiosity.json');
        $dataCategoryCuriosities = json_decode($jsonString, true); 
        return $dataCategoryCuriosities;
    }
}
