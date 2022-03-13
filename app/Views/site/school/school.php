<?= $this->extend('site/layout/default'); ?>

<?= $this->section('content') ?>

<section class="block-wrapper mt-15 category-layout-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="right-sidebar">
                    <div class="post-list-item widgets">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a class="active" href="#exercise" aria-controls="exercise" role="tab" data-toggle="tab" aria-selected="true"><i class="fa fa-list-alt"></i> Exercícios</a></li>
                            <li role="presentation"><a href="#evidences" aria-controls="evidences" role="tab" data-toggle="tab" class="" aria-selected="false"><i class="fa fa-file-text-o"></i> Provas</a></li>
                            <li role="presentation"><a href="#slide" aria-controls="slide" role="tab" data-toggle="tab" class="" aria-selected="false"><i class="fa fa-file-powerpoint-o"></i> Slide</a></li>
                            <li role="presentation"><a href="#text" aria-controls="text" role="tab" data-toggle="tab" class="" aria-selected="false"><i class="fa fa-file-text"></i> Textos</a></li>
                        </ul><!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list active" id="exercise">
                                <?php                                 
                                krsort($dataSchool['exercicie']);
                                foreach ($dataSchool['exercicie'] as $item) : ?>
                                    <div class="post-content media">
                                        <i class="fa fa-list-alt fa-3x"></i>
                                        <div class="media-body px-2">
                                            <span class="post-tag">
                                                <a href="#" class="green-color"><?= $item['date']; ?></a>
                                            </span>
                                            <h4 class="post-title">
                                                <?= anchor(base_url().$item['link'], $item['title'], ['target' => '_blank']); ?>
                                            </h4>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!--ts-grid-box end -->
                            <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list" id="evidences">
                                <?php  
                                krsort($dataSchool['evidences']);
                                  foreach ($dataSchool['evidences'] as $item) : ?>
                                    <div class="post-content media">
                                        <i class="fa fa-file-text-o fa-3x"></i>
                                        <div class="media-body px-2">
                                            <span class="post-tag">
                                                <a href="#" class="green-color"><?= $item['date']; ?></a>
                                            </span>
                                            <h4 class="post-title">
                                                <?= anchor($item['link'], $item['title'], ['target' => '_blank']); ?>
                                            </h4>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!--ts-grid-box end -->
                            <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list" id="slide">
                                <?php
                                 krsort($dataSchool['slide']);
                                 foreach ($dataSchool['slide'] as $item) : ?>
                                    <div class="post-content media">
                                        <i class="fa fa-file-powerpoint-o fa-3x"></i>
                                        <div class="media-body px-2">
                                            <span class="post-tag">
                                                <a href="#" class="green-color"><?= $item['date']; ?></a>
                                            </span>
                                            <h4 class="post-title">
                                                <?= anchor($item['link'], $item['title'], ['target' => '_blank']); ?>
                                            </h4>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!--ts-grid-box end -->
                            <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list" id="text">
                                <?php
                                 krsort($dataSchool['text']);
                                  foreach ($dataSchool['text'] as $item) : ?>
                                    <div class="post-content media">
                                        <i class="fa fa-file-text fa-3x"></i>
                                        <div class="media-body px-2">
                                            <span class="post-tag">
                                                <a href="#" class="green-color"><?= $item['date']; ?></a>
                                            </span>
                                            <h4 class="post-title">
                                                <?= anchor($item['link'], $item['title'], ['target' => '_blank']); ?>
                                            </h4>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!--ts-grid-box end -->
                        </div><!-- tab content end-->
                    </div><!-- widgets end-->
                </div><!-- right sidebar end-->
            </div><!-- col end-->

            <div class="col-lg-4">
            <div class="right-sidebar-1">        
                   
                    <?=view('site/side-category');?>
                              </div>
                
            </div><!-- right sidebar end-->
        </div><!-- col end-->

    </div><!-- row end-->
    </div><!-- container end-->
</section>
<?= $this->endSection(); ?>