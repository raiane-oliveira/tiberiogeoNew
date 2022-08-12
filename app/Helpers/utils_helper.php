<?php

use App\Controllers\Category;

/**
 * [Description for toDataBr]
 *
 * @param string $data
 * 
 * @return String
 * 
 */
function toDataBr(string $data): String
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
 * [Description for toDatePost]
 *
 * @param string $date
 * 
 * @return string
 * 
 */
function toDatePost(string $date): string
{
    $nDate = toDateMsql($date);
    return strftime('%d de %B, %Y', strtotime($nDate));
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
        case 'variety';
            return 'VARIEDADES';
        case 'curiosity';
            return 'CURIOSIDADES';
        default:
            return 'INDEFINIDO';
    }
}

/**
 * Method defineColorCategory
 *
 * @param $category $category [explicite description]
 *
 * @return string
 */
function defineColorCategory($category): string
{
    switch ($category) {
        case 'world':
            return '#ff6e0d';
        case 'brazil':
            return '#007dff';
        case 'geography';
            return '#4ab106';
        case 'variety';
            return '#2c2c2c';
        case 'curiosity';
            return '#ab1129';
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

    $dados = "";

    $color = "blue-light";

    if ($category == 'world') :
        $color = "orange";
    endif;
    if ($category == 'brazil') :
        $color = "blue";
    endif;
    if ($category == 'geography') :
        $color = "green";
    endif;
    if ($category == 'variety') :
        $color = "black";
    endif;
    if ($category == 'curiosity') :
        $color = "bordo";
    endif;


    if ($style) :
        $dados = [
            'class' => 'post-cat ts-' . $color . '-bg'
        ];
    else :
        $dados = [
            'class' => 'ts-' . $color . '-bg p-1 text-white font-weight-bold',

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
function anchorArticle(string $category, string $article, string $title = null): string
{
    $titleEnd = $title;
    return anchor('article/' . $category . '/' . $article, $titleEnd);
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
    return  '<blockquote>' . $quote . ' <cite>' . $quoteAuthor . '</cite></blockquote>';
}

/**
 * Method defineSocial
 *
 * @param string $name [explicite description]
 * @param string $slug [explicite description]
 * @param bool $title [explicite description]
 *
 * @return string
 */
function defineSocial(string $name, string $slug, bool $title = null): string
{
    if (!$title) {
        return anchor('https://www.' . $name . '.com/' . $slug, '<i class="fa fa-' . $name . '"></i>', ['target' => '_blank']);
    }
    return anchor('https://www.' . $name . '.com/' . $slug, '<i class="fa fa-' . $name . '"></i><span>' . $name . '</span>', ['target' => '_blank']);
}

/**
 * firstUppercase
 *
 * @param  string $string
 * @return string
 */
function firstUppercase(string $string): string
{
    $s = mb_strtoupper(mb_substr($string, 0, 1));
    return $s . mb_strtolower(mb_substr($string, 1));
}

/**
 * firstCapitulate
 *
 * @param  string $string
 * @return string
 */
function firstCapitulate(string $string): string
{
    $stringCapitulate = mb_strtoupper(mb_substr($string, 3, 1));
    return '<span class="tie-dropcap">' . $stringCapitulate . '</span><p>' . mb_substr($string, 4);
}


/**
 * [Description for generateId]
 *
 * @param int|null $tamanho
 * @param bool|null $maiusculas
 * @param bool|null $minusculas
 * @param bool $numeros
 * @param bool|null $simbolos
 * 
 * @return string
 * 
 */
function generateId(int $tamanho = null, bool $maiusculas = null, bool $minusculas = null, bool $numeros, bool $simbolos = null): string
{
    $senha = '';
    $ma = "ABCDEFGHIJKLMNOPQRSTUVYXWZ"; // $ma contem as letras maiúsculas
    $mi = "abcdefghijklmnopqrstuvyxwz"; // $mi contem as letras minusculas
    $nu = "123456789012345"; // $nu contem os números
    $si = "!@#$%¨&*()_+="; // $si contem os símbolos

    if ($maiusculas) {
        // se $maiusculas for "true", a variável $ma é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($ma);
    }

    if ($minusculas) {
        // se $minusculas for "true", a variável $mi é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($mi);
    }

    if ($numeros) {
        // se $numeros for "true", a variável $nu é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($nu);
    }

    if ($simbolos) {
        // se $simbolos for "true", a variável $si é embaralhada e adicionada para a variável $senha
        $senha .= str_shuffle($si);
    }

    // retorna a senha embaralhada com "str_shuffle" com o tamanho definido pela variável $tamanho
    return date('YmdHis') . substr(str_shuffle($senha), 0, $tamanho);
}



/**
 * [Description for createImageGallery]
 *
 * @param string $images
 * @param string $title
 * 
 * @return string
 * 
 */
function createImageGallery(string $images, string $title): string
{

    if (empty($images)) {
        return "";
    }
    $img = "";

    if (substr($images, -1) === ';') {
        $images = substr($images, 0, -1);
    }
    $image = explode(';', str_replace(" ", "", $images));

    for ($i = 0; $i < count($image); $i++) {
        $img .= $title . '-' . $image[$i] . '.jpg;';
    }
    return $img;
}

/**
 * Method tratarImagemGallery
 *
 * @param string $img [explicite description]
 *
 * @return string
 */
function tratarImagemGallery(string $img): string
{
    $result = explode('.jpg;', $img);
    $result2 = '';
    for ($i = 0; $i < count($result) - 1; $i++) {

        $result2 .= substr($result[$i], -2, 2) . ';';
    }

    //$result3 = explode('-', $result2)


    return $result2;
}


/**
 * buildButtonListCategory
 *
 * @return string
 */
function buildButtonListCategory(): string
{

    $button = '<div class="dropdown-menu">' .
        anchor('/build/category/world', 'MUNDO', ['class' => 'dropdown-item']) .
        anchor('/build/category/brazil', 'BRASIL', ['class' => 'dropdown-item']) .
        anchor('/build/category/geography', 'GEOGRAFIA', ['class' => 'dropdown-item']) .
        anchor('/build/category/curiosity', 'CURIOSIDADES', ['class' => 'dropdown-item']) .
        anchor('/build/category/variety', 'VARIEDADES', ['class' => 'dropdown-item']) .
        '</div>';

    return $button;
}


/**
 * [Description for buildOptionCategory]
 *
 * @param string|null $category
 * 
 * @return string
 * 
 */
/**
 * Method buildOptionCategory
 *
 * @param string $category [explicite description]
 *
 * @return string
 */
function buildOptionCategory(string $category = null): string
{
    $options = "";
    $categories = new Category();
    $values = $categories->defineCategories();

    for ($i = 0; $i < count($values); $i++) {

        if (!empty($category) && $category !== $values[$i]) {
            $options .= '<option value="' . $values[$i] . '">' . toCategory($values[$i]) . '</option>';
        }
    }
    return $options;
}


function copyr(string $source, string $dest)
{
    // COPIA UM ARQUIVO
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // CRIA O DIRETÓRIO DE DESTINO
    if (!is_dir($dest)) {
        mkdir($dest);
        chmod($dest, 0777);
        echo "DIRET&Oacute;RIO $dest CRIADO<br />";
    }

    // FAZ LOOP DENTRO DA PASTA
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {

        // PULA "." e ".."
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // COPIA TUDO DENTRO DOS DIRETÓRIOS
        if ($dest !== "$source/$entry") {
            copyr("$source/$entry", "$dest/$entry");
            chmod("$dest/$entry", 0777);
            echo "COPIANDO $entry de $source para $dest <br />";
        }
    }

    $dir->close();
    return true;
}

/**
 * Method defineUrlDb
 *
 * @return void
 */
/**
 * Method defineUrlDb
 *
 * @return string
 */
function defineUrlDb(): string
{
    return APPPATH . 'Base/';
}

/**
 * Method tratarSentenca
 *
 * @param string $sentenca [explicite description]
 *
 * @return string
 */
function tratarSentenca(string $sentenca): string
{
    $string = explode(" ", $sentenca);
    return mb_strtolower(tratarPalavras($string[0]));
}

/**
 * Method writeZeroLeft
 *
 * @param Int $number [explicite description]
 *
 * @return void
 */
/**
 * Method writeZeroLeft
 *
 * @param Int $number [explicite description]
 *
 * @return string
 */
function writeZeroLeft(Int $number): string
{

    if ($number < 9) {
        return '0' . $number;
    }
    return $number;
}

/**
 * Method convertNumberString
 *
 * @param int $number [explicite description]
 *
 * @return string
 */
function convertNumberString(int $number): string
{

    switch ($number) {
        case 0:
            return 'a)';

        case 1:
            return 'b)';

        case 2:
            return 'c)';

        case 3:
            return 'd)';

        case 4:
            return 'e)';
    }
}

/**
 * Method defineEmotion
 *
 * @param int $num [explicite description]
 *
 * @return string
 */
function defineEmotion(int $num): string
{
    if ($num >= 80) {
        return '&#128516;';
    } else if ($num <= 70 && $num >= 40) {
        return '&#128558;';
    }
    return '&#128542;';
}


/**
 * Method tratarPalavras
 *
 * @param string $string [explicite description]
 *
 * @return string
 */
function tratarPalavras(string $string): string
{
    return preg_replace(array(
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
        "/(Ç)/"
    ), explode(" ", "a A e E i I o O u U n N C"), mb_strtoupper($string));
}

/**
 * Method removeCharacterSpecial
 *
 * @param string $string [explicite description]
 *
 * @return void
 */
function removeCharacterSpecial(string $string):string
{
    return preg_replace([
        '/(,|;|:)/'
    ], '', $string);
}
