<div class="ts-grid-box widgets category-widget">
    <h2 class="widget-title">Categorias</h2>
    <ul class="category-list">
        <li><?= anchor('/category/world', 'MUNDO <span class="ts-orange-bg">' . count($dataMenuWorld) . '</span>'); ?></li>
        <li><?= anchor('/category/brazil', 'BRASIL <span class="ts-blue-bg">' . count($dataMenuBrazil) . '</span>'); ?></li>
        <li><?= anchor('/category/geography', 'GEOGRAFIA <span class="ts-green-bg">' . count($dataMenuGeography) . '</span>'); ?></li>
    </ul>
</div><!-- widgets end-->