<?php

namespace App\Views\site;

$style = [
    "css" => [

        ["path" => base_url() . "/assets/css/bootstrap.min.css"],
        ["path" => base_url() . "/assets/css/style.css"],
        ["path" => base_url() . "/assets/css/responsive.css"],

    ],
];

$dataDefault = [
    "title" => "TiberioGeo - A Geografia Levada a Sério!",
    "favico" => base_url() . "/assets/img/logo/autor.png",

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

    <section class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-logo text-center">
                        <?= anchor('/', '<img src="' . base_url() . '/assets/images/logo/logo-topo.png" alt="" />'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

                            <?= anchor('/', 'HOME', array('class' => 'btn btn-primary')) ?>
                        </div>
                    </div>
                </div>
            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- footer social list start-->
</body>

</html>