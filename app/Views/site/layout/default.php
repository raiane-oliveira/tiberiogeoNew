<!doctype html>
<html lang="pt-br">

<head>
   <!-- Basic Page Needs =====================================-->
   <meta charset="utf-8">
   <!-- Mobile Specific Metas ================================-->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="author" content="Tibério Mendonça de Lima" />
   <meta name="keywords" content="Geografia, Atualidades, Mundo, Brasil, Paraíba, Novidades, Acontecimentos, Curiosidades geográficas, Temas para o ENEM" />
   <meta name="description" content="Tiberiogeo - é um site direcionado aos estudantes em geral e que curtem GEOGRAFIA e ATUALIDADES." />
   <meta rel="canonical" href="https://tiberiogeo.com.br">
   <meta name="robots" content="index, nofollow">
   <meta name="application-name" content="Site Tiberiogeo">
   <?php if (isset($resume)) : ?>
      <meta property="og:title" content="<?= esc($title); ?>" />
      <meta property="og:description" content="<?= isset($resume) ? esc($resume) : 'Tiberiogeo - é um site direcionado aos estudantes em geral e que curtem GEOGRAFIA e ATUALIDADES.'; ?>" />
      <meta property="og:url" content="<?= base_url() . '/article/' . $category . '/' . $link; ?>" />
      <meta property="og:image" content="<?= base_url() . '/assets/img/' . $category . '/' . $link . '/' . $image; ?>" />
   <?php endif ?>



   <link rel="shortcut icon" type="image/x-icon" href="<?= $favico; ?>">
   <!-- Site Title- -->
   <title><?= esc($title); ?></title>
   <!-- CSS   ==================================================== -->
   <!-- CSS here -->
   <style>
      .single-post ul li strong {
         background: #fff9b5;
         padding: 5px 6px;
         font-weight: 600;
      }

      .single-post p strong {
         background: #fff9b5;
         padding: 5px 6px;
         font-weight: 600;
      }

      .load {
         position: fixed;
         left: 0;
         top: 0;
         z-index: 999999;
         width: 100%;
         height: 100%;
         display: flex;
         justify-content: center;
         align-items: center;
         background: rgba(0, 0, 0, 0.4);
      }


      .loader {
         animation: is-rotating 1s infinite;
         border: 6px solid #e5e5e5;
         border-radius: 50%;
         border-top-color: #51d4db;
         height: 50px;
         width: 50px;
         display: flex;

      }

      @keyframes is-rotating {
         to {
            transform: rotate(1turn);
         }
      }     
      
   </style>
   <?php
   foreach ($css as $path) : ?>
      <link rel="stylesheet" href="<?= $path['path']; ?>">
   <?php endforeach; ?>
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]><script src="../../../oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="../../../oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="body-color">

   <?php echo view("site/header-temp.php"); ?>
   <?php echo view("site/header.php"); ?>
   <?= $this->renderSection('content') ?>



   <?php echo view("site/banner-main.php");  ?>
   <!-- footer social list start-->
   <section class="ts-footer-social-list">
      <div class="container">
         <div class="row">
            <div class="col-lg-4">
               <div class="footer-logo">
                  <?php
                  $image = [
                     'src' => base_url() . '/assets/images/logo/logo-footer.png'
                  ];

                  echo anchor('/', img($image)); ?>
               </div>
               <!-- footer logo end-->
            </div><!-- col end-->
            <div class="col-lg-8 align-self-center">


               <ul class="footer-social">
                  <li class="ts-facebook"><?= defineSocial('facebook', getenv('FACEBOOK'), true); ?></li>
                  <li class="ts-twitter"> <?= defineSocial('twitter', getenv('TWITTER'), true); ?></li>
               </ul>
            </div><!-- col end-->
         </div>
      </div>
   </section><!-- footer social list end-->
   <!-- newslater end -->
   <!-- footer start -->
   <footer class="ts-footer">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="footer-menu text-center">
                  <ul>
                     <li><?= anchor('/', 'Home'); ?></li>
                     <li><?= anchor('/category/world', 'Mundo'); ?></li>
                     <li><?= anchor('/category/brazil', 'Brasil'); ?></li>
                     <li><?= anchor('/category/geography', 'Geografia'); ?></li>
                     <li><?= anchor('/school', 'Escola'); ?></li>
                  </ul>
               </div>
               <div class="copyright-text text-center">
                  <p>&copy; <?= date('Y'); ?>, Tiberiogeo - é um site direcionado aos estudantes em geral e que curtem GEOGRAFIA e ATUALIDADES.<br>Todos os direitos reservados</p>
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

   array_map(function($path){
      echo '<script src="'.$path["path"].'"></script>';
   }, $js);
   ?>
   
   <script>
      function carregar() {
         $("#load").addClass("load");
         $("#loader").addClass("loader");

      }
   </script>
</body>

</html>