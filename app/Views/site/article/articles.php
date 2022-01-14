<?= $this->extend('site/layout/default'); ?>

<?= $this->section('content') ?>
<!-- single post start -->
<section class="single-post-wrapper post-layout-10">
    <div class="container">
        <div class="row mb-30">
            <div class="col-lg-12">
                <div class="entry-header">
                    <?= anchorCategory($dataArticle['category'], true); ?>

                    <h2 class="post-title lg"><?= $dataArticle['title']; ?></h2>
                    <p><?= $dataArticle['resume']; ?></p>
                    <ul class="post-meta-info">
                        <li class="author"><a href="#"><strong>Fonte:</strong> <img src="<?= base_url(); ?>/assets/images/avater/logo-avater.png" alt=""><?= $dataArticle['font']; ?></a>
                        </li>
                        <li><i class="fa fa-clock-o"></i> <?= toDatePost($dataArticle['date']); ?></li>
                        <li class="active"><i class="el el-fire">Acessos: </i><?= $dataArticle['access']; ?></li>
                        <li class="share-post"><a href="#"><i class="fa fa-share"></i></a></li>
                    </ul>
                </div><!-- single post header end-->
                <div class="post-content-area">
                    <div class="single-big-img img-ovarlay" style="background-image: url(<?= base_url(); ?>/assets/img/<?= $dataArticle['category']; ?>/<?= $dataArticle['image-main']; ?>)"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
            <ol class="breadcrumb">
                        <li><?=anchor('/','<i class="fa fa-home"></i> HOME');?></li>
                        <li><?=anchorCategory($dataArticle['category'], false);?>
                        <li><?=$dataArticle['title'];?></li>
            </ol>
                <div class="ts-grid-box content-wrapper single-post">
                   
                    <div class="post-content-area">
                        <div class="entry-content">
                            <?= $dataArticle['text']; ?>
                            <?= createQuote($dataArticle['quote'], $dataArticle['quote-author']); ?>
                            <?php if ($dataArticle['image-text-second']) : ?>
                                <p><img class="float-left" src="<?= base_url(); ?>/assets/img/<?= $category; ?>/<?= $dataArticle['image-text-second']; ?>" alt=""></p>
                            <?php endif; ?>
                            <p><?= $dataArticle['text-second']; ?></p>
                            <div class="clearfix"></div>

                            <?php
                            if ($dataArticle['image-gallery']) : ?>
                                <div class="gallery-img">
                                    <?php
                                    $imageGallery = explode('; ', trim($dataArticle['image-gallery']));

                                    for ($i = 0; $i < count($imageGallery); $i++) : ?>
                                        <a href="<?= base_url(); ?>/assets/img/<?= $category; ?>/<?= $imageGallery[$i]; ?>" class="gallery-popup">
                                            <img src="<?= base_url(); ?>/assets/img/<?= $category; ?>/<?= $imageGallery[$i]; ?>" alt="">
                                        </a>
                                    <?php endfor; ?>
                                </div>
                            <?php endif;
                            if ($dataArticle['image-video']) : ?>

                                <div class="post-video">
                                    <img class="img-fluid" src="<?= base_url(); ?>/assets/img/<?= $category; ?>/<?= $dataArticle['image-video']; ?>" alt="">
                                    <div class="post-video-content">
                                        <a href="<?= $dataArticle['link-video']; ?>" class="ts-play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                        <h3><a href=""><?= $dataArticle['title-video']; ?></a></h3>
                                    </div>
                                </div>

                                <p><?= $dataArticle['text-video']; ?></p>
                            <?php endif;  ?>

                        </div><!-- entry content end-->
                    </div><!-- post content area-->

                </div>
                <!--single post end -->


            </div><!-- col end -->
            <?= view('site/side'); ?>

            <!-- col end-->
        </div><!-- row end-->
    </div><!-- container-->
</section><!-- single post end-->

<!-- newslater start -->
<?= $this->endSection(); ?>