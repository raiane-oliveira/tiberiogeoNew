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

    public function getById(string $id, string $idAlternative)
    {
        
        $dataQuiz = json_decode($this->jsonString, true);

        $data = [];
        $data['status'] = false;

        $resposta = false;

        foreach ($dataQuiz as $item) {

            if ($item['id'] === $id) {
                
                foreach($item['alternatives'] as $alternative) {      

                    if ($alternative['id'] == $idAlternative && $alternative['correct'] == true ) {
                    
                        $data['status'] = true;
                        
                        break;

                    } else {
                        if($alternative['correct'] == true) {
                            $data['resposta'] = $alternative['alternative'];
                        }
                    }
                    
                    
                    //dd('é diferente');
                    //return 'ERROR! A Resposta correta é: xxxx'  ; 
                    
                }
                
                break;
                
            }
        }
        return $data;
    }
}
