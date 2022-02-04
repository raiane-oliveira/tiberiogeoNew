<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\ArticleModel;
use App\Models\VarietyModel;
use App\Models\CuriosityModel;
use App\Controllers\BaseController;

class Article extends BaseController
{  
    public $articleUpdate;
    public $article;

    /**
     * [Description for index]
     *
     * @param string $category
     * @param string $article
     * 
     * @return [type]
     * 
     */
    public function index(string $category, string $article)
    {
        /*Busca o artigo*/        
        $dataCategory = $this->category->getArticleMain($category);
        $dataArticle = [];
        //dd($dataCategory);

        $page = 'articleErro';
        $data = [
            ''
        ];
        
        if(!isset($dataCategory['error'])){

            $page = 'articles';

            foreach ($dataCategory as $key => $dados) {
                if ($dados['slug'] == $article) {
                    $dataArticle['title'] = $dados['title'];
                    $dataArticle['slug'] = $dados['slug'];
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
    
            /*Outro arquivo*/
            $otherArticle = $this->articleUpdate->getOtherArticle($article, $category);
            
            //$page = !$otherArticle['error'] ? 'articles' : 'articleErro'; 
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
                "otherArticle" => $otherArticle,
                "dataGeography" => $dataCategoryGeography,
                "dataGeographyFavorite" => $dataCategoryGeography,
                "dataMenuWorld" => $this->menuWorld,
                "dataMenuBrazil" => $this->menuBrazil,
                "dataMenuGeography" => $this->menuGeography,
                "dataCuriosity" => $dataCategoryCuriosity,
                "dataVariety" => $dataCategoryVariety,
                //"cotacaoDolar" => $dataCotacao['bid']
            ];

        }    

        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render('site/article/'.$page);       
        
    }

    /**
     * [Description for buildPdf]
     *
     * @param string $article
     * @param string $category
     * 
     * @return [type]
     * 
     */
    public function buildPdf( string $article, string $category)
    {

        $this->article = new ArticleModel();
        
        $dados = $this->article->getArticle($article, $category);        

        $v = view('site/output',$dados);
        $options = new Options();
        $options->setChroot(__DIR__);
        $options->setIsRemoteEnabled(true);
        
        $pdf = new Dompdf($options);
        $pdf->loadHtml($v);
        $pdf->render();
        $pdf->stream(createSlug($article).'pdf',['Attachment'=>false]);
        //$pdf->output();
    }
}