
<?php
 $date = new DateTime();
 $formatter = new IntlDateFormatter(
     'pt_BR',
     IntlDateFormatter::FULL,
     IntlDateFormatter::NONE,
     'America/Sao_Paulo',
     IntlDateFormatter::GREGORIAN
 );
 $date_now = $formatter->format($date);
helper('form');
$style = [
    "css" => [
        //["path" => base_url()."/assets/css/uikit.min.css"],
        ["path" => base_url()."/assets/css/bootstrap.min.css"],
        ["path" => base_url()."/assets/css/font-awesome.min.css"],
        ["path" => base_url()."/assets/css/animate.css"],
        ["path" => base_url()."/assets/css/icofonts.css"],
        ["path" => base_url()."/assets/css/owlcarousel.min.css"],
        ["path" => base_url()."/assets/css/slick.css"],
        ["path" => base_url()."/assets/css/navigation.css"],
        ["path" => base_url()."/assets/css/magnific-popup.css"],
        ["path" => base_url()."/assets/css/style.css"],
        ["path" => base_url()."/assets/css/colors/color-0.css"],
        ["path" => base_url()."/assets/css/responsive.css"],
        
    ],
];

$dataDefault = [
    "title" => "TiberioGeo - A Geografia Levada a Sério!",
    "favico" => base_url()."/assets/img/logo/autor.png",
    
];
$dados = json_decode(file_get_contents('https://api.hgbrasil.com/weather?format=json-cors&key=acca0bf5&woeid=455848'), true); // Recebe os dados da API
       $data = [
            "data_temperature" => $dados,
            "date_now" => date('Y-m-d'),
            //"dataWorld" => end($dataCategoryWorld),
            //"dataBrazil" => end($dataCategoryBrazil),
            //"dataGeography" => end($dataCategoryGeography)
        ];
        
	    $javascript = [
	        "js" => [
                //["path"=> base_url()."/assets/js/jquery.min.js"],
                ["path"=> base_url()."/assets/js/jquery-3.6.0.min.js"],
                ["path"=> base_url()."/assets/js/navigation.js"],
                //["path"=> base_url()."/assets/js/uikit.min.js"],
                //["path"=> base_url()."/assets/js/uikit-icons.js"],
                ["path"=> base_url()."/assets/js/popper.min.js"],
                ["path"=> base_url()."/assets/js/jquery.magnific-popup.min.js"],
                ["path"=> base_url()."/assets/js/bootstrap.min.js"],
                ["path"=> base_url()."/assets/js/owl-carousel.2.3.0.min.js"],
                ["path"=> base_url()."/assets/js/slick.min.js"],
                ["path"=> base_url()."/assets/js/smoothscroll.js"],
                ["path"=> base_url()."/assets/js/main.js"],
                ["path"=> base_url()."/assets/js/my.js"],
                
            ]
        ];
?>
<!doctype html>
<html lang="pt-br">
   <head>
      <!-- Basic Page Needs =====================================-->
      <meta charset="utf-8">
      <!-- Mobile Specific Metas ================================-->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" type="image/x-icon" href="<?= $dataDefault['favico']; ?>">
      <!-- Site Title- -->
      <title><?=$dataDefault['title'];?></title>
      <!-- CSS   ==================================================== -->
      <!-- CSS here -->
    <?php
    foreach ($style['css'] as $path):?>
        <link rel="stylesheet" href="<?= $path['path']; ?>">
    <?php endforeach; ?>
      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]><script src="../../../oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="../../../oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="body-color">
         
   
