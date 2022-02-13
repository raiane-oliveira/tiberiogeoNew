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
                        <li class="author">
                            <strong>Fonte:</strong>
                            <img src="<?= base_url(); ?>/assets/images/avater/logo-avater.png" alt="">
                            <?= $dataArticle['font']; ?>
                        </li>
                        <li><i class="fa fa-clock-o"></i> <?= toDatePost($dataArticle['date']); ?></li>
                        <li class="share-post">
                            <?= anchor('https://api.whatsapp.com/send?text=' . base_url() . '/article/' . $dataArticle['category'] . '/' . createSlug($dataArticle['slug'], ['target' => '_blank']), '<i class="fa fa-whatsapp" style="color:green"></i>', ['target' => '_blank', 'title' => 'Compartilhar no Whatsapp']); ?>
                        </li>
                        <li><?= anchor('/article/pdf/' . $dataArticle['slug'] . '/' . $dataArticle['category'], '<i class="fa fa-file-pdf-o" style="color:red"></i>', ['target' => '_blank', 'title' => 'Visualizar em PDF']); ?></li>
                    </ul>
                </div><!-- single post header end-->
                <div class="post-content-area">
                    <div class="single-big-img img-ovarlay" style="background-image: url(<?= base_url(); ?>/assets/img/<?= $dataArticle['category']; ?>/<?= $dataArticle['slug'] ?>/<?= $dataArticle['image-main']; ?>)"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <ol class="breadcrumb">
                    <li><?= anchor('/', '<i class="fa fa-home"></i> Home'); ?></li>
                    <li><?= anchor('/category/' . $dataArticle['category'], firstUppercase(toCategory($dataArticle['category']))); ?>
                    <li><?= $dataArticle['title']; ?></li>
                </ol>
                <div class="ts-grid-box content-wrapper single-post">
                    <div class="post-content-area">
                        <div class="entry-content space-list">
                            <?= firstCapitulate($dataArticle['text']);
                            if ($dataArticle['quote']) :
                                echo createQuote($dataArticle['quote'], $dataArticle['quote-author']);
                            endif; ?>
                            <?php
                            if ($dataArticle['image-gallery']) : ?>
                                <div class="gallery-img">
                                    <?php
                                    $imageGallery = explode(';', trim($dataArticle['image-gallery']));
                                    for ($i = 0; $i < count($imageGallery); $i++) : ?>
                                        <a href="<?= base_url(); ?>/assets/img/<?= $category; ?>/<?= $dataArticle['slug']; ?>/<?= $imageGallery[$i]; ?>" class="gallery-popup">
                                            <img src="<?= base_url(); ?>/assets/img/<?= $category; ?>/<?= $dataArticle['slug']; ?>/<?= $imageGallery[$i]; ?>" alt="" class="px-1 py-1">
                                        </a>
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($dataArticle['image-text-second']) : ?>
                                <p><img class="float-left" src="<?= base_url(); ?>/assets/img/<?= $category; ?>/<?= $dataArticle['slug'] ?>/<?= $dataArticle['slug'] . '-02.jpg'; ?>" alt=""></p>
                            <?php endif; ?>
                            <p><?= $dataArticle['text-second']; ?></p>
                            <div class="clearfix"></div>
                            <?php
                            if ($dataArticle['image-video']) : ?>
                                <div class="post-video">
                                    <img class="img-fluid" src="<?= base_url(); ?>/assets/img/<?= $category; ?>/<?= $dataArticle['slug']; ?>/<?= $dataArticle['image-video']; ?>" alt="">
                                    <div class="post-video-content">
                                        <a href="<?= $dataArticle['link-video']; ?>" class="ts-play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                                        <h3><a href=""><?= $dataArticle['title-video']; ?></a></h3>
                                    </div>
                                </div>
                                <p><?= $dataArticle['text-video']; ?></p>
                            <?php endif;  ?>
                        </div><!-- entry content end-->
                    </div><!-- post content area-->
                    <hr>
                    <?php if (($otherArticle['error']) == false) : ?>
                        <div class="post-navigation clearfix">
                            <div class="post-next float-right">
                                <?= anchorArticle(
                                    $otherArticle['category'],
                                    $otherArticle['slug'],
                                    '<img src="' . base_url() . '/assets/img/' . $otherArticle['category'] . '/' . $otherArticle['slug'] . '/' . $otherArticle['slug'] . '-01.jpg" alt="">
                                <span>Veja também</span>
                                <p>' . $otherArticle["title"] . '</p>'
                                ); ?>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div><!-- col end -->
            <div class="col-lg-3">
                <?= view('site/side'); ?>
            </div>
            <!-- col end-->
        </div><!-- row end-->
    </div><!-- container-->
</section><!-- single post end-->
<!-- newslater start -->
<?= $this->endSection(); ?>