<?php

namespace App\Controllers;

use App\Models\VarietyModel;
use App\Models\CuriosityModel;
use App\Controllers\BaseController;
use App\Models\QuizModel;

class Quiz extends BaseController
{
    private $erros;

    public function index(int $position = 1)
    {
        $msg = [
            'message' => '',
            'alert' => ''
        ];
        if (session()->has('erro')) {
            $this->erros = session('erro');            
        }
        //session()->remove('position');
        $quiz = new QuizModel();        
        $totalQuestion = $quiz->getCount();       
        
        $page = 'site/quiz/quiz';

        $quizQuestion = $quiz->getByPosition($position);
        //$quizQuestion = $quiz->getAll();
        //shuffle($quizQuestion);         
        if (isset($dataCategory['error'])) {
            $page = 'site/error404.php';
        }


        /*Define os favoritos*/
        $categoryFavorite = 'geography';
        $dataCategoryGeography = $this->category->getArticleMain($categoryFavorite);

        $curiosity =  new CuriosityModel();
        $dataCategoryCuriosity = $curiosity->getAllCuriosities();


        $variety =  new VarietyModel();
        $dataCategoryVariety = $variety->getAllVariety();


        $data = [

            "data_temperature" => $this->dataTemperature,
            "date_now" => $this->dateNow,
            "dataMenuWorld" => $this->menuWorld,
            "dataMenuBrazil" => $this->menuBrazil,
            "dataMenuGeography" => $this->menuGeography,
            "dataGeographyFavorite" => $dataCategoryGeography,
            "dataCuriosity" => $dataCategoryCuriosity,
            "dataVariety" => $dataCategoryVariety,
            'tagCloud' => $this->tagCloud,
            "quizzes" => $quizQuestion,
            "totalQuizzes" => $quiz->getCount(),
            'erro' => $this->erros
            
        ];


        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        //session()->remove('position');
        return $parser->render($page);
    }

    public function sendQuestion()
    {
        $val = $this->validate(
            [
                'alternative' => 'required',
            ],
            [
                'alternative' => [
                    'required' => 'Escolha uma opção para continuar!',
                ],
            ]
        );     

        if (!$val) {
            return redirect()->back()->with('erro', $this->validator);            
        }


        $idQuestion = $this->request->getPost('idQuestion');
        $idAlternative = $this->request->getPost('alternative');


        $quiz = new QuizModel();
        $quizQuestion = $quiz->getById($idQuestion, $idAlternative);
        $cont = 0;
        if(!session()->has('hits')){
            session()->set('hits', $cont );          
        }
        if ($quizQuestion['status']) {
            //session()->remove('hits');
            $total = session('hits') + 1;     
            //dd($total);
            session()->set('hits', $total);
            $d = session('hits');
            //dd($d);
            session()->set(
                [
                    'message' => '<h4>PARABÉNS! Resposta correta!</h4> <strong>Resposta :: </strong>' . $quizQuestion['resposta'] ,
                    'status' => 'success',
                    'question' =>  $quizQuestion['question']  

                ],
            );
            
        } else {
            session()->set([
                'message' => '<h4>Ops! Que pena, você errou! A resposta correta é:</h4><strong>Resposta :: </strong>' . $quizQuestion['resposta'],
                'status' => 'danger',
                'question' =>  $quizQuestion['question']   
            ]);
        }
        
        //session()->set('position', $quizQuestion['position']);

        return redirect()->to('quiz/'.$quizQuestion['position']);
    }
}
