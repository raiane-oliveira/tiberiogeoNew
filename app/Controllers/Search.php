<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CuriosityModel;
use App\Models\VarietyModel;

class Search extends BaseController
{
    public function index()
    {
               
        if (
            $this->request->getMethod() !== 'post' ||
            empty($this->request->getPost('search') )||
            (strlen($this->request->getPost('search')) < 3)
            ){
            return redirect()->to('/');
        }


        $wordInput = $this->request->getPost('search');
        $nomeBuscado = tratarSentenca($wordInput);

        $page = 'resultErro';

        $parser = \Config\Services::renderer();
        
        $resultado = $this->defieArticlesSearch($nomeBuscado);
        
        $total =  count($resultado);

        /*Define os favoritos*/
        $categoryFavorite = 'geography';
        $dataCategoryGeography = $this->category->getArticleMain($categoryFavorite);

        $curiosity =  new CuriosityModel();
        $dataCategoryCuriosity = $curiosity->getAllCuriosities();

        $variety =  new VarietyModel();
        $dataCategoryVariety = $variety->getAllVariety();

        $data = [
            "dataCategory" => $resultado,
            "word" => $nomeBuscado,
            "wordInput" => $wordInput,
            "data_temperature" => $this->dataTemperature,
            "date_now" => $this->dateNow,
            "dataMenuWorld" => $this->menuWorld,
            "dataMenuBrazil" => $this->menuBrazil,
            "dataMenuGeography" => $this->menuGeography,
            "dataGeographyFavorite" => $dataCategoryGeography,
            "dataCuriosity" => $dataCategoryCuriosity,
            "dataVariety" => $dataCategoryVariety,
            'tagCloud' => $this->tagCloud,
        ];



        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);

        if ($total >= 1) {

            $page = 'site/search/result';
            return $parser->render($page);
        }

        return $parser->render('site/search/' . $page);
    }

    public function cloud(string $word)
    {
        $page = 'resultErro';

        $parser = \Config\Services::renderer();
        
        $resultado = $this->defieArticlesSearch(tratarSentenca($word));       
        
        /*Define os favoritos*/
        $categoryFavorite = 'geography';
        $dataCategoryGeography = $this->category->getArticleMain($categoryFavorite);

        $curiosity =  new CuriosityModel();
        $dataCategoryCuriosity = $curiosity->getAllCuriosities();


        $variety =  new VarietyModel();
        $dataCategoryVariety = $variety->getAllVariety();


        $data = [
            "dataCategory" => $resultado,
            "word" => $word,
            "wordInput" => $word,
            "data_temperature" => $this->dataTemperature,
            "date_now" => $this->dateNow,
            "dataMenuWorld" => $this->menuWorld,
            "dataMenuBrazil" => $this->menuBrazil,
            "dataMenuGeography" => $this->menuGeography,
            "dataGeographyFavorite" => $dataCategoryGeography,
            "dataCuriosity" => $dataCategoryCuriosity,
            "dataVariety" => $dataCategoryVariety,
            'tagCloud' => $this->tagCloud,
        ];



        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);

        $total =  count($resultado);

        if ($total >= 1) {

            $page = 'site/search/result';
            return $parser->render($page);
        }

        return $parser->render('site/search/' . $page);
    }

    private function defieArticlesSearch(string $wordSearch): array
    {   
         
          $ficheiroGeo = file_get_contents(defineUrlDb() . 'category-geography.json');
          $ficheiroWor = file_get_contents(defineUrlDb() . 'category-world.json');
          $ficheiroBra = file_get_contents(defineUrlDb() . 'category-brazil.json');
          $ficheiroCur = file_get_contents(defineUrlDb() . 'category-curiosity.json');
          $ficheiroVar = file_get_contents(defineUrlDb() . 'category-variety.json');
      
          $data = json_encode(
  
              array_merge(
                  json_decode($ficheiroGeo, true),
                  json_decode($ficheiroWor, true),
                  json_decode($ficheiroBra, true),
                  json_decode($ficheiroCur, true),
                  json_decode($ficheiroVar, true),
              )
          );
  
          $datas = json_decode($data, true);
          
    
          reset($datas);
         
          $resultado = [];  
         
          foreach ($datas as $key => $value) {
              $pv = "tiberiogeo " . mb_strtolower(tratarPalavras($value['title']));
             
              if (strpos($pv, $wordSearch) == !false) {  
                  $resultado[] = $value;
              }
          }     
          
          return $resultado;

    }
}
