<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Novo Questão</title>
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

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-cadastrar-questao" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Inserir Questão</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section id="fh5co-blog" class="mt-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-10 col-md-8 col-lg-7">
					<form id="form_conteudo" method="POST" action="<?= base_url('cms/testes/storeQuestao') ?>" enctype="multipart/form-data">
						<input type="hidden" name="teste_id" id="teste_id" value="<?= $teste_id ?>">
					  <div class="form-group">
					    <textarea class="form-control" rows="5" id="quatao" name="questao" placeholder="Corpo da questão..." maxlength="400" required></textarea>
					    <small class="text-left">No máximo 400 caracteres</small>
					  </div>
					  <div class="form-group">
					    <textarea class="form-control" rows="5" id="a" name="a" placeholder="Alternativa A..." maxlength="400" required></textarea>
					    <small class="text-left">No máximo 400 caracteres</small>
					  </div>
					  <div class="form-group">
					    <textarea class="form-control" rows="5" id="b" name="b" placeholder="Alternativa B..." maxlength="400" required></textarea>
					    <small class="text-left">No máximo 400 caracteres</small>
					  </div>
					  <div class="form-group">
					    <textarea class="form-control" rows="5" id="c" name="c" placeholder="Alternativa C..." maxlength="400" required></textarea>
					    <small class="text-left">No máximo 400 caracteres</small>
					  </div>
					  <div class="form-group">
					    <textarea class="form-control" rows="5" id="d" name="d" placeholder="Alternativa D..." maxlength="400" required></textarea>
					    <small class="text-left">No máximo 400 caracteres</small>
					  </div>
					  <div class="form-group">
					    <textarea class="form-control" rows="5" id="e" name="e" placeholder="Alternativa E..." maxlength="400" required></textarea>
					    <small class="text-left">No máximo 400 caracteres</small>
					  </div>
					  <div class="form-group text-center">
					  	<h2>Alternativa Correta</h2>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="resposta_a" name="resposta" class="custom-control-input" value="A">
							  <label class="custom-control-label" for="resposta_a">Letra A</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="resposta_b" name="resposta" class="custom-control-input" value="B">
							  <label class="custom-control-label" for="resposta_b">Letra B</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="resposta_c" name="resposta" class="custom-control-input" value="C">
							  <label class="custom-control-label" for="resposta_c">Letra C</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="resposta_d" name="resposta" class="custom-control-input" value="D">
							  <label class="custom-control-label" for="resposta_d">Letra D</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
							  <input type="radio" id="resposta_e" name="resposta" class="custom-control-input" value="E">
							  <label class="custom-control-label" for="resposta_e">Letra E</label>
							</div>
					  </div>
					  <div class="text-center">
					  	<button type="submit" class="btn btn-primary">Salvar</button>
						</div>
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
	<!-- Script Estilo Share -->
	<script src="<?php echo base_url('assets/js/script.js') ?>"></script>
	<!-- Funções js da view -->
	<script type="text/javascript">
	</script>
	</body>
</html>

