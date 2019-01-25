<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Noticias</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/animate.css') ?>">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/icomoon.css') ?>">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/bootstrap.css') ?>">
	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/style.css') ?>">
	<!-- WYSIWYG CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/mdb.min.css') ?>">
	<!-- Style Personalizado -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style_share.css') ?>">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/modernizr-2.6.2.min.js') ?>"></script>
	</head>

	<body>
	<div class="fh5co-loader"></div>
	
	<div id="page">

	<?php $this->load->view('cms/includes/navbar') ?>		

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-lista-noticias" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Noticias</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section id="fh5co-blog">
		<div class="container">
			<h5 class="text-right"><a href="<?= base_url('cms/noticias/createView') ?>" class="link text-primary">Inserir</a></h5>
			<table class="table table-hover table-striped">
				<thead>
					<tr class="row">
						<th class="col-10 font-weight-bold">Nome</th>
						<th class="col-1"></th>
						<th class="col-1"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($noticias as $noticia)  {?>
						<tr id="linha<?= $noticia->ID ?>" class="row">
							<td class="col-10"><?= $noticia->Titulo ?></td>
							<td class="col-1"><a class="link text-primary" href="<?= base_url('cms/noticias/updateView/'.$noticia->ID) ?>">Editar</a></td>
							<td class="col-1"><button type="button" class="link text-danger" onclick="excluiNoticia(<?= $noticia->ID ?>)">Excluir</button></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
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
	<!-- Script WYSIWYG -->
	<script src="<?php echo base_url('assets/js/mdb.min.js') ?>"></script>
	<!-- Script Estilo Share -->
	<script src="<?php echo base_url('assets/js/script_cms.js') ?>"></script>
	<!-- Funções js da view -->
	<script type="text/javascript">
	</script>
	</body>
</html>

