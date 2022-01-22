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
                    <div class="contact-box ts-grid-box">
                        <div class="clearfix">
                            <h2 class="float-left"><span>Listar Artigos</span></h2>

                            <div class="float-right">
                                <?= anchor('/build/create', 'CRIAR ARTIGO', ['class' => 'btn btn-primary']); ?>
                            </div>
                        </div>

                        <?php
                        echo form_open('/build/add', ['enctype' => 'multipart/form-data', 'role' => 'form', 'id' => 'contact-form']) ?>

                        <div class="error-container">
                            <div class=" border-left-<?= $msgs['alert'] ?> alert alert-show alert-<?= $msgs['alert'] ?>">
                                <strong><?= $msgs['message']; ?></strong>
                            </div>
                            <div class="row">
                                <div class="table">
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Título</th>
                                                <th>Imagem</th>
                                                <th>Categoria</th>
                                                <th class="text-center">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($dataWorld as $item) : ?>
                                                <tr>
                                                    <td><?= $item['title']; ?></td>
                                                    <td><img src="<?= base_url(); ?>/assets/img/<?= $item['category']; ?>/<?= $item['slug']; ?>/<?= $item['image-main']; ?>" class="d-flex sidebar-img" /></td>
                                                    <td><?= toCategory($item['category']); ?></td>
                                                    <td class="text-center"><?= anchor('build/edit/' . $item['id']. '/' .$item['category'], '<span class="btn btn-primary">Editar</span>'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php
                                            foreach ($dataBrazil as $item) : ?>
                                                <tr>
                                                    <td><?= $item['title']; ?></td>
                                                    <td><img src="<?= base_url(); ?>/assets/img/<?= $item['category']; ?>/<?= $item['slug']; ?>/<?= $item['image-main']; ?>" class="d-flex sidebar-img" /></td>
                                                    <td><?= toCategory($item['category']); ?></td>
                                                    <td class="text-center"><?= anchor('build/edit/' . $item['id']. '/' .$item['category'], '<span class="btn btn-primary">Editar</span>'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php
                                            foreach ($dataGeography as $item) : ?>
                                                <tr>
                                                    <td><?= $item['title']; ?></td>
                                                    <td><img src="<?= base_url(); ?>/assets/img/<?= $item['category']; ?>/<?= $item['slug']; ?>/<?= $item['image-main']; ?>" class="d-flex sidebar-img" /></td>
                                                    <td><?= toCategory($item['category']); ?></td>
                                                    <td class="text-center"><?= anchor('build/edit/' . $item['id']. '/' .$item['category'], '<span class="btn btn-primary">Editar</span>'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>                                           
                                            <?php
                                            foreach ($dataCuriosity as $item) : ?>
                                                <tr>
                                                    <td><?= $item['title']; ?></td>
                                                    <td><img src="<?= base_url(); ?>/assets/img/<?= $item['category']; ?>/<?= $item['slug']; ?>/<?= $item['image-main']; ?>" class="d-flex sidebar-img" /></td>
                                                    <td><?= toCategory($item['category']); ?></td>
                                                    <td class="text-center"><?= anchor('build/edit/' . $item['id']. '/' .$item['category'], '<span class="btn btn-primary">Editar</span>'); ?></td>
                                                </tr>
                                            <?php endforeach; ?>                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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