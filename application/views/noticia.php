<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?= $noticia->Titulo ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Animate.css -->
		<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/animate.css') ?>">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/icomoon.css') ?>">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/bootstrap.css') ?>">
		<!-- Theme style  -->
		<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/style.css') ?>">
		<!-- Style Personalizado -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/style_share.css') ?>">

		<!-- Modernizr JS -->
		<script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/modernizr-2.6.2.min.js') ?>"></script>
	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
	<?php $this->load->view('includes/navbar') ?>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-noticia" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h2 class="text-center"><?= $noticia->Titulo ?></h2>
							<!-- Cria a data para que possa ser formatada -->
							<?php $date = date_create($noticia->SalvoEm) ?>
							<small class="text-white">Postado em <?=  date_format($date, "d/m/Y") ?> às <?=  date_format($date, "H:m") ?></small>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-about">
		<div class="container">
			<div class="about-content">
				<div class="row animate-box">

					<div class="col-md-6 col-md-push-6">
						<div id="texto"><?= $noticia->Texto ?></div>
					</div><!-- /col -->

					<div class="col-md-6 col-md-pull-6">
						<img class="img-fluid" src="<?= base_url('assets/uploads/images/'.$noticia->Foto) ?>" alt="imagem-noticia">
					</div><!-- /col -->

				</div><!-- /row -->
			</div><!-- /about-content -->
		</div><!-- /container -->
	</div><!-- /about -->

	<?php $this->load->view('includes/footer') ?>
	</div><!-- /page -->

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?php echo base_url('assets/node_modules/jquery/dist/jquery.min.js') ?>"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/jquery.easing.1.3.js') ?>"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
	<!-- Waypoints -->
	<script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/jquery.waypoints.min.js') ?>"></script>
	<!-- Main -->
	<script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/main.js') ?>"></script>
	<!-- Script Estilo Share -->
	<script src="<?php echo base_url('assets/js/script_style_share.js') ?>"></script>
	<!-- Script Estilo Share -->
	<script src="<?php echo base_url('assets/js/script.js') ?>"></script>
	</body>
</html>

