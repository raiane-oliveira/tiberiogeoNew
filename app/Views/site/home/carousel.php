<div class="col-lg-8 col-md-12">
    <div id="featured-slider" class="owl-carousel ts-overlay-style ts-featured">

        <div class="item" style="background-image:url(<?= base_url(); ?>/assets/img/world/<?= $dataWorld['slug']; ?>/<?= $dataWorld['image-main']; ?>)">
            <?= anchorCategory($dataWorld['category'], true); ?>
            <?php //anchor('category/' . $dataWorld['category'], toCategory($dataWorld['category']), array('class' => 'post-cat ts-orange-bg')); 
            ?>
            <div class="overlay-post-content">
                <div class="post-content">
                    <h2 class="post-title lg">
                        <?= anchorArticle($dataWorld['category'], $dataWorld['slug'], $dataWorld['title']); ?>

                    </h2>
                    <p class="text-white"><?= $dataWorld['resume']; ?></p>
                    <ul class="post-meta-info">
                        <li class="author">
                            <?php
                            $image = [
                                'src' => base_url() . '/assets/images/avater/logo-avater.png',
                            ];
                            echo anchor('/', img($image) . 'Tiberiogeo'); ?>
                        </li>
                        <li><i class="fa fa-clock-o"></i> <?= toDatePost($dataWorld['date']); ?></li>

                    </ul>
                </div>
            </div>
            <!--/ Featured post end -->
        </div>
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
    </div>
    <!-- Featured owl carousel end-->
</div>