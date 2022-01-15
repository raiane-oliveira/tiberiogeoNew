<?php

namespace App\Controllers;

use App\Models\VarietyModel;
use App\Models\CuriosityModel;
use App\Controllers\BaseController;

class School extends BaseController
{
    public function index()
    {
         /*Define os favoritos*/
         $categoryFavorite = 'geography';
         $dataCategoryGeography = $this->category->getArticleMain($categoryFavorite);

         $curiosity =  new CuriosityModel();
         $dataCategoryCuriosity = $curiosity->getAllCuriosities();
         
 
         $variety =  new VarietyModel();
         $dataCategoryVariety = $variety->getAllVariety();
         
        $datas = json_decode(file_get_contents('../school.json'), true); // Recebe os dados da API

        $data = [
	        
            "data_temperature" => $this->dataTemperature,
            "date_now" => $this->dateNow,
            "dataMenuWorld" => $this->menuWorld,
            "dataMenuBrazil" => $this->menuBrazil,
            "dataMenuGeography" => $this->menuGeography,
            "dataSchool" => $datas,
            "dataGeographyFavorite" => $dataCategoryGeography,
            "dataCuriosity" => $dataCategoryCuriosity,
            "dataVariety" => $dataCategoryVariety,
        ];       
	 
	    
	    $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
		return $parser->render('site/school/school');
    }
}
