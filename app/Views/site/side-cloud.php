<div class="ts-grid-box widgets tag-list">
    <h3 class="widget-title">Tags</h3>

    <?php
    $cloudWord = [
        'Água', 'Clima', 'Brasil', 'Planeta','Geografia','Geopolítica',
        'Fuso','Mundo','Crise'
    ];   

    ?>
    <ul>
        <?php
        array_map(function($word){
            echo '<li>'.anchor('/search/'.$word,$word).'</li>';
        },$cloudWord);
        ?>        
       
    </ul>
</div>