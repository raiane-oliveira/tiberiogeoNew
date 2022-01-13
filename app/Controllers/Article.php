<?php

namespace App\Controllers;

use DateTime;
use IntlDateFormatter;
use App\Controllers\BaseController;
use PHPUnit\Util\Json;

class Article extends BaseController
{

    public $date_now;
    public function __construct()
    {

        helper('html');
        $date = new DateTime();
        $formatter = new IntlDateFormatter(
            'pt_BR',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'America/Sao_Paulo',
            IntlDateFormatter::GREGORIAN
        );
        $this->date_now = $formatter->format($date);
    }

    public function index($category, $article)
    {
        $style = [
            "css" => [
                //["path" => base_url()."/assets/css/uikit.min.css"],
                ["path" => base_url() . "/assets/css/bootstrap.min.css"],
                ["path" => base_url() . "/assets/css/font-awesome.min.css"],
                ["path" => base_url() . "/assets/css/animate.css"],
                ["path" => base_url() . "/assets/css/icofonts.css"],
                ["path" => base_url() . "/assets/css/owlcarousel.min.css"],
                //["path" => base_url()."/assets/css/slick.css"],
                ["path" => base_url() . "/assets/css/navigation.css"],
                ["path" => base_url() . "/assets/css/magnific-popup.css"],
                ["path" => base_url() . "/assets/css/style.css"],
                //["path" => base_url()."/assets/css/colors/color-0.css"],
                ["path" => base_url() . "/assets/css/responsive.css"],

            ],
        ];
        
        $jsonString = file_get_contents('../category-' . $category . '.json');
        $dataCategory = json_decode($jsonString, true);

             

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
       
        
        $newJsonString = json_encode($dataCategory, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        file_put_contents('../category-' . $category . '.json', $newJsonString);

        $dados = json_decode(file_get_contents('https://api.hgbrasil.com/weather?format=json-cors&key=acca0bf5&woeid=455848'), true); // Recebe os dados da API
        //$dataCotacao = json_decode(file_get_contents('https://economia.awesomeapi.com.br/json/USD-BRL'), true);
        
        if(json_last_error()!= 0 ){
            $dados = [
                'results' => [    
                    'temp' => '',
                    'city' => '',
                    'img_id' => '',
                    'description'=>''
                ]               
            ];
        }    

        $dataDefault = [
	        "title" => "TiberioGeo - A Geografia Levada a Sério!",
            "favico" => base_url()."/assets/img/logo/autor.png",
            
        ];

        $categoryFavorite = 'geography';
        $jsonStringGeografia = file_get_contents('../category-' . $categoryFavorite . '.json');
        $dataCategoryGeografia = json_decode($jsonStringGeografia, true);  
              
        $data = [
            //"title" => "TiberioGeo - A Geografia Levada a Sério!",
            //"favico" => base_url() . "/assets/img/logo/autor.png",
            //"dataCategory" => $dataCategory,
            "category" => $category,
            "data_temperature" => $dados,
            "date_now" => $this->date_now,
            "article" => $article,
            "dataArticle" => $dataArticle,
            "dataGeography" => $dataCategoryGeografia,
            "categoryFavorite" => $categoryFavorite
            //"cotacaoDolar" => $dataCotacao['bid']
        ];

        $javascript = [
            "js" => [
                //["path"=> base_url()."/assets/js/jquery.min.js"],
                ["path" => base_url() . "/assets/js/jquery-3.6.0.min.js"],
                ["path" => base_url() . "/assets/js/navigation.js"],
                //["path"=> base_url()."/assets/js/uikit.min.js"],
                //["path"=> base_url()."/assets/js/uikit-icons.js"],
                ["path" => base_url() . "/assets/js/popper.min.js"],
                ["path" => base_url() . "/assets/js/jquery.magnific-popup.min.js"],
                ["path" => base_url() . "/assets/js/bootstrap.min.js"],
                ["path" => base_url() . "/assets/js/owl-carousel.2.3.0.min.js"],
                //["path"=> base_url()."/assets/js/slick.min.js"],
                //["path"=> base_url()."/assets/js/smoothscroll.js"],
                ["path" => base_url() . "/assets/js/main.js"],
                ["path" => base_url() . "/assets/js/my.js"],

            ]
        ];

        /*$parser = \Config\Services::renderer();
        
        $parser->setData($style);
        $parser->setData($data);
	    $parser->setData($javascript);
	  
        
        $page = new PageModel();
        
        $pages_carousel = $page->getPages(5,0);
        
        $pages_right = $page->getPages(2,5);
        
        $pages_see_more = $page->getPages(5,7);
        
        $pages_know_more = $page->getPages(4,12);
        
        $pages_most_seen = $page->getPages(4,16);
        
       
        $pagesResult = [
            "articles_carousel" => $pages_carousel,
            "articles_right" => $pages_right,
            "articles_see_more" => $pages_see_more,
            "articles_know_more" => $pages_know_more,
            "articles_most_seen" => $pages_most_seen,
        ];
        
        
        $parser->setData($pagesResult);*/
        $parser = \Config\Services::renderer();
        $parser->setData($style);
        $parser->setData($data);
        $parser->setData($dataDefault);
        $parser->setData($javascript);
        return $parser->render('site/article/articles');
        //return view('site/home');
    }
}
