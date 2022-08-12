<?php

namespace App\Controllers;

use App\Models\VarietyModel;
use App\Models\CuriosityModel;
use App\Controllers\BaseController;
use App\Models\QuizModel;

class Quiz extends BaseController
{
    private $erros;    
       
    /**
     * Method index
     *
     * @param int $position [explicite description]
     *
     * @return string
     */
    public function index(int $position = 1): string
    {
        
        $msg = [
            'message' => '',
            'alert' => ''
        ];
        if (session()->has('erro')) {
            $this->erros = session('erro');
        }
       
        $quiz = new QuizModel();

        $quizQuestion = $quiz->getByPosition($position);


        $page = 'site/quiz/quiz';
        
        //shuffle($quizQuestion);         
        if (isset($dataCategory['error'])) {
            $page = 'site/error404.php';
        }

        if (session()->has('endQuest')) {


            $lastQuestionAswered = session('endQuest');

            if (session('endQuest') < $quiz->getCount()) {

                $lastQuestionAswered = session('endQuest') + 1;
            }
            
            $quizQuestion = $quiz->getByPosition($lastQuestionAswered);
        } else {
            $this->restart();
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
            'erro' => $this->erros,
            'nextQuestion' => '',
        ];


        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        
        return $parser->render($page);
    }
    
       
    /**
     * Method sendQuestion
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function sendQuestion(): \CodeIgniter\HTTP\RedirectResponse
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
            return redirect()->back()->withInput()->with('erro', $this->validator);
        }


        $idQuestion = $this->request->getPost('idQuestion');
        $idAlternative = $this->request->getPost('alternative');


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
                    'question-sub' =>  $quizQuestion['question-sub'],
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
                'question-sub' =>  $quizQuestion['question-sub'],
                'return' => 'Você errou!',
                'response_correct' =>  $quizQuestion['resposta'],
                'response_check' =>  $quizQuestion['check_resposta'],
                'key_check' =>  convertNumberString($quizQuestion['check_key']),
                'key' =>  convertNumberString($quizQuestion['key']),
                'img' =>  $quizQuestion['img']
            ]);
        }

        
        if (session()->has('endQuest')) {

            session()->set('endQuest', $quizQuestion['position']);
        } else {
            session()->set('endQuest', $quizQuestion['position']);
        }

        return redirect()->to('quiz/' . $quizQuestion['position']);
    }
    
      
    /**
     * Method restart
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function restart(): \CodeIgniter\HTTP\RedirectResponse
    {
        session()->destroy();

        return redirect()->to('/quiz');
    }
}
