<?php

namespace App\Controllers;

use App\Models\VarietyModel;
use App\Models\CuriosityModel;
use App\Controllers\BaseController;
use App\Models\QuizModel;

class Quiz extends BaseController
{
    public $erros = '';

    public function index(int $position = 1)
    {
       //session()->destroy();
       //dd('');
        $msg = [
            'message' => '',
            'alert' => ''
        ];
        if (session()->has('erro')) {
            //dd('');
            $this->erros = session('erro');
           
        }
        //session()->remove('position');
        $quiz = new QuizModel();
        $quizzes = $quiz->getAll();
         

        $page = 'site/quiz/quiz';

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
            "quizzes" => $quizzes,
            "totalQuizzes" => $quiz->getCount(),
            'erro' => $this->erros,            
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
        $quiz = new QuizModel();
        $quizzes = $quiz->getAll();

        $a = [];
        foreach($quizzes as $quiz){
            $a['id'] = 'alternative'.$quiz['id'];
        }
        //dd($a);
        $val = $this->validate(
            [
                $a['id'] => 'required',
            ],
            [
                $a['id']  => [
                    'required' => 'Escolha uma opção para continuar!',
                ],
            ]
        );

        if (!$val) {
            return redirect()->back()->withInput()->with('erro', $this->validator);
        }



        $idQuestion = $this->request->getPost();
        $idAlternative = $this->request->getPost('alternative');

        dd($idQuestion);

        foreach($idQuestion as $id){
            echo $id.'<br>';
        }
exit();
        $quiz = new QuizModel();
        $quizQuestion = $quiz->getById($idQuestion, $idAlternative);

        



        $cont = 0;
        if (!session()->has('hits')) {
            session()->set('hits', $cont);
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
                    'message' => '<h4>PARABÉNS! Resposta correta!</h4> <strong>Resposta :: </strong>' . $quizQuestion['resposta'],
                    'status' => 'success',
                    'question' =>  $quizQuestion['question'],
                    'return' => 'Você acertou!',
                    'response_correct' =>  $quizQuestion['resposta'],
                    'key' =>  convertNumberString($quizQuestion['key']),
                    'img' =>  $quizQuestion['img']

                ],
            );
        } else {
            session()->set([
                'message' => '<h4>Ops! Que pena, você errou! A resposta correta é:</h4><strong>Resposta :: </strong>' . $quizQuestion['resposta'],
                'status' => 'danger',
                'question' =>  $quizQuestion['question'],
                'return' => 'Você errou!',
                'response_correct' =>  $quizQuestion['resposta'],
                'response_check' =>  $quizQuestion['check_resposta'],
                'key_check' =>  convertNumberString($quizQuestion['check_key']),
                'key' =>  convertNumberString($quizQuestion['key']),
                'img' =>  $quizQuestion['img']
            ]);
        }

        //session()->set('position', $quizQuestion['position']);
        if (session()->has('endQuest')) {

            session()->set('endQuest', $quizQuestion['position']);
            
        } else {
            session()->set('endQuest', $quizQuestion['position']);
        }

        return redirect()->to('quiz/' . $quizQuestion['position']);
    }

    public function restart()
    {
        $position = 1;
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
}
