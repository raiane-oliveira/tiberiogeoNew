 <div class="ts-breaking-news clearfix">
    <h2 class="breaking-title float-left"><i class="fa fa-bolt"></i>Breaking News :</h2>
    <div class="breaking-news-content owl-carousel float-left" id="breaking_slider">
       <div class="breaking-post-content">
          <p><a href="#">Netcix cuts out the chill with an integrated personal trainer on running.</a></p>
       </div>
       <div class="breaking-post-content">
          <p><a href="#">Parquet Courts on Resisting Nihilism & Why Tourism in Dubai is booming the world.</a></p>
       </div>
       <div class="breaking-post-content">
          <p><a href="#">Parquet Courts on Resisting Nihilism & Why Tourism in Dubai is booming the world.</a></p>
       </div>
    </div>
 </div>
 <!--nav top end-->


 <!-- Item 1 end -->
 <div class="item" style="background-image:url(<?= base_url(); ?>/assets/img/brazil/<?= $dataBrazil['slug']; ?>/<?= $dataBrazil['image-main']; ?>)">

    <?= anchorCategory($dataBrazil['category'], true); ?>

    <div class="overlay-post-content">
       <div class="post-content">
          <h2 class="post-title lg">
             <?= anchorArticle($dataBrazil['category'], $dataBrazil['slug'], $dataBrazil['title']); ?>
          </h2>
          <p class="text-white"><?= $dataBrazil['resume']; ?></p>
          <ul class="post-meta-info">
             <li class="author">
                <?php
                  $image = [
                     'src' => base_url() . '/assets/images/avater/logo-avater.png',
                  ];
                  echo anchor('/', img($image) . 'Tiberiogeo'); ?>
             </li>
             <li><i class="fa fa-clock-o"></i> <?= toDatePost($dataBrazil['date']); ?></li>
          </ul>
       </div>
    </div>
    <!--/ Featured post end -->
 </div>
 <!-- Item 2 end -->
 <div class="item" style="background-image:url(<?= base_url(); ?>/assets/img/geography/<?= $dataGeography['slug']; ?>/<?= $dataGeography['image-main']; ?>)">

    <?= anchorCategory($dataGeography['category'], true); ?>

    <div class="overlay-post-content">
       <div class="post-content">
          <h2 class="post-title lg">
             <?= anchorArticle($dataGeography['category'], $dataGeography['slug'], $dataGeography['title']); ?>
          </h2>
          <p class="text-white"><?= $dataGeography['resume']; ?></p>
          <ul class="post-meta-info">
             <li class="author">
                <?php
                  $image = [
                     'src' => base_url() . '/assets/images/avater/logo-avater.png',
                  ];
                  echo anchor('/', img($image) . 'Tiberiogeo'); ?>
             </li>
             <li><i class="fa fa-clock-o"></i> <?= toDatePost($dataGeography['date']); ?></li>
          </ul>
       </div>
    </div>
    <!--/ Featured post end -->
 </div>
 <!-- Item 3 end -->