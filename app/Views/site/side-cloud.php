<div class="ts-grid-box widgets tag-list">
    <h3 class="widget-title">Tags </h3>
    <?php
    echo '<ul>';
    foreach ($tagCloud as $key => $tag) {
        if ($key < 13) {
            echo '<li class="p-1">' . anchor('/search/' . $tag, $tag, ['onclick' => 'carregar()']) . '</li>';
        }
    }
    echo '</ul>';
    ?>
</div>