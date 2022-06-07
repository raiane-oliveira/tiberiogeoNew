<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\VarietyModel;
use App\Models\CuriosityModel;

class Home extends BaseController
{

    public function index()
    {
        $articleCurrentCategory = new ArticleModel();
        $ArticleCurrentFinal = $articleCurrentCategory->getArticleCurrent();   
       
        $endArticleCategory = new ArticleModel();
        $ArticleCurrent = $endArticleCategory->getById(
            $ArticleCurrentFinal['id'],$ArticleCurrentFinal['category']);

        $dataCategoryWorld = $this->category->getArticleMain('world');
        $dataCategoryBrazil = $this->category->getArticleMain('brazil');
        $dataCategoryGeography = $this->category->getArticleMain('geography');
        
        $dataCategoryGeographyFavorite = $dataCategoryGeography;
        shuffle($dataCategoryGeographyFavorite);

        $curiosity =  new CuriosityModel();
        $dataCategoryCuriosity = $curiosity->getAllCuriosities();
        krsort($dataCategoryCuriosity);

        $variety =  new VarietyModel();
        $dataCategoryVariety = $variety->getAllVariety();
        krsort($dataCategoryVariety);

        $arrayEmphasis = ['brazil', 'world', 'geography', 'curiosity', 'variety'];
        shuffle($arrayEmphasis);
         
        $dataCategoryEmphasis = $this->category->getArticleMain(end($arrayEmphasis));
        shuffle($dataCategoryEmphasis);


        $data = [
            "data_temperature" => $this->dataTemperature,
            "date_now" => $this->dateNow,
            "dataWorld" => end($dataCategoryWorld),
            "dataBrazil" => end($dataCategoryBrazil),
            "dataGeography" => end($dataCategoryGeography),
            "dataGeographyFavorite" => $dataCategoryGeographyFavorite,
            "dataCategoryEmphasis" => end($dataCategoryEmphasis),
            "dataCuriosity" => $dataCategoryCuriosity,
            "dataVariety" => $dataCategoryVariety,
            "dataMenuWorld" => $this->menuWorld,
            "dataMenuBrazil" => $this->menuBrazil,
            "dataMenuGeography" => $this->menuGeography,
            'dataCurrent' =>  $ArticleCurrent,
        ];


        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('site/home/home');
    }
}
