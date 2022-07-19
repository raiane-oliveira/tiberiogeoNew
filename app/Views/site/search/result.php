<?= $this->extend('site/layout/default'); ?>

<?= $this->section('content');
header('Content-type: text/html; charset=utf8');
setlocale(LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');

$total = count($dataCategory);
?>

<div class="body-inner-content category-layout-6">
    <!-- single post start -->
    <!-- block post area start-->
    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-8  mb-15">
                    <div class="clearfix entry-cat-header">
                        <h2 class="ts-title float-left"><i class="fa fa-search"></i> Encontrado(s) :: <?= writeZeroLeft($total) > 1 ? writeZeroLeft($total). ' - artigos para: "' : writeZeroLeft($total).' - artigo para: "'; echo $wordInput.'"' ?></h2>
                       
                    </div>
                    <br>

                    <div class="post-list pagination__list">
                        <?php foreach ($dataCategory as $item) : ?>
                            <!-- ts title end-->
                            <div class="pagination__item">
                                <div class="row mb-10">
                                    <div class="col-md-4">
                                        <div class="ts-post-thumb">
                                            <?php
                                            $image = [
                                                'src' => base_url() . '/assets/img/' . $item['category'] . '/' . $item['slug'] . '/' . $item['image-main'],
                                                'class' => 'img-fluid',

                                            ];
                                            echo anchorArticle($item['category'], $item['slug'], img($image));
                                            ?>
                                        </div>
                                    </div><!-- col lg end-->
                                    <div class="col-md-8">
                                        <div class="post-content">
                                            <span style="font-size: 12px;">
                                                <?= anchorCategory($item['category'], false); ?>
                                            </span>
                                            <h3 class="post-title md">
                                                <?= anchorArticle($item['category'], $item['slug'], $item['title']);
                                                ?>
                                            </h3>
                                            <ul class="post-meta-info">
                                                <li class="author">
                                                    <?php
                                                    $image = [
                                                        'src' => base_url() . '/assets/images/avater/logo-avater.png',
                                                    ];
                                                    echo anchor('/', img($image) . 'Tiberiogeo'); ?>
                                                </li>
                                                <li><i class="fa fa-clock-o"></i> <?= toDatePost($item['date']); ?></li>
                                            </ul>
                                            <p><?= $item['resume']; ?></p>
                                        </div>
                                    </div>
                                </div><!-- row end-->
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="right-sidebar-1">
                        <?= view('site/side-favorite'); ?>
                        <?= view('site/side-category'); ?>
                        <?= view('site/side-cloud'); ?>
                    </div>
                </div>
            </div><!-- row end-->
        </div>

    </section><!-- block area end-->
</div>
<?= $this->endSection(); ?>