<div class="post-list-item widgets">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a class="active" href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-heart"></i> FAVORITOS</a></li>
            </ul><!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">
                    <?php
                    $count = 1;
                    foreach ($dataGeographyFavorite as $item) :
                        if ($count <= 6) :
                    ?>
                            <div class="post-content media">
                                <img class="d-flex sidebar-img" src="<?= base_url(); ?>/assets/img/<?= $item['category']; ?>/<?= $item['image-main']; ?>" alt="">
                                <div class="media-body">
                                    <span class="post-tag">
                                        <?= anchorCategory($item['category']); ?>
                                    </span>
                                    <h4 class="post-title">
                                        <?= anchorArticle($item['category'], $item['title'], $item['title']); ?>

                                    </h4>
                                </div>
                            </div>
                    <?php
                        endif;
                        $count++;
                    endforeach; ?>
                </div>
                <!--ts-grid-box end -->
            </div><!-- tab content end-->
        </div><!-- widgets end-->