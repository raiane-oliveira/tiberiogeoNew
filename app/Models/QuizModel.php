<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    private $jsonString;

    public function __construct()
    {
        
        $this->jsonString = file_get_contents(defineUrlDb().'quiz.json');
    }

    public function getAll()
    {
        $dataQuiz = json_decode($this->jsonString, true);
        return $dataQuiz;
    }

    public function getCount()
    {
        return count(json_decode($this->jsonString, true));   

    }

    public function getByPosition(int $position)
    {
        $dataQuiz = json_decode($this->jsonString, true);

        $data = [];
        $d = [];
        foreach ($dataQuiz as $item) {

            if ($item['position'] === $position) {
                
                $data['position'] = $item['position'];
                $data['id'] = $item['id'];
                $data['question'] = $item['question'];                
               
                foreach($item['alternatives'] as $ps){
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

    public function getById(string $id, string $idAlternative)
    {
        
        $dataQuiz = json_decode($this->jsonString, true);

        $data = [];
        $data['status'] = false;

        foreach ($dataQuiz as $item) {

            if ($item['id'] === $id) {
                
                foreach($item['alternatives'] as $alternative) {      

                    if ($alternative['id'] == $idAlternative && $alternative['correct'] == true ) {
                    
                        $data['status'] = true;
                        $data['resposta'] = $alternative['alternative'];
                        
                        break;

                    } else {
                        if($alternative['correct'] == true) {
                            $data['resposta'] = $alternative['alternative'];
                        }
                    }               
                    
                }
                $data['position'] = $item['position'];
                $data['question'] = $item['question'];
                break;                
            }
        }
        return $data;
    }
}
