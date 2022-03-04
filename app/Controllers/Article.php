<?php

namespace App\Controllers;

//use Dompdf\Dompdf;
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
        $this->article = new ArticleModel();
        $dataCategory = $this->article->getArticleTitle($category, $article);
        

        $page = 'articleErro';

        $data = [
            "data_temperature" => $this->dataTemperature,
            "date_now" => $this->dateNow,
            "dataMenuWorld" => $this->menuWorld,
            "dataMenuBrazil" => $this->menuBrazil,
            "dataMenuGeography" => $this->menuGeography,
            "message"=>$dataCategory['message']
        ];

        if ($dataCategory['error'] == false) {

            $page = 'articles';
           
            /*Atualiza o arquivo*/
            $this->articleUpdate = new ArticleModel();
            /*$this->articleUpdate->updateAccesArticle($dataCategory['id'],$category);*/

            /*Outro arquivo*/
            $otherArticle = $this->article->getOtherArticle($article, $category);
            
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
                "dataArticle" => $dataCategory,
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
        
        return $parser->render('site/article/' . $page);
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
    public function buildPdf(string $article, string $category)
    {
       
        $this->article = new ArticleModel();

        $dados = $this->article->getArticle($article, $category);    

        $v = view('site/outputPdf', $dados);
        $options = new Options();
        $options->setChroot(__DIR__);
        $options->setIsRemoteEnabled(true);

        //$pdf = new Dompdf($options);
        $pdf = new \Dompdf\Dompdf($options) ;
        $pdf->loadHtml($v);
        $pdf->render();
        $pdf->stream(createSlug($article),['attachment'=>'true']);    //$pdf->output();
    }
}