<section class="top-bar bg-dark-item">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center md-center-item">
                <div class="ts-temperature">
                    <i class="fa fa-thermometer-empty" aria-hidden="true"></i>
                    <span id="tempo"><?=$data['data_temperature']['results']['temp'];?></span>
                    <span><b>c</b></span> | <i class="fa fa-map-marker"></i>
                    <span id="city"><?=$data['data_temperature']['results']['city'];?></span> | <img src="<?=base_url();?>/assets/images/temperature/<?php echo $data['data_temperature']['results']['img_id']; ?>.png" class="imagem-do-tempo">
                    <span id="description"><?=$data['data_temperature']['results']['description'];?></span> | 
                   
                    
                </div>
                <ul class="ts-top-nav">
                    <!--<li><a href="#">Blog</a></li>
            <li><a href="#">Forums</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Advertisement</a></li>-->
                </ul>
            </div>
            <!-- end col-->
            <div class="col-lg-6 text-right align-self-center">
                <ul class="top-social">
                    <li><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-google-plus"></i></a><a href="#"><i class="fa fa-pinterest"></i></a><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                    <li class="ts-date"><i class="fa fa-clock-o"></i> <?=$date_now;?></li>
                </ul>
            </div>
            <!--end col -->
        </div>
        <!-- end row -->
    </div>
</section>
<!-- end top bar-->
<!-- ad banner start -->       
             <?php //echo view("site/home/header-banner.php");?>        
             <?php //echo view("site/home/header.php");?> 
             <section class="header-middle">
    <div class="container">
        <div class="row">
            <div class="col-md-4 align-self-center">
                <div class="header-logo">
                    <?=anchor('/','<img src="'.base_url().'/assets/images/logo/logo-topo.png" alt="" />' );?>
                    
                </div>
            </div>
            <div class="col-md-8 align-self-center">
                <div class="banner-imgr">
                    <a href="index.html">
                        <img class="img-fluid" src="<?= base_url(); ?>/assets/images/banner/banner-header.png" alt="">
                    </a>
                </div>
            </div><!-- col end -->
        </div><!-- row  end -->
    </div><!-- container end -->
