<?php

namespace App\Models;

use CodeIgniter\Model;

class BrazilModel extends Model
{

    public function getById(string $id): array
    {
        $jsonString = file_get_contents(APPPATH . 'Base/category-brazil.json');
        $dataCategory = json_decode($jsonString, true);

        $data = [];
        foreach ($dataCategory as $item) {
            if ($item['id'] === $id) {
                $data['id'] = $item['id'];
                $data['category'] = $item['category'];
                $data['title'] = $item['title'];
                $data['resume'] = $item['resume'];
                $data['text'] = $item['text'];
                $data['text-second'] = $item['text-second'];
                $data['quote'] = $item['quote'];
                $data['quote-author'] = $item['quote-author'];
                $data['link-video'] = $item['link-video'];
                $data['title-video'] = $item['title-video'];
                $data['text-video'] = $item['text-video'];
                $data['font'] = $item['font'];
                break;
            }
        }
        return $data;
    }

}
