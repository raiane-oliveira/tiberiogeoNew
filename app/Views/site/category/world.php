<div class="body-inner-content category-layout-6">
    <!-- block post area start-->
    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row mb-30">
                <div class="col-lg-12">
                    <div class="">
                        <ol class="ts-breadcrumb">
                            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="#">Category</a></li>
                        </ol>
                        <div class="clearfix entry-cat-header">
                            <h2 class="ts-title float-left">Category Style</h2>
                            <ul class="ts-category-list float-right">
                                <li><a href="#" class="ts-blue-bg">Post 1</a></li>
                                <li><a href="#">Post 2</a></li>
                                <li><a href="#">Post 3</a></li>
                                <li><a href="#">Post 4</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="content-wrapper">
                        <div class="entry-header mb-20">
                            <h2 class="post-title large">Swiss authorities say Uber drivers should treated as
                                employees</h2>
                            <ul class="post-meta-info">
                                <li><a href="#"><span>by</span>Donald Ramos</a></li>
                                <li><i class="fa fa-clock-o"></i> March 21, 2019</li>
                                <li class="active"><i class="el el-fire"></i> 3,005</li>
                                <li class="share-post"><a href="#"><i class="fa fa-share"></i></a></li>
                            </ul>
                        </div><!-- single post header end-->
                        <div class="ts-post-thumb mb-30"><a href="#" class="post-cat ts-orange-bg">Travel</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/travel/travel11.jpg" alt=""></a>
                        </div><!-- post content area-->
                    </div>
                    <div class="post-list">
                        f<?php foreach ($dataCategory as $e) : ?>{
                        <!-- ts title end-->
                        <div class="row mb-10">
                            <div class="col-md-4">
                                <div class="ts-post-thumb"><a href="#" class="post-cat ts-purple-bg"><?= $e['category']; ?></a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/health/health4.jpg" alt=""></a></div>
                            </div><!-- col lg end-->
                            <div class="col-md-8">
                                <div class="post-content">
                                    <h3 class="post-title md">
                                        <?= anchor('/' . $e['category'] . '/' . $e['slug'], $e['title']); ?>
                                    </h3>
                                    <ul class="post-meta-info">
                                        <li><a href="">Donald Ramos</a></li>
                                        <li><i class="fa fa-clock-o"></i> March 21, 2019</li>
                                    </ul>
                                    <p> Black farmers in the US’s South faced with the continued failure their
                                        efforts to run farm their launched a lawsuit claiming that “white racism” is
                                        to blame for their inability to their produce crop yields.</p>
                                </div>
                            </div>
                        </div><!-- row end-->
                    <?php endforeach; ?>
                    <div class="ts-pagination text-center mt-15 md-mb-30">
                        <ul class="pagination">
                            <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="right-sidebar-1">
                        <div class="widgets widgets-item">
                            <h3 class="widget-title"><span>On social</span></h3>
                            <ul class="ts-block-social-list">
                                <li class="ts-facebook"><a href="#"><i class="fa fa-facebook"></i><b>facebook</b><span>1.5 k</span></a></li>
                                <li class="ts-google-plus"><a href="#"><i class="fa fa-google-plus"></i><b>Google
                                            Plus</b><span>1.5 k</span></a></li>
                                <li class="ts-twitter"><a href="#"><i class="fa fa-twitter"></i><b>Twitter</b><span>1.5 k</span></a></li>
                                <li class="ts-pinterest"><a href="#"><i class="fa fa-pinterest-p"></i><b>facebook</b><span>1.5 k</span></a></li>
                                <!-- <li class="ts-linkedin"><a href="#"><i class="fa fa-linkedin"></i><b>12.5 k</b><span>Follwers</span></a></li><li class="ts-youtube"><a href="#"><i class="fa fa-youtube"></i><b>12.5 k</b><span>Follwers</span></a></li>-->
                            </ul>
                        </div><!-- widgets end-->
                        <div class="widgets widget-banner"><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/banner/sidebar-banner4.jpg" alt=""></a></div><!-- widgets end-->
                        <div class="post-list-item widgets">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation"><a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-clock-o"></i> Recent</a></li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-heart"></i> Favorites</a></li>
                            </ul><!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">
                                    <div class="post-content media"><img class="d-flex sidebar-img" src="<?= base_url(); ?>/assets/images/news/sports/sports2.jpg" alt="">
                                        <div class="media-body"><span class="post-tag"><a href="#" class="green-color">sports</a></span>
                                            <h4 class="post-title"><a href="">18 month old shoots himself by gun</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                    <div class="post-content media "><img class="d-flex sidebar-img" src="<?= base_url(); ?>/assets/images/news/tech/tech4.jpg" alt="">
                                        <div class="media-body"><span class="post-tag"><a href="#" class="yellow-color">Technology</a></span>
                                            <h4 class="post-title"><a href="">Beats did announce something today</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                    <div class="post-content media"><img class="d-flex sidebar-img" src="<?= base_url(); ?>/assets/images/news/sports/sports3.jpg" alt="">
                                        <div class="media-body"><span class="post-tag"><a href="#" class="blue-color">Lifestyle</a></span>
                                            <h4 class="post-title"><a href="">18 month old shoots himself by gun</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                    <div class="post-content media"><img class="d-flex sidebar-img" src="<?= base_url(); ?>/assets/images/news/fashion/fashion4.jpg" alt="">
                                        <div class="media-body"><span class="post-tag"><a href="#" class="pink-color">Fashion</a></span>
                                            <h4 class="post-title"><a href="">Beats did announce something today</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                </div>
                                <!--ts-grid-box end -->
                                <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list" id="profile">
                                    <div class="post-content media"><img class="d-flex sidebar-img" src="<?= base_url(); ?>/assets/images/news/sports/sports2.jpg" alt="">
                                        <div class="media-body"><span class="post-tag"><a href="#" class="green-color">sports</a></span>
                                            <h4 class="post-title"><a href="">Beats did announce something today</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                    <div class="post-content media "><img class="d-flex sidebar-img" src="<?= base_url(); ?>/assets/images/news/tech/tech4.jpg" alt="">
                                        <div class="media-body"><span class="post-tag"><a href="#" class="yellow-color">Technology</a></span>
                                            <h4 class="post-title"><a href="">18 month old shoots himself by gun</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                    <div class="post-content media"><img class="d-flex sidebar-img" src="<?= base_url(); ?>/assets/images/news/sports/sports2.jpg" alt="">
                                        <div class="media-body"><span class="post-tag"><a href="#" class="blue-color">Lifestyle</a></span>
                                            <h4 class="post-title"><a href="">Beats did announce something today</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                    <div class="post-content media"><img class="d-flex sidebar-img" src="<?= base_url(); ?>/assets/images/news/fashion/fashion4.jpg" alt="">
                                        <div class="media-body"><span class="post-tag"><a href="#" class="pink-color">Fashion</a></span>
                                            <h4 class="post-title"><a href="">18 month old shoots himself by gun</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                </div>
                                <!--ts-grid-box end -->
                            </div><!-- tab content end-->
                        </div><!-- widgets end-->
                        <div class="widgets category-widget widgets-item">
                            <h3 class="widget-title"><span>On social</span></h3>
                            <ul class="category-list">
                                <li><a href="#">Travel <span class="ts-orange-bg">10</span></a></li>
                                <li><a href="#">Sports <span class="ts-green-bg">25</span></a></li>
                                <li><a href="#">Travel <span class="ts-orange-bg">10</span></a></li>
                                <li><a href="#">Fashion <span class="ts-pink-bg">10</span></a></li>
                                <li><a href="#">Technology <span class="ts-blue-bg">10</span></a></li>
                            </ul>
                        </div>
                        <div class="widgets widgets-item">
                            <div class="ts-widget-newsletter">
                                <div class="newsletter-introtext">
                                    <h4>Newsletter</h4>
                                    <p>Subscribe to get the best stories into your inbox!</p>
                                </div>
                                <div class="newsletter-form">
                                    <form action="#" method="post">
                                        <div class="form-group"><input type="email" name="email" id="newsletter-form-email" class="form-control form-control-lg" placeholder="E-mail" autocomplete="off"><button class="btn btn-primary">Subscribe</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- row end-->
        </div><!-- container end-->
    </section><!-- block area end-->
    <!-- newslater start -->
    <section class="ts-newslatter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ts-newslatter-content">
                        <h2> Sign up for the Newsletter</h2>
                        <p>Join our newsletter and get updates in your inbox. We won’t spam you and we respect your
                            privacy.</p>
                    </div>
                </div><!-- col end-->
                <div class="col-lg-6 align-self-center">
                    <div class="newsletter-form">
                        <form action="#" method="post" class="media align-items-end">
                            <div class="email-form-group media-body"><i class="fa fa-paper-plane" aria-hidden="true"></i><input type="email" name="email" id="newsletter-form-email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required></div>
                            <div class="d-flex ts-submit-btn"><button class="btn btn-primary">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- newslater end -->
    <!-- footer social list start-->
    <section class="ts-footer-social-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-logo"><a href="#"><img src="<?= base_url(); ?>/assets/images/logo/footer_logo.png" alt=""></a></div>
                    <!-- footer logo end-->
                </div><!-- col end-->
                <div class="col-lg-8 align-self-center">
                    <ul class="footer-social">
                        <li class="ts-facebook"><a href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                        </li>
                        <li class="ts-google-plus"><a href="#"><i class="fa fa-google-plus"></i><span>Google
                                    Plus</span></a></li>
                        <li class="ts-twitter"><a href="#"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                        </li>
                        <li class="ts-pinterest"><a href="#"><i class="fa fa-pinterest-p"></i><span>pinterest</span></a></li>
                        <li class="ts-linkedin"><a href="#"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
                        </li>
                    </ul>
                </div><!-- col end-->
            </div>
        </div>
    </section><!-- footer social list end-->
    <!-- footer start -->
</div>
<?= $this->endSection(); ?>