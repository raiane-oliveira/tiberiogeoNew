<div class="ts-grid-box widgets tag-list">

    <?php

    use App\Controllers\Category;

    $categories = new Category();
    $values = $categories->defineCategories();

    shuffle($values);

    $cat = reset($values); ?>
    <h3 class="widget-title">Tags <span style="font-size: 11px; font-weight: bold;"><?= anchorCategory($cat); ?></span></h3>
    <?php
    $category = file_get_contents(defineUrlDb() . 'category-' . $cat . '.json');

    $jsonCategory = json_decode($category, true);

    $ab = [];
    //$cloudWord = [];
    $count = 1;
    echo '<ul>';
    foreach ($jsonCategory as $tag) {
         
        $a = explode(" ", $tag['title']);
        foreach ($a as $b) {
            if (strlen($b) > 4 && $count < 10) {
                $ab[] = $b;              
            }
        }
        $count++;

        //$cloudWord = tratarTagsCloud($tag['title']);
    }

    $ab =  array_unique($ab);
    
    shuffle($ab);


    foreach ($ab as $key => $item) {
        if ($key < 13) {
            echo '<li class="p-1">' . anchor('/search/' . $item, $item, ['onclick' => 'carregar()']) . '</li>';
        }
    }

    echo '</ul>';
    /*$cloudWord = [
        'Água', 'Clima', 'Brasil', 'Planeta', 'Geografia', 'Geopolítica',
        'Fuso', 'Mundo', 'Crise', 'Ucrânia', 'OTAN', 'Mundo', 'Solos', 'Atmosfera'
    ];*/

    //$cloudWords = shuffle($cloudWord);

    //echo end($cloudWords);
    //dd($cloudWord);

    ?>

</div>