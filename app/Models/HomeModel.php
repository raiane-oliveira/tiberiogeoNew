<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class HomeModel extends Model
{

    /**
     * [Description for getArticleMain]
     *
     * @param string $category
     * 
     * @return array
     * 
     */
    public function getArticleMain(string $category): array
    {       
        $dataCategory = [];

        try {
            $jsonString = file_get_contents(defineUrlDb().'category-' . $category . '.json');
            $dataCategory = json_decode($jsonString, true);            
            return $dataCategory;    
        }
        catch (Exception $e) {
            $dataCategory['error'] = true;
            $dataCategory['message'] = "Erro genérico";
            return $dataCategory;
        }                
    }


    /**
     * [Description for getMenu]
     *
     * @param string $category
     * 
     * @return array
     * 
     */
    public function getMenu(string $category): array
    {

        $jsonString = file_get_contents(defineUrlDb().'category-' . $category . '.json');
        $dataCategory = json_decode($jsonString, true);
        return $dataCategory;
    }
}
