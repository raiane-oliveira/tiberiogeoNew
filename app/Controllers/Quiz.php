<?php

namespace App\Controllers;

use App\Models\VarietyModel;
use App\Models\CuriosityModel;
use App\Controllers\BaseController;
use App\Models\QuizModel;

class Quiz extends BaseController
{

    public function index(int $position = 0)
    {
        $sum = 1;
        session()->set('position', $position + $sum);
        $ps = session('position');

        $page = 'site/quiz/quiz';

        $quiz = new QuizModel();
        $quizQuestion = $quiz->getByPosition($ps);
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
            "totalQuizzes" => $quiz->getCount()
        ];


        $parser = \Config\Services::renderer();
        $parser->setData($this->style);
        $parser->setData($data);
        $parser->setData($this->dataHeader);
        $parser->setData($this->javascript);
        return $parser->render($page);
    }

    public function sendQuestion()
    {

        $idQuestion = $this->request->getPost('idQuestion');
        $idAlternative = $this->request->getPost('alternative');


        $quiz = new QuizModel();
        $quizQuestion = $quiz->getById($idQuestion, $idAlternative);

        if ($quizQuestion['status']) {
            session()->set(
                [
                    'message' => '<h4>PARABÉNS! Resposta correta!</h4> <strong>Resposta :: </strong>' . $quizQuestion['resposta'] ,
                    'position' => $quizQuestion['position'],
                    'status' => 'success'
                ],

            );
        } else {
            session()->set([
                'message' => '<h4>Ops! Que pena, você errou! A resposta correta é:</h4><strong>Resposta :: </strong>' . $quizQuestion['resposta'],
                'position' => $quizQuestion['position'],
                'status' => 'danger'
            ]);
        }

        return redirect()->to('/quiz');
    }
}
