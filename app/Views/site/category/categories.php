<?= $this->extend('site/layout/default'); ?>

<?= $this->section('content');
header('Content-type: text/html; charset=utf8');
setlocale(LC_ALL,'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
 ?>

<div class="body-inner-content category-layout-6">
    <!-- single post start -->
    <!-- block post area start-->
    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-8  mb-15">
                    <div class=" mb-30">
                        <div class="clearfix entry-cat-header">
                            <h2 class="ts-tidtle float-left" style = "background: <?=defineColorCategory($category)?>; padding: 10px; color: white; font-size:16px"><?= toCategory($category); ?></h2>
                        </div>
                    </div>
                    <div class="post-list pagination__list">
                        <?php foreach ($dataCategory as $item) : ?>
                            <!-- ts title end-->
                            <div class="pagination__item">
                                <div class="row mb-10">
                                    <div class="col-md-4">
                                        <div class="ts-post-thumb">
                                           <?php
                                          $image = [
                                                'src' => base_url().'/assets/img/'.$item['category'].'/'.$item['slug'].'/'.$item['image-main'],
                                                'class'=>'img-fluid',
                                                
                                          ];
                                          echo anchorArticle($item['category'],$item['slug'],img($image));
                                          ?>                                           
                                        </div>
                                    </div><!-- col lg end-->
                                    <div class="col-md-8">
                                        <div class="post-content">
                                            <h3 class="post-title md">
                                                <?= anchorArticle($item['category'], $item['slug'], $item['title']);
                                                ?>
                                            </h3>
                                            <ul class="post-meta-info">
                                            <li class="author">
                                                <?php
                                                $image = [
                                                    'src'=> base_url().'/assets/images/avater/logo-avater.png',
                                                ];
                                                echo anchor('/', img($image).'Tiberiogeo');?>
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
                    <?=view('site/side-favorite');?>
                    <?=view('site/side-category');?>
                    
                              </div>
                </div>
                
            </div><!-- row end-->
        </div>

    </section><!-- block area end-->
</div>
<?= $this->endSection(); ?>