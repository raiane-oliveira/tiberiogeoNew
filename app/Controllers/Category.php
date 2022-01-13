<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Category extends BaseController
{
        
    public function index($category)
	{         
	   
	    $dataCategory = $this->category->getArticleMain($category);
        krsort($dataCategory);  
          

	    $data = [
	        "dataCategory" => $dataCategory,
            "category" => $category,
            "data_temperature" => $this->dataTemperature,
            "date_now" => $this->dateNow,
            "dataMenuWorld" => $this->menuWorld,
            "dataMenuBrazil" => $this->menuBrazil,
            "dataMenuGeography" => $this->menuGeography,
        ];       
	 
	    
	    $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
		return $parser->render('site/category/categories');
        
	}
}
