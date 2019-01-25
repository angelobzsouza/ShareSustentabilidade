<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Novo Professor</title>
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

	<?php $this->load->view('cms/includes/navbar'); ?>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-cadastrar-professor" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Novo Professor</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section id="fh5co-blog" class="mt-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-10 col-md-8 col-lg-4 text-center">
					<form id="form_cadastro" method="POST" action="<?= base_url('cms/pessoas/salvaPessoa') ?>">
						<input type="hidden" name="nivel_acesso" id="nivel_acesso" value="1">
						<input type="text" class="form-control mb-3" placeholder="Nome" id="nome" name="nome" required maxlength="45">
						<input type="email" class="form-control mb-3" placeholder="Email" id="email" name="email" required maxlength="200" onblur="existeEmail(false)">
						<input type="email" class="form-control mb-3" placeholder="Confirmar Email" id="email2" name="email2" required maxlength="200">
					  <button type="submit" class="btn btn-primary">Salvar</button>
					</form>
				</div>
			</div>
		</div>
	</section>

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
	<!-- Script Share -->
	<script src="<?php echo base_url('assets/js/script.js') ?>"></script>
	<!-- Script Share -->
	<script src="<?php echo base_url('assets/js/script_cms.js') ?>"></script>
	<!-- Funções js da view -->
	<script type="text/javascript">
	</script>
	</body>
</html>

