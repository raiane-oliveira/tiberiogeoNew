<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{    
    /**
     * updateArticle
     *
     * @param  string $dados
     * @param  string $category
     * @return void
     */
    public function updateArticle(array $dados, string $category):void{

        $article = json_encode($dados, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        file_put_contents(APPPATH. 'Base/category-' . $category . '.json', $article);
        
    }

    public function getArticle ($article, $category){
        $jsonString = file_get_contents(APPPATH. 'Base/category-'.$category.'.json');
        $dataCategory = json_decode($jsonString, true); 

        $dataArticle = [];

        foreach ($dataCategory as $key => $dados) {
            if ($dados['slug'] == $article) {
                $dataArticle['title'] = $dados['title'];
                $dataArticle['category'] = $dados['category'];
                $dataArticle['date'] = $dados['date'];
                //$dataArticle['image-main'] = $dados['image-main'];
                $dataArticle['resume'] = $dados['resume'];
                $dataArticle['text'] = $dados['text'];
                $dataArticle['textSecond'] = $dados['text-second'];
                //$dataArticle['image-text-second'] = $dados['image-text-second'];
                //$dataArticle['quote'] = $dados['quote'];
                //$dataArticle['quote-author'] = $dados['quote-author'];
                //$dataArticle['image-video'] = $dados['image-video'];
                //$dataArticle['link-video'] = $dados['link-video'];
                //$dataArticle['title-video'] = $dados['title-video'];
                //$dataArticle['text-video'] = $dados['text-video'];
                //$dataArticle['image-gallery'] = $dados['image-gallery'];
                $dataArticle['font'] = $dados['font'];
                //$dataCategory[$key]['access'] = $dados['access'] + 1;
                //$dataArticle['access'] = $dados['access'] + 1;
                break;
            }
        } 
        return $dataArticle;
    }

        
    /**
     * getById
     *
     * @param  mixed $id
     * @param  mixed $category
     * @return array
     */
    public function getById(string $id, string $category): array
    {
        $jsonString = file_get_contents(APPPATH. 'Base/category-'.$category.'.json');                
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
                $data['image-video'] = $item['image-video'];
                $data['font'] = $item['font'];
                break;
            }
        }
        return $data;
        
    }
}