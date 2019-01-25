<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Nova Notícia</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/animate.css') ?>">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/icomoon.css') ?>">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/bootstrap.css') ?>">
	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/bootstrap/dist/css/style.css') ?>">
  <!-- Font-Awesome para o Froala -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- CSS Froala -->
	<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/froala-editor/css/froala_editor.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/froala-editor/css/froala_editor.pkgd.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/froala-editor/css/froala_style.min.css') ?>">
	<!-- Style Personalizado -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style_share.css') ?>">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/modernizr-2.6.2.min.js') ?>"></script>
	</head>

	<body>
	<div class="fh5co-loader"></div>
	
	<div id="page">

	<?php $this->load->view('cms/includes/navbar'); ?>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-cadastrar-noticia" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Nova Notícia</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section id="fh5co-blog" class="mt-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<form id="form_cadastro" method="POST" action="<?= base_url('cms/noticias/create') ?>" enctype="multipart/form-data">
						<div class="form-row mb-3">
							<div class="col-md-5 text-md-left text-center">
								<div class="container-img-noticia">
									<img src="<?= base_url('assets/images/seleciona-imagem.png') ?>" class="mb-4 mb-md-0 image-noticia" alt="imagem-noticia" onclick="selecionaAlterarFoto()" name="iamgem-noticia" id="imagem-noticia"/>
									<div class="middle">
								    <div class="text-img" onclick="selecionaAlterarFoto()">Selecionar</div>
								  </div>
								  <input type="file" class="sr-only" name="foto_input" id="foto_input" required>
							  </div>
							</div><!-- /col-md-6 -->
							<div class="col-md-7 text-left">
								<input type="text" class="form-control mb-3" placeholder="Título" id="titulo" name="titulo" required maxlength="50">
								<textarea id="previa" name="previa" class="form-control" rows="8" placeholder="Escreva uma prévia da notícia..." maxlength="350" minlength="200" required></textarea>
							</div><!-- /col-md-6 -->
						</div><!-- /form-row -->
								<textarea id="texto" name="texto" class="form-control" rows="10" required></textarea>
						<button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary mt-3">Salvar</button>
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
	<!-- Script CMS Share -->
	<script src="<?php echo base_url('assets/js/script_cms.js') ?>"></script>
	<!-- Script Share -->
	<script src="<?php echo base_url('assets/js/script.js') ?>"></script>
	<!-- Script Froala -->
	<script src="<?php echo base_url('assets/node_modules/froala-editor/js/froala_editor.pkgd.min.js') ?>"></script>
	<!-- Funções js da view -->
	<script type="text/javascript">
	</script>
	</body>
</html>

