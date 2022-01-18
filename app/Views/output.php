<!DOCTYPE html>	
<html>
	<head>
		<title>Tiberiogeo-A Geografia Levada a Sério!</title>
		<style>
			
			html, body {
			color: rgba(33, 37, 41, 1);
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
			font-size: 16px;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			text-rendering: optimizeLegibility;
		}
		.fontAticle {
			font-size: 0.8 rem;
		}
		.date{
			font-size: 0.8 rem;
		}
		p {
			text-align: justify
		}
		header > span{
			text-align: justify;
			padding-top: 5px;
			display:block;
			
		}
		footer {
			text-align: center;
			font-size: 0.8 rem;
		}
		
		hr{
			color: #eee;
			margin: 3px 0;
		}
		#rodape::after { 
			content: 'Acesse: tiberiogeo.com.br | Número de páginas: ' counter(page); }
      #rodape {
        /* string-set: footing content(); 
        running: footer;*/
        position: fixed;
        bottom: -10px;
        left: 0;
        right: 10px;
        height: 12px;

        /** Extra personal styles **/
        color: black;
        text-align: right;
        line-height: 12px;
        padding: 2em auto 0;
        max-width: 767px;
      }
      @page {
        size: A4 portrait;
              margin: 1.5cm 1cm 1.2cm;
        counter-increment: page;
         }
		</style>
	</head>
	<body>
		<header>
		<img src="<?=base_url();?>/assets/images/logo/logo-topo.png"/>
		<?php
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
		echo '<span class="date">Gerando em: Campina Grande, ' . (strftime(' %d de %B de %Y', strtotime(date('Y-m-d')))) . '.</span>'; 
		?>
		<hr>
		
		<h2><?=$title;?></h2>
		<span><?=$resume;?></span>
		<span class="fontAticle">Fonte: <?=$font;?></span>
		</header>
		<hr>
		<?=$text;?>
		<?=$textSecond;?>
		<hr>
		<footer>
				<span class="footer">&copy; <?=date('Y');?>- Tiberiogeo - é um site direcionado aos estudantes em geral e que curtem GEOGRAFIA e ATUALIDADES.Todos os direitos reservados</span>

				
        </div>
		<div id="rodape">
		</div>
		
		
		
		
		</footer>
		
		       
	</body>
</html>	