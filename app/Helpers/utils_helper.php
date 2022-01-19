<?php


function toDataBr($data): String
{
    if ($data == null) {
        return '--';
    }
    $data = explode("-", $data);
    return $data[2] . "/" . $data[1] . "/" . $data[0];
}


/**
 * toDateMsql
 *
 * @param  string $data
 * @return string
 */
function toDateMsql(string $data): string
{
    if (!empty($data)) {
        $data = explode("/", $data);
        return $dataAtendimento = $data[2] . "-" . $data[1] . "-" . $data[0];
    }
    return NULL;
}

/**
 * toDatePost
 *
 * @param  string $date
 * @return string
 */
function toDatePost(string $date): string
{   $nDate = toDateMsql($date);
    return strftime('%d de %B, %Y', strtotime($nDate));
    //return $date;    
    /*if ($date == null)
        return '--';

    $date = explode("/", $date);
    $jd = gregoriantojd($date[1], $date[0], $date[2]);
    return  jdmonthname($jd, CAL_MONTH_GREGORIAN_LONG) . " " . $date[0] . ", " . $date[2];*/
}

/**
 * toCategory
 *
 * @param  string $category
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


/**
 * firstUppercase
 *
 * @param  string $string
 * @return string
 */
function firstUppercase (string $string): string
{
    $s = mb_strtoupper(mb_substr($string,0,1));
    return $s.mb_strtolower(mb_substr($string,1));

}

/**
 * firstCapitulate
 *
 * @param  string $string
 * @return string
 */
function firstCapitulate(string $string): string
{
    $stringCapitulate = mb_strtoupper(mb_substr($string,3,1));   
    return '<span class="tie-dropcap">'.$stringCapitulate.'</span><p>'.mb_substr($string,4);
}

/**
 * generateId
 *
 * @param  int $tamanho
 * @param  bool $maiusculas
 * @param  bool $minusculas
 * @param  bool $numeros
 * @param  bool $simbolos
 * @return string
 */
function generateId(int $tamanho = null, bool $maiusculas = null, bool $minusculas = null, bool $numeros, bool $simbolos = null):string
{
    $senha = '';
    $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
    $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
    $nu = "123456789012345"; // $nu contem os números
    $si = "!@#$%¨&*()_+="; // $si contem os símbolos

    if ($maiusculas)
    {
        // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($ma);
    }

    if ($minusculas)
    {
        // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($mi);
    }

    if ($numeros)
    {
        // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($nu);
    }

    if ($simbolos)
    {
        // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($si);
    }

    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
    return date('YmdHis').substr(str_shuffle($senha), 0, $tamanho);
}
