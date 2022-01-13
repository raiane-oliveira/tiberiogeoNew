<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{    
    /**
     * getWorldMain
     *
     * @return array
     */
    public function getArticleMain(string $category):array
    {
        $jsonString = file_get_contents('../category-'.$category.'.json');
        $dataCategory = json_decode($jsonString, true); 
        return $dataCategory;
    }
    
    /**
     * getMenu
     *
     * @param  string $category
     * @return array
     */
    public function getMenu(string $category):array{

        $jsonString = file_get_contents('../category-'.$category.'.json');
        $dataCategory = json_decode($jsonString, true); 
        return $dataCategory;

    }
}