</section>
<header class="header-standerd">
    <div class="container">
        <div class="row">

            <!-- logo end-->
            <div class="col-lg-12 header-nav-item">

                <!--nav top end-->
                <nav class="navigation ts-main-menu navigation-landscape">
                    <div class="nav-header">
                        <div class="nav-toggle"></div>
                    </div>
                    <!--nav brand end-->
                    <div class="nav-menus-wrapper clearfix">
                        <!--nav right menu start-->
                        <ul class="right-menu align-to-right">
                            <li><a href=""><i class="fa fa-user-circle-o"></i></a></li>
                            <li class="header-search">
                                <div class="nav-search">
                                    <div class="nav-search-button"><i class="icon icon-search"></i></div>
                                    <form>
                                        <span class="nav-search-close-button" tabindex="0">✕</span>
                                        <div class="nav-search-inner"><input type="search" name="search" placeholder="Type and hit ENTER"></div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                        <!--nav right menu end-->
                        <!-- nav menu start-->
                        <ul class="nav-menu">
                            <li><?= anchor('/', "HOME"); ?></li>

                            <li>
                                <?= anchor('/category/world', "MUNDO"); ?>
                                <div class="megamenu-panel">
                                    <div class="megamenu-tabs">
                                        <ul class="megamenu-tabs-nav">
                                            <li class="active"><a href="#">Health</a></li>
                                            <li><a href="#">Food</a></li>
                                            <li><a href="#">Fashion</a></li>
                                            <li><a href="#">Travel</a></li>
                                        </ul>
                                        <div class="megamenu-tabs-pane active">
                                            <div class="row">
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb"><a class="post-cat ts-purple-bg" href="#">Health</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/health/health1.jpg" alt=""></a></div>
                                                        <div class="post-content">
                                                            <h3 class="post-title"><a href="#">Can't shed those Gym? The problem might be in</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb"><a class="post-cat ts-purple-bg" href="#">Health</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/health/health2.jpg" alt=""></a></div>
                                                        <div class="post-content">
                                                            <h3 class="post-title"><a href="#">Smart packs parking sensor tech and beeps</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb"><a class="post-cat ts-purple-bg" href="#">Health</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/health/health3.jpg" alt=""></a></div>
                                                        <div class="post-content">
                                                            <h3 class="post-title"><a href="#">Deleting fears from the brain means you might never</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- mega menu end-->
                                        <div class="megamenu-tabs-pane">
                                            <div class="row">
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb"><a class="post-cat ts-yellow-bg" href="#">Food</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/foods/food1.jpg" alt=""></a></div>
                                                        <div class="post-content">
                                                            <h3 class="post-title"><a href="#">Tourism in Dubai is booming by international tourist</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb"><a class="post-cat ts-yellow-bg" href="#">Food</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/foods/food2.jpg" alt=""></a></div>
                                                        <div class="post-content">
                                                            <h3 class="post-title"><a href="#">Tourism in Dubai is booming by international tourist</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb"><a class="post-cat ts-yellow-bg" href="#">Food</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/foods/food3.jpg" alt=""></a></div>
                                                        <div class="post-content">
                                                            <h3 class="post-title"><a href="#">Tourism in Dubai is booming by international tourist</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- mega menu end-->
                                        <div class="megamenu-tabs-pane">
                                            <div class="row">
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb"><a class="post-cat ts-pink-bg" href="#">Fashion</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/tech/tech1.jpg" alt=""></a></div>
                                                        <div class="post-content">
                                                            <h3 class="post-title"><a href="#">Tourism in Dubai is booming by international tourist</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb"><a class="post-cat ts-pink-bg" href="#">Fashion</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/tech/tech2.jpg" alt=""></a></div>
                                                        <div class="post-content">
                                                            <h3 class="post-title"><a href="#">Tourism in Dubai is booming by international tourist</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb"><a class="post-cat ts-pink-bg" href="#">Fashion</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/tech/tech3.jpg" alt=""></a></div>
                                                        <div class="post-content">
                                                            <h3 class="post-title"><a href="#">Tourism in Dubai is booming by international tourist</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- mega menu end-->
                                        <div class="megamenu-tabs-pane">
                                            <div class="row">
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb"><a class="post-cat ts-orange-bg" href="#">Travel</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/travel/travel2.jpg" alt=""></a></div>
                                                        <div class="post-content">
                                                            <h3 class="post-title"><a href="#">Tourism in Dubai is booming by international tourist</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb"><a class="post-cat ts-orange-bg" href="#">Travel</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/travel/travel3.jpg" alt=""></a></div>
                                                        <div class="post-content">
                                                            <h3 class="post-title"><a href="#">Tourism in Dubai is booming by international tourist</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-4">
                                                    <div class="item">
                                                        <div class="ts-post-thumb"><a class="post-cat ts-orange-bg" href="#">Travel</a><a href="#"><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/travel/travel4.jpg" alt=""></a></div>
                                                        <div class="post-content">
                                                            <h3 class="post-title"><a href="#">Tourism in Dubai is booming by international tourist</a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- mega menu end-->
                                    </div>
                                </div>
                            </li>

                            <li>
                                <?= anchor('/category/brazil', "BRASIL"); ?>
                                <div class="megamenu-panel">
                                    <div class="row">
                                        <div class="col-12 col-lg-3">
                                            <div class="item">
                                                <div class="ts-post-thumb"><a href=""><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/tech/tech1.jpg" alt=""></a><a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a></div>
                                                <div class="post-content">
                                                    <h3 class="post-title"><a href="#">Tourism in Dubai tourist favorite place</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="item">
                                                <div class="ts-post-thumb"><a href=""><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/tech/tech2.jpg" alt=""></a><a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a></div>
                                                <div class="post-content">
                                                    <h3 class="post-title"><a href="#">Tourism in Dubai tourist favorite place</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="item">
                                                <div class="ts-post-thumb"><a href=""><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/tech/tech3.jpg" alt=""></a><a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a></div>
                                                <div class="post-content">
                                                    <h3 class="post-title"><a href="#">Tourism in Dubai tourist favorite place</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="item">
                                                <div class="ts-post-thumb"><a href=""><img class="img-fluid" src="<?= base_url(); ?>/assets/images/news/tech/tech4.jpg" alt=""></a><a href="https://www.youtube.com/watch?v=uZmz6fGRVW4" class="fa fa-play-circle-o ts-video-icon"></a></div>
                                                <div class="post-content">
                                                    <h3 class="post-title"><a href="#">Tourism in Dubai tourist favorite place</a></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <?= anchor('/category/geography', "GEOGRAFIA"); ?>
                                <ul class="nav-dropdown">
                                    <li>
                                        <a href="#">Category layout</a>
                                        <ul class="nav-dropdown">
                                            <li><a href="category-1.html">Category layout 1</a></li>
                                            <li><a href="category-2.html">Category layout 2</a></li>
                                            <li><a href="category-3.html">Category layout 3</a></li>
                                            <li><a href="category-4.html">Category layout 4</a></li>
                                            <li><a href="category-5.html">Category layout 5</a></li>
                                            <li><a href="category-6.html">Category layout 6</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Posts Formate</a>
                                        <ul class="nav-dropdown">
                                            <li><a href="single-post-1.html">Single Post 1</a></li>
                                            <li><a href="single-post-2.html">Single Post 2</a></li>
                                            <li><a href="single-post-3.html">Single Post 3</a></li>
                                            <li><a href="single-post-4.html">Single Post 4</a></li>
                                            <li><a href="single-post-5.html">Single Post 5</a></li>
                                            <li><a href="single-post-6.html">Single Post 6</a></li>
                                            <li><a href="single-post-7.html">Single Post 7</a></li>
                                            <li><a href="single-post-8.html">Single Post 8</a></li>
                                            <li><a href="single-post-9.html">Single Post 9</a></li>
                                            <li><a href="single-post-10.html">Single Post 10</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Pages</a>
                                        <ul class="nav-dropdown">
                                            <li><a href="author.html">Author</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="login.html">Log In</a></li>
                                            <li><a href="registration.html">registration</a></li>
                                            <li><a href="404.html">404</a></li>
                                        </ul>
                                    </li>
                                    <!--Pages end-->
                                </ul>
                            </li>
                            <li><?= anchor('/category/school', "ESCOLA"); ?></li>

                        </ul>
                        <!--nav menu end-->
                    </div>
                </nav>
                <!-- nav end-->
            </div>
        </div>
    </div>
