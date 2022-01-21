<?php

namespace App\Models;

use CodeIgniter\Model;

class WorldModel extends Model
{
    public function getById(string $id): array
    {

        $jsonString = file_get_contents(APPPATH . 'Base/category-world.json');

        $dataCategory = json_decode($jsonString, true);

        $dataWord = [];

        foreach ($dataCategory as $item) {
            if ($item['id'] === $id) {
                $dataWord['id'] = $item['id'];
                $dataWord['category'] = $item['category'];
                $dataWord['title'] = $item['title'];
                $dataWord['resume'] = $item['resume'];
                $dataWord['text'] = $item['text'];
                $dataWord['text-second'] = $item['text-second'];
                $dataWord['quote'] = $item['quote'];
                $dataWord['quote-author'] = $item['quote-author'];
                $dataWord['link-video'] = $item['link-video'];
                $dataWord['title-video'] = $item['title-video'];
                $dataWord['text-video'] = $item['text-video'];
                $dataWord['font'] = $item['font'];
                break;
            }
        }
        return $dataWord;
    }
}
