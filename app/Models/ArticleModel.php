<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class ArticleModel extends Model
{
    /**
     * [Description for getArticleTitle]
     *
     * @param string $category
     * @param string $article
     * 
     * @return array
     * 
     */
    public function getArticleTitle(string $category, string $article): array
    {
        $data = [];

        try {

            $jsonString = file_get_contents(APPPATH . 'Base/category-' . $category . '.json');
            $dataCategory = json_decode($jsonString, true);
            //shuffle($dataCategory);            
            //dd($dataCategory);
            foreach ($dataCategory as $item) {
                if ($item['slug'] === $article) {
                    $data['error'] = false;
                    $data['message'] = '';
                    $data['id'] = $item['id'];
                    $data['slug'] = $item['slug'];
                    $data['category'] = $item['category'];
                    $data['title'] = $item['title'];
                    $data['resume'] = $item['resume'];
                    $data['font'] = $item['font'];
                    $data['date'] = $item['date'];
                    $data['access'] = $item['access'];
                    $data['image-main'] = $item['image-main'];
                    $data['text'] = $item['text'];
                    $data['text-second'] = $item['text-second'];
                    $data['quote'] = $item['quote'];
                    $data['quote-author'] = $item['quote-author'];
                    $data['link-video'] = $item['link-video'];
                    $data['title-video'] = $item['title-video'];
                    $data['text-video'] = $item['text-video'];
                    $data['image-video'] = $item['image-video'];
                    $data['image-gallery'] = $item['image-gallery'];
                    $data['image-text-second'] = $item['image-text-second'];
                    break;
                }
                $data['error'] = true;
                $data['message'] = 'Artigo não encontrado!';
            }
            return $data;
        } catch (Exception $e) {
            $data['error'] = true;
            $data['message'] = "Erro genérico";
            return $data;
        }
    }

   
    /**
     * [Description for updateAccesArticle]
     *
     * @param string $id
     * @param string $category
     * 
     * @return array
     * 
     */
    public function updateAccesArticle(string $id, string $category): array
    {
        $data = [];
        try {

            $jsonString = file_get_contents(APPPATH . 'Base/category-' . $category . '.json');
            $dataCategory = json_decode($jsonString, true);

            foreach ($dataCategory as $key => $dados) {
                if ($dados['id'] === $id) {
                    $dataCategory[$key]['access'] = $dados['access'] + 1;
                    break;
                }
            }

            $article = json_encode($dataCategory, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            file_put_contents(APPPATH . 'Base/category-' . $category . '.json', $article);
            $data['error'] = false;
            $data['message'] = '';
            return $data;
        } catch (Exception $e) {
            $data['error'] = true;
            $data['message'] = $e->getMessage();
            return $data;
        }
    }

    /**
     * [Description for updateArticle]
     *
     * @param array $dados
     * @param string $category
     * 
     * @return void
     * 
     */
    public function updateArticle(array $dados, string $category): void
    {

        $article = json_encode($dados, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        file_put_contents(APPPATH . 'Base/category-' . $category . '.json', $article);
    }

    /**
     * [Description for getArticle]
     *
     * @param string $article
     * @param string $category
     * 
     * @return array
     * 
     */
    public function getArticle(string $article, string $category): array
    {


        $jsonString = file_get_contents(APPPATH . 'Base/category-' . $category . '.json');
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
     * [Description for getById]
     *
     * @param string $id
     * @param string $category
     * 
     * @return array
     * 
     */
    public function getById(string $id, string $category): array
    {
        $data = [];

        try {

            $jsonString = file_get_contents(APPPATH . 'Base/category-' . $category . '.json');

            $dataCategory = json_decode($jsonString, true);


            foreach ($dataCategory as $item) {
                if ($item['id'] === $id) {
                    $data['error'] = false;
                    $data['message'] = '';
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
                    $data['image-gallery'] = $item['image-gallery'];
                    $data['font'] = $item['font'];
                    break;
                }
                $data['error'] = true;
                $data['message'] = 'Artigo não encontrado!';
            }
            return $data;
        } catch (Exception $e) {

            $data['error'] = true;
            $data['message'] = $e->getMessage();
            return $data;
        }
    }

    /**
     * [Description for getOtherArticle]
     *
     * @param string $article
     * @param string $category
     * 
     * @return array
     * 
     */
    public function getOtherArticle(string $article, string $category): array
    {
        $data = [];

        try {

            $jsonString = file_get_contents(APPPATH . 'Base/category-' . $category . '.json');
            $dataCategory = json_decode($jsonString, true);
            shuffle($dataCategory);

            foreach ($dataCategory as $item) {
                if ($item['slug'] !== $article) {
                    $data['error'] = false;
                    $data['message'] = '';
                    $data['id'] = $item['id'];
                    $data['slug'] = $item['slug'];
                    $data['category'] = $item['category'];
                    $data['title'] = $item['title'];
                    break;
                }
                $data['error'] = true;
                $data['message'] = 'Artigo não encontrado!';
            }
            return $data;
        } catch (Exception $e) {
            $data['error'] = true;
            $data['message'] = $e->getMessage();
            return $data;
        }
    }
}
