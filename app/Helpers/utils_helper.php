<?php

use function PHPUnit\Framework\returnSelf;

function toDataBr($data): String
{
    if ($data == null) {
        return '--';
    }
    $data = explode("-", $data);
    return $data[2] . "/" . $data[1] . "/" . $data[0];
}

function toDataMsql($data)
{
    if (!empty($data)) {
        $data = explode("/", $data);
        return $dataAtendimento = $data[2] . "-" . $data[1] . "-" . $data[0];
    }
    return NULL;
}

function toDatePost(string $date): string
{
    if ($date == null)
        return '--';

    $date = explode("/", $date);
    $jd = gregoriantojd($date[1], $date[0], $date[2]);
    return  jdmonthname($jd, 1) . " " . $date[0] . ", " . $date[2];
}

/**
 * toCategory
 *
 * @param  mixed $category
 * @return string
 */
function toCategory(string $category): string
{
    switch ($category) {
        case 'world':
            return 'MUNDO';
        case 'brazil':
            return 'BRASIL';
        case 'geography';
            return 'GEOGRAFIA';
        default:
            return 'INDEFINIDO';
    }
}

/**
 * createSlug
 *
 * @param  mixed $title
 * @return string
 */
function createSlug(string $title): string
{
    return str_replace(' ', '-', preg_replace(array(
        "/(á|à|ã|â|ä)/",
        "/(Á|À|Ã|Â|Ä)/",
        "/(é|è|ê|ë)/",
        "/(É|È|Ê|Ë)/",
        "/(í|ì|î|ï)/",
        "/(Í|Ì|Î|Ï)/",
        "/(ó|ò|õ|ô|ö)/",
        "/(Ó|Ò|Õ|Ô|Ö)/",
        "/(ú|ù|û|ü)/",
        "/(Ú|Ù|Û|Ü)/",
        "/(ñ)/",
        "/(Ñ)/",
        "/(Ç)/",
        "/(ç)/"
    ), explode(" ", "a A e E i I o O u U n N C c"), mb_strtolower($title)));
}



/**
 * anchorCategory
 *
 * @param  string $category
 * @param  bool $style
 * @return string
 */
function anchorCategory(string $category, bool $style = false): string
{   
    $color = "";
    $dados = "";
    if($category == 'world'):
        $color = "orange";
    elseif($category == 'brazil'):
        $color = "blue";    
    else:
           $color = "green";
    endif; 

    if($style):
        $dados = [
            'class' => 'post-cat ts-'.$color.'-bg'
        ];
    else:
        $dados = [
            'class' => $color.'-color'
        ];
    endif;

    return anchor('/category/' . $category, toCategory($category), $dados);
}

/**
 * anchorArticle
 *
 * @param  string $category
 * @param  string $article
 * @return string
 */
function anchorArticle(string $category, string $article, string $title = null):string
{
    $titleEnd = $title;
    return anchor('article/' . $category . '/' . createSlug($article), $titleEnd);
}

/**
 * createQuote
 *
 * @param  string $quote
 * @param  string $quoteAuthor
 * @return string
 */
function createQuote(string $quote, string $quoteAuthor): string
{    
    return  '<blockquote>'.$quote.' <cite>'.$quoteAuthor.'</cite></blockquote>';
}

function defineSocial(string $name, string $slug, bool $title = null):string
{
    if(!$title){
        return anchor('https://www.'.$name.'.com/'.$slug,'<i class="fa fa-'.$name.'"></i>', ['target'=>'_blank']);
    }
     return anchor('https://www.'.$name.'.com/'.$slug,'<i class="fa fa-'.$name.'"></i><span>'.$name.'</span>', ['target'=>'_blank']);
    
}
