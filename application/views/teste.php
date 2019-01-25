<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?= $teste->Nome ?></title>
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

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-teste" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1><?= $teste->Nome ?></h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-about">
		<section class="container">
			<form action="<?= base_url('testes/finalizaTeste') ?>" method="post">
				<div class="form-row mb-4">
					<div class="col-md-6">
						<input type="text" name="nome" id="nome" class="form-control" placeholder="Qual o seu nome?" required maxlength="50">
					</div>
					<div class="col-md-6">
						<input type="email" name="email" id="email" class="form-control" placeholder="Qual o seu email?" required maxlength="50">
					</div>
				</div>
				<?php $i = 0 ?>
				<?php foreach ($questoes as $questao) : ?>
					<div class="form-row justify-content-center">
						<div class="col-md-8">
							<h2 class="mt-5">Questão <?= $i + 1 ?></h2>
							<p class="text-justify wordwrap"><b>Pergunta: </b><?= $questao->Questao ?></p>
							<p><b>Respostas:</b></p>
							<input type="hidden" name="questao_<?= $i ?>_id" value="<?= $questao->ID ?>">
							<div class="custom-control custom-radio">
							  <input type="radio" id="resposta_a_<?= $i ?>" name="resposta_<?= $i ?>" class="custom-control-input" value="A" required>
							  <label class="custom-control-label" for="resposta_a_<?= $i ?>">a)</label>
							  <p class="text-justify wordwrap"><?= $questao->A ?></p>
							</div>
							<div class="custom-control custom-radio">
							  <input type="radio" id="resposta_b_<?= $i ?>" name="resposta_<?= $i ?>" class="custom-control-input" value="B" required>
							  <label class="custom-control-label" for="resposta_b_<?= $i ?>">b)</label>
							  <p class="text-justify wordwrap"><?= $questao->B ?></p>
							</div>
							<div class="custom-control custom-radio">
							  <input type="radio" id="resposta_c_<?= $i ?>" name="resposta_<?= $i ?>" class="custom-control-input" value="C" required>
							  <label class="custom-control-label" for="resposta_c_<?= $i ?>">c)</label>
							  <p class="text-justify wordwrap"><?= $questao->C ?></p>
							</div>
							<div class="custom-control custom-radio">
							  <input type="radio" id="resposta_d_<?= $i ?>" name="resposta_<?= $i ?>" class="custom-control-input" value="D" required>
							  <label class="custom-control-label" for="resposta_d_<?= $i ?>">d)</label>
							  <p class="text-justify wordwrap"><?= $questao->D ?></p>
							</div>
							<div class="custom-control custom-radio">
							  <input type="radio" id="resposta_e_<?= $i ?>" name="resposta_<?= $i ?>" class="custom-control-input" value="E" required>
							  <label class="custom-control-label" for="resposta_e_<?= $i ?>">e)</label>
							  <p class="text-justify wordwrap"><?= $questao->E ?></p>
							</div>
						</div>
					</div>
					<?php $i++ ?>
				<?php endforeach; ?>
				<input type="hidden" name="qtd_questoes" id="qtd_questoes" value="<?= $i ?>">
				<div class="col-md-12 text-center">
					<button type="submit" class="btn btn-primary my-4">Finalizar Teste</button>
				</div>
			</form>
		</section>
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
	<!-- Funções js da view -->
	<script type="text/javascript">
	</script>
	</body>
</html>

