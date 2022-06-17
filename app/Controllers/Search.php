<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CuriosityModel;
use App\Models\VarietyModel;

class Search extends BaseController
{
    public function index()
    {

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/');
        }

        $page = 'resultErro';

        $parser = \Config\Services::renderer();
        // Essa variável pode vir de um $_POST ou de outras formas

        $wordInput = $this->request->getPost('search');

        $nomeBuscado = tratarSentenca($wordInput);
     

        // abre o arquivo json
        $ficheiroGeo = file_get_contents(defineUrlDb() . 'category-geography.json');
        $ficheiroWor = file_get_contents(defineUrlDb() . 'category-world.json');
        $ficheiroBra = file_get_contents(defineUrlDb() . 'category-brazil.json');
        $ficheiroCur = file_get_contents(defineUrlDb() . 'category-curiosity.json');
        $ficheiroVar = file_get_contents(defineUrlDb() . 'category-variety.json');

        
        $dataGeo = json_decode($ficheiroGeo, true);
        $dataWor = json_decode($ficheiroWor, true);
        $dataBra = json_decode($ficheiroBra, true);
        $dataCur = json_decode($ficheiroCur, true);
        $dataVar = json_decode($ficheiroVar, true);

       
        // converte em objeto
      

        // seta mensagem defaul
        $msg = 'Ops! Nenhum artigo encontrado!';

        //percorre todos os elementos e procura pelo nomeBuscado

        $resultado = [];
       
       
        foreach ($dataGeo as $key => $value) {
            $pv = "tiberiogeo ". mb_strtolower(tratarPalavras($value['title']));
            if (strpos($pv, $nomeBuscado) == !false) {

                $msg = 'Encontrado na lista!';

                $resultado[] = $value;
            }
        }
        foreach ($dataWor as $key => $value) {
            $pv = "tiberiogeo ". mb_strtolower(tratarPalavras($value['title']));
            if (strpos($pv, $nomeBuscado) == !false) {

                $msg = 'Encontrado na lista!';

                $resultado[] = $value;
            }
        }
        foreach ($dataBra as $key => $value) {
            $pv = "tiberiogeo ". mb_strtolower(tratarPalavras($value['title']));
            if (strpos($pv, $nomeBuscado) == !false) {

                $msg = 'Encontrado na lista!';

                $resultado[] = $value;
            }
        }
        foreach ($dataVar as $key => $value) {
            $pv = "tiberiogeo ". mb_strtolower(tratarPalavras($value['title']));
            if (strpos($pv, $nomeBuscado) == !false) {

                $msg = 'Encontrado na lista!';

                $resultado[] = $value;
            }
        }
        foreach ($dataCur as $key => $value) {
            $pv = "tiberiogeo ". mb_strtolower(tratarPalavras($value['title']));
            if (strpos($pv, $nomeBuscado) == !false) {

                $msg = 'Encontrado na lista!';

                $resultado[] = $value;
            }
        }     
        // imprime se encontrou ou não

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
}
