<div class="col-lg-8 col-md-12">
    <div id="featured-slider" class="owl-carousel ts-overlay-style ts-featured">

        <?php

        $atual = $dataCurrent;?>

        <!-- Item 1 end -->
        <div class="item" style="background-image:url(<?= base_url(); ?>/assets/img/<?=$atual['category'];?>/<?= $atual['slug']; ?>/<?= $atual['image-main']; ?>)">

            <?= anchorCategory($atual['category'], true); ?>

            <div class="overlay-post-content">
                <div class="post-content">
                    <h2 class="post-title lg">
                        <?= anchorArticle($atual['category'], $atual['slug'], $atual['title']); ?>
                    </h2>
                    <p class="text-white"><?= $atual['resume']; ?></p>
                    <ul class="post-meta-info">
                        <li class="author">
                            <?php
                            $image = [
                                'src' => base_url() . '/assets/images/avater/logo-avater.png',
                            ];
                            echo anchor('/', img($image) . 'Tiberiogeo'); ?>
                        </li>
                        <li><i class="fa fa-clock-o"></i> <?= toDatePost($atual['date']); ?></li>
                    </ul>
                </div>
            </div>
            <!--/ Featured post end -->
        </div>


        <?php
        $categories = [
            'world' => $dataWorld,
            'brazil' => $dataBrazil,
            'geography' => $dataGeography
        ];

        foreach ($categories as $category) :
            if ($category['category'] != $atual['category']) :
        ?>
                <div class="item" style="background-image:url(<?= base_url(); ?>/assets/img/<?= $category['category']; ?>/<?= $category['slug']; ?>/<?= $category['image-main']; ?>)">
                    <?= anchorCategory($category['category'], true); ?>
                    <?php //anchor('category/' . $dataWorld['category'], toCategory($dataWorld['category']), array('class' => 'post-cat ts-orange-bg')); 
                    ?>
                    <div class="overlay-post-content">
                        <div class="post-content">
                            <h2 class="post-title lg">
                                <?= anchorArticle($category['category'], $category['slug'], $category['title']); ?>

                            </h2>
                            <p class="text-white"><?= $category['resume']; ?></p>
                            <ul class="post-meta-info">
                                <li class="author">
                                    <?php
                                    $image = [
                                        'src' => base_url() . '/assets/images/avater/logo-avater.png',
                                    ];
                                    echo anchor('/', img($image) . 'Tiberiogeo'); ?>
                                </li>
                                <li><i class="fa fa-clock-o"></i> <?= toDatePost($category['date']); ?></li>

                            </ul>
                        </div>
                    </div>
                    <!--/ Featured post end -->
                </div>
        <?php endif;
        endforeach ?>

    </div>
    <!-- Featured owl carousel end-->
</div>