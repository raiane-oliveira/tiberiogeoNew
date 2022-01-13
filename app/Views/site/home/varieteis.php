<section class="block-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ts-grid-box category-item">
                <div class="ts-title-item clearfix">
                    <h2 class="ts-cat-title float-left">
                        <span>Variedades</span>
                    </h2><div class="float-right">
                        <?=anchor('/category/variety',"+ mais", ['class'=>'view-all-link']);?>                       
                    </div>
                </div>
                    <div class="row">
                    <?php
                    $count = 1;
                    foreach ($dataCuriosity as $item) :
                        if ($count <= 4) :
                    ?>
                        <div class="col-lg-3">
                            <div class="item">
                                <div class="ts-post-thumb"><a href="#">
                                <?php
                                        $image = [
                                            'src' => base_url() . '/assets/img/' . $item['category'] . '/' . $item['image-main'],
                                            'class' => 'img-fluid',
                                        ];
                                        echo anchorArticle($item['category'], $item['title'], img($image)); ?>

                            </div>
                                <div class="post-content">
                                    <h3 class="post-title">
                                    <?= anchorArticle($item['category'], $item['title'], $item['title']); ?>
                                    </h3><span class="post-date-info"><i class="fa fa-clock-o"></i> March 21, 2019</span>
                                </div>
                            </div>
                        </div><!-- col end-->
                        
                        <?php endif;
                        $count++;
                    endforeach; ?> </div><!-- row end-->
                </div>

            </div>
        </div>
    </div>
</section>
