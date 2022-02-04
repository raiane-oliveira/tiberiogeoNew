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
            $jsonString = file_get_contents(APPPATH . 'Base/category-' . $category . '.json');
            $dataCategory = json_decode($jsonString, true);          
            return $dataCategory;
                    
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

        $jsonString = file_get_contents(APPPATH . 'Base/category-' . $category . '.json');
        $dataCategory = json_decode($jsonString, true);
        return $dataCategory;
    }
}
