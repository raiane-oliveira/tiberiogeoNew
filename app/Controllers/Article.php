<?php

namespace App\Controllers;

use DateTime;
use IntlDateFormatter;
use PHPUnit\Util\Json;
use App\Models\ArticleModel;
use App\Models\VarietyModel;
use App\Models\CuriosityModel;
use App\Controllers\BaseController;

class Article extends BaseController
{  
    public $articleUpdate;

    public function index($category, $article)
    {
        /*Busca o artigo*/        
        $dataCategory = $this->category->getArticleMain($category);
        $dataArticle = [];

        foreach ($dataCategory as $key => $dados) {
            if (createSlug($dados['title']) == $article) {
                $dataArticle['title'] = $dados['title'];
                $dataArticle['category'] = $dados['category'];
                $dataArticle['date'] = $dados['date'];
                $dataArticle['image-main'] = $dados['image-main'];
                $dataArticle['resume'] = $dados['resume'];
                $dataArticle['text'] = $dados['text'];
                $dataArticle['text-second'] = $dados['text-second'];
                $dataArticle['image-text-second'] = $dados['image-text-second'];
                $dataArticle['quote'] = $dados['quote'];
                $dataArticle['quote-author'] = $dados['quote-author'];
                $dataArticle['image-video'] = $dados['image-video'];
                $dataArticle['link-video'] = $dados['link-video'];
                $dataArticle['title-video'] = $dados['title-video'];
                $dataArticle['text-video'] = $dados['text-video'];
                $dataArticle['image-gallery'] = $dados['image-gallery'];
                $dataArticle['font'] = $dados['font'];
                $dataCategory[$key]['access'] = $dados['access'] + 1;
                $dataArticle['access'] = $dados['access'] + 1;
                break;
            }
        }       
        /*Atualiza o arquivo*/        
        $this->articleUpdate = new ArticleModel();
        $this->articleUpdate->updateArticle($dataCategory,$category);

        /*Define os favoritos*/
        $categoryFavorite = 'geography';
        $dataCategoryGeography = $this->category->getArticleMain($categoryFavorite);
              
        $curiosity =  new CuriosityModel();
        $dataCategoryCuriosity = $curiosity->getAllCuriosities();
        

        $variety =  new VarietyModel();
        $dataCategoryVariety = $variety->getAllVariety();
        

        $data = [
            "category" => $category,
            "data_temperature" => $this->dataTemperature,
            "date_now" => $this->dateNow,
            "article" => $article,
            "dataArticle" => $dataArticle,
            "dataGeography" => $dataCategoryGeography,
            "dataGeographyFavorite" => $dataCategoryGeography,
            "dataMenuWorld" => $this->menuWorld,
            "dataMenuBrazil" => $this->menuBrazil,
            "dataMenuGeography" => $this->menuGeography,
            "dataCuriosity" => $dataCategoryCuriosity,
            "dataVariety" => $dataCategoryVariety,
            //"cotacaoDolar" => $dataCotacao['bid']
        ];

        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('site/article/articles');
        
    }
}
