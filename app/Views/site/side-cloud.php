<div class="ts-grid-box widgets tag-list">
    <h3 class="widget-title">Tags</h3>

    <?php
    $cloudWord = [
        'Água', 'Clima', 'Brasil', 'Planeta','Geografia','Geopolítica',
        'Fuso','Mundo','Crise','Ucrânia','OTAN','Mundo','Solos','Atmosfera'
    ];   

    $cloudWords = shuffle($cloudWord);   

    ?>
    <ul>
        <?php
        array_map(function($word){
            echo '<li class="p-1">'.anchor('/search/'.$word,$word).'</li>';
        },$cloudWord);
        ?>        
       
    </ul>
</div>