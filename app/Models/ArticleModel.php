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
}
