<?php

namespace App\Controllers;

use App\Models\VarietyModel;
use App\Models\CuriosityModel;
use App\Controllers\BaseController;
use App\Models\ArticleModel;
use App\Models\SchoolModel;

class School extends BaseController
{
    /**
     * [Description for index]
     *
     * @return string
     * 
     */
    public function index(): string
    {
        /*Define os favoritos*/
        $categoryFavorite = 'geography';
        $dataCategoryGeography = $this->category->getArticleMain($categoryFavorite);

        $curiosity =  new CuriosityModel();
        $dataCategoryCuriosity = $curiosity->getAllCuriosities();


        $variety =  new VarietyModel();
        $dataCategoryVariety = $variety->getAllVariety();

        $school = new SchoolModel();
        $datas = $school->getSchool();

        $allArticle = new ArticleModel();
        $articleAll = $allArticle->getAllArticles();

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
            "dataArticlesAll" => $articleAll
        ];


        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('site/school/school');    }

   
}
