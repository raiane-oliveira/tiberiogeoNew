<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class School extends BaseController
{
    public function index()
    {
        $datas = json_decode(file_get_contents('../school.json'), true); // Recebe os dados da API
        $data = [
	        
            "data_temperature" => $this->dataTemperature,
            "date_now" => $this->dateNow,
            "dataMenuWorld" => $this->menuWorld,
            "dataMenuBrazil" => $this->menuBrazil,
            "dataMenuGeography" => $this->menuGeography,
            "dataSchool" => $datas
        ];       
	 
	    
	    $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
		return $parser->render('site/school/school');
    }
}
