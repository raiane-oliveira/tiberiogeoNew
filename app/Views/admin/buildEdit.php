<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.11.2/jodit.es2018.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/3.11.2/jodit.es2018.min.js"></script>
<?php

helper('form');
$style = [
    "css" => [
        //["path" => base_url()."/assets/css/uikit.min.css"],
        ["path" => base_url() . "/assets/css/bootstrap.min.css"],
        ["path" => base_url() . "/assets/css/font-awesome.min.css"],
        ["path" => base_url() . "/assets/css/animate.css"],
        ["path" => base_url() . "/assets/css/icofonts.css"],
        ["path" => base_url() . "/assets/css/owlcarousel.min.css"],
        ["path" => base_url() . "/assets/css/slick.css"],
        ["path" => base_url() . "/assets/css/navigation.css"],
        ["path" => base_url() . "/assets/css/magnific-popup.css"],
        ["path" => base_url() . "/assets/css/style.css"],
        ["path" => base_url() . "/assets/css/colors/color-0.css"],
        ["path" => base_url() . "/assets/css/responsive.css"],
        //["path" => base_url() . "/assets/css/jodit.es2018.min.css"],

    ],
];

$dataDefault = [
    "title" => "TiberioGeo - A Geografia Levada a Sério!",
    "favico" => base_url() . "/assets/img/logo/autor.png",

];
$javascript = [
    "js" => [
        //["path"=> base_url()."/assets/js/jquery.min.js"],
        ["path" => "//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"],
        ["path" => base_url() . "/assets/js/navigation.js"],
        //["path"=> base_url()."/assets/js/uikit.min.js"],
        //["path"=> base_url()."/assets/js/uikit-icons.js"],
        ["path" => base_url() . "/assets/js/popper.min.js"],
        ["path" => base_url() . "/assets/js/jquery.magnific-popup.min.js"],
        ["path" => base_url() . "/assets/js/bootstrap.min.js"],
        ["path" => base_url() . "/assets/js/owl-carousel.2.3.0.min.js"],
        ["path" => base_url() . "/assets/js/slick.min.js"],
        ["path" => base_url() . "/assets/js/smoothscroll.js"],
        ["path" => base_url() . "/assets/js/main.js"],
        ["path" => base_url() . "/assets/js/my.js"],
        //["path" => base_url() . "/assets/js/jodit.es2018.min.js"],

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
    <title><?= $dataDefault['title']; ?></title>
    <!-- CSS   ==================================================== -->
    <!-- CSS here -->
    <?php
    foreach ($style['css'] as $path) : ?>
        <link rel="stylesheet" href="<?= $path['path']; ?>">
    <?php endforeach; ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]><script src="../../../oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="../../../oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="body-color">


    <?php //echo view("site/home/header-banner.php");
    ?>
    <?php //echo view("site/home/header.php");
    ?>
    <section class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-4 align-self-center">
                    <div class="header-logo">
                        <?= anchor('/', '<img src="' . base_url() . '/assets/images/logo/logo-topo.png" alt="" />'); ?>

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

    <section class="block-wrapper mt-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class=" border-left-<?= $msgs['alert'] ?> alert alert-show alert-<?= $msgs['alert'] ?>">
                        <strong><?= $msgs['message']; ?></strong>

                    </div>
                    <div class="contact-box ts-grid-box">
                        <div class="clearfix">
                            <h2 class="float-left"><span>EDITANDO ARTIGO [ <?= $dataCategory['id']; ?> ]</span></h2>
                            <div class="float-right">
                                <?= anchor('/build/create', 'CRIAR ARTIGO', ['class' => 'btn btn-primary']); ?>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        LISTAR ARTIGOS
                                    </button>
                                    <?= buildButtonListCategory() ?>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <?php
                        echo form_open('/build/update', ['enctype' => 'multipart/form-data', 'role' => 'form', 'id' => 'contact-form']) ?>

                        <div class="error-container">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input value="<?= $dataCategory['title'] ?>" class="form-control form-control-name" name="title" id="title" placeholder="Digite um título" type="text">
                                        <input value="<?= $dataCategory['id'] ?>" class="form-control form-control-name" name="id" id="id" placeholder="Digite um título" type="hidden">
                                        <input value="<?= $dataCategory['category'] ?>" class="form-control form-control-name" name="category" id="category" placeholder="Digite um título" type="hidden">
                                    </div>
                                    <span style="color:red" class="font-italic font-weight-bold"><?php echo $erro !== '' ? $erro->getError('title') : ''; ?></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Resumo</label>
                                <textarea class="form-control form-control-message" name="resume" id="resume" placeholder="" rows="5"><?= $dataCategory['resume'] ?></textarea>
                            </div>
                            <span style="color:red" class="font-italic font-weight-bold"><?php echo $erro !== '' ? $erro->getError('resume') : ''; ?></span>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Texto 01</label>
                                        <textarea class="form-control form-control-message" name="text" id="text" placeholder="" rows="5"><?= $dataCategory['text'] ?></textarea>
                                    </div>
                                    <span style="color:red" class="font-italic font-weight-bold"><?php echo $erro !== '' ? $erro->getError('text') : ''; ?></span>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Texto 02</label>
                                        <textarea class="form-control form-control-message" name="text-second" id="text-second" placeholder="" rows="5"><?= $dataCategory['text-second'] ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Citação</label>
                                        <input value="<?= $dataCategory['quote'] ?>" class="form-control form-control-name" name="quote" id="quote" placeholder="Digite uma citação" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Citação autor</label>
                                        <input value="<?= $dataCategory['quote-author'] ?>" class="form-control form-control-name" name="quote-author" id="quote-author" placeholder="Digite autor da citação" type="text">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Link vídeo</label>
                                        <input value="<?= $dataCategory['link-video'] ?>" class="form-control form-control-name" name="link-video" id="link-video" placeholder="Digite o link do vídeo" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Imagem vídeo</label>
                                        <input value="<?= $dataCategory['image-video'] ?>" class="form-control form-control-name" name="image-video" id="link-video" placeholder="Digite o link do vídeo" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Titulo vídeo</label>
                                        <input value="<?= $dataCategory['title-video'] ?>" class="form-control form-control-name" name="title-video" id="title-video" placeholder="Digite o título do vídeo" type="text">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Texto vídeo</label>
                                        <input value="<?= $dataCategory['text-video'] ?>" class="form-control form-control-name" name="text-video" id="text-video" placeholder="Digite o texto do vídeo" type="text">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fonte</label>
                                        <input value="<?= $dataCategory['font'] ?>" class="form-control form-control-name" name="font" id="font" placeholder="Digite as fontes do artigo" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right"><br>
                                <button class="btn btn-primary solid blank" type="submit">Salvar</button>

                            </div>


                            <?= form_close() ?>
                        </div><!-- grid box end -->
                    </div><!-- col end-->


                </div><!-- col end-->
            </div><!-- container end-->
    </section>




    <!-- newslater end -->
    <!-- footer start -->
    <footer class="ts-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-menu text-center">

                    </div>
                    <div class="copyright-text text-center">
                        <p>&copy; <?= date('Y'); ?>, Tiberiogeo. All rights</p>
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
    foreach ($javascript['js'] as $path) : ?>
        <script src="<?= $path['path']; ?>"></script>
    <?php endforeach; ?>
</body>

</html>