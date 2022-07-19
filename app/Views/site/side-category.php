<div class="ts-grid-box widgets category-widget">
    <h2 class="widget-title">Categorias</h2>
    <ul class="category-list">
        <li><?= anchor('/category/world', 'MUNDO <span class="ts-orange-bg">' . str_pad(count($dataMenuWorld), 2, '0', STR_PAD_LEFT). '</span>'); ?></li>
        <li><?= anchor('/category/brazil', 'BRASIL <span class="ts-blue-bg">' . str_pad(count($dataMenuBrazil), 2, '0', STR_PAD_LEFT) . '</span>'); ?></li>
        <li><?= anchor('/category/geography', 'GEOGRAFIA <span class="ts-green-bg">' . str_pad(count($dataMenuGeography), 2, '0', STR_PAD_LEFT) . '</span>'); ?></li>
        <li><?= anchor('/category/curiosity', 'CURIOSIDADES <span class="ts-bordo-bg">' . str_pad(count($dataCuriosity), 2, '0', STR_PAD_LEFT) . '</span>'); ?></li>
        <li><?= anchor('/category/variety', 'VARIEDADES <span class="ts-black-bg">' . str_pad(count($dataVariety), 2, '0', STR_PAD_LEFT). '</span>'); ?></li>
    </ul>
</div><!-- widgets end-->
