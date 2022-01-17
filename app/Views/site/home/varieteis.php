<section class="block-wrapper p-30 section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ts-title-item clearfix">
                    <h2 class="ts-cat-title float-left"><span>Variedades</span></h2>
                    <div class="float-right">
                        <?= anchor('/category/variety', '+ mais', ['class' => 'view-all-link']); ?>
                    </div>
                </div>
                <div class="row ts-col-list-post">
                    <?php
                    $count = 1;
                    foreach ($dataVariety as $item) :
                        if ($count <= 4) :
                    ?>
                            <div class="col-lg-3 col-md-6 mb-30">
                                <div class="ts-grid-box ts-grid-content">

                                    <div class="ts-post-thumb"><a href="#">
                                            <?php
                                            $image = [
                                                'src' => base_url() . '/assets/img/' . $item['category'] . '/' . $item['image-main'],
                                                'class' => 'img-fluid',
                                            ];
                                            echo anchorArticle($item['category'], $item['title'], img($image)); ?>

                                    </div>
                                    <div class="post-content" style="height:100px">
                                        <h3 class="post-title">
                                            <?= anchorArticle($item['category'], $item['title'], $item['title']); ?>
                                        </h3><span class="post-date-info"><i class="fa fa-clock-o"></i> <?= toDatePost($item['date']); ?></span>
                                    </div>
                                </div><!-- ts grid box-->
                            </div><!-- col end-->
                    <?php endif;
                        $count++;
                    endforeach; ?>
                </div>
            </div>
            
        </div>
    </div><!-- row end-->
</section>
