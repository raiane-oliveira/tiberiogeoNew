<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    private $jsonString;
    
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct()
    {

        $this->jsonString = file_get_contents(defineUrlDb() . 'quiz.json');
    }
    
        
    /**
     * Method getAll
     *
     * @return array
     */
    public function getAll(): array
    {
        $dataQuiz = json_decode($this->jsonString, true);
        return $dataQuiz;
    }
    
    /**
     * Method getCount
     *
     * @return int
     */
    public function getCount(): int
    {
        return count(json_decode($this->jsonString, true));
    }
    
       
    /**
     * Method getByPosition
     *
     * @param int $position [explicite description]
     *
     * @return array
     */
    public function getByPosition(int $position): array
    {
        $dataQuiz = json_decode($this->jsonString, true);

        $data = [];
        $d = [];
        foreach ($dataQuiz as $item) {

            if ($item['position'] === $position) {

                $data['position'] = $item['position'];
                $data['id'] = $item['id'];
                $data['question'] = $item['question'];
                $data['question-sub'] = $item['question-sub'];

                foreach ($item['alternatives'] as $ps) {
                    $data['alternatives'][] = [
                        'id' => $ps['id'],
                        'alternative' => $ps['alternative'],
                        'correct' => $ps['correct']
                    ];
                }

                //$data['alternatives'] = $d;
                $data['status'] = $item['status'];
                $data['img'] = $item['img'];

                break;
            }
        }
        return $data;
    }
    
       
    /**
     * Method getById
     *
     * @param string $id [explicite description]
     * @param string $idAlternative [explicite description]
     *
     * @return array
     */
    public function getById(string $id, string $idAlternative): array
    {

        $dataQuiz = json_decode($this->jsonString, true);

        $data = [];
        $data['status'] = false;

        foreach ($dataQuiz as $item) {

            if ($item['id'] === $id) {

                foreach ($item['alternatives'] as $key => $alternative) {

                    if ($alternative['id'] == $idAlternative) {
                        
                        $data['check_resposta'] = $alternative['alternative'];
                        $data['check_key'] = $key;

                    }

                    if ($alternative['id'] == $idAlternative && $alternative['correct'] == true) {

                        $data['status'] = true;
                        $data['resposta'] = $alternative['alternative'];
                        $data['key'] = $key;

                        //break;
                    } else {

                        if ($alternative['correct'] == true) {
                            $data['resposta'] = $alternative['alternative'];
                            $data['key'] = $key;
                        }
                    }
                }
                $data['position'] = $item['position'];
                $data['question'] = $item['question'];
                $data['question-sub'] = $item['question-sub'];
                $data['img'] = $item['img'];
                break;
            }
        }

        return $data;
    }
    
}