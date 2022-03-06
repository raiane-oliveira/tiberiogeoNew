<?php

namespace App\Controllers;

use App\Models\VarietyModel;
use App\Models\CuriosityModel;
use App\Controllers\BaseController;

class Category extends BaseController
{
    public $categories = [];
    /**
     * [Description for index]
     *
     * @param string $category
     * 
     * @return string
     * 
     */
    public function index(string $category): string
	{         
       
        $page = 'site/category/categories';
	   
	    $dataCategory = $this->category->getArticleMain($category);
        krsort($dataCategory);         
        if (isset($dataCategory['error'])) {
            $page = 'site/error404.php';
        }

         /*Define os favoritos*/
         $categoryFavorite = 'geography';
         $dataCategoryGeography = $this->category->getArticleMain($categoryFavorite);

         $curiosity =  new CuriosityModel();
         $dataCategoryCuriosity = $curiosity->getAllCuriosities();
         
 
         $variety =  new VarietyModel();
         $dataCategoryVariety = $variety->getAllVariety();
          

	    $data = [
	        "dataCategory" => $dataCategory,
            "category" => $category,
            "data_temperature" => $this->dataTemperature,
            "date_now" => $this->dateNow,
            "dataMenuWorld" => $this->menuWorld,
            "dataMenuBrazil" => $this->menuBrazil,
            "dataMenuGeography" => $this->menuGeography,
            "dataGeographyFavorite" => $dataCategoryGeography,
            "dataCuriosity" => $dataCategoryCuriosity,
            "dataVariety" => $dataCategoryVariety,
        ];       
	 
	    
	    $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
		return $parser->render($page);       
        
	}

    public function defineCategories(): array
    {
        return  $this->categories = ["world", "brazil", "geography", "curiosity", "variety"];
    }
}