</header>
<!-- header nav end-->
<!-- block post area start-->

    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-page text-center col ts-grid-box">
                        <div class="error-code">
                            <h2><strong>404</strong></h2>
                        </div>
                        <div class="error-message">
                            <h3>Opps! A Página não foi encontrada ;(</h3>
                        </div>
                        <div class="error-body">
                            <h4>O link que você seguiu provavelmente está quebrado ou a página foi removida.</h4>
                            
                            <?=anchor('/','BHOME', array('class'=>'btn btn-primary'))?>
                        </div>
                    </div>
                </div>
            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- footer social list start-->
             <!-- newslater end --><!-- footer start -->
             <footer class="ts-footer">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="footer-menu text-center">
                     <ul>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Suggestion</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Our Ads</a></li>
                        <li><a href="#">Terms</a></li>
                     </ul>
                  </div>
                  <div class="copyright-text text-center">
                     <p>&copy; 2018, Vinazine. All rights <a href="http://www.bootstrapmb.com/" title="bootstrapmb">Reserved</a></p>
                  </div>
               </div>
               <!-- col end -->
            </div>
            <!-- row end -->
            <div id="back-to-top" class="back-to-top"><button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-up"></i></button></div>
            <!-- Back to top end -->
         </div>
         <!-- Container end-->
      </footer>
      <!-- footer end -->
      <!-- javaScript Files	=============================================================================-->
      <?php
foreach ($javascript['js'] as $path):?>
    <script src="<?= $path['path']; ?>"></script>
<?php endforeach; ?>
   </body>
</html>