<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Participe</title>
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

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-inscrever" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Inscreva-se!</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="page">
		<div class="container">
			<!-- Videos -->
			<div class="row justify-content-center my-0 my-md-4">
				<div class="col-md-8">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" width="600" height="500" src="https://www.youtube.com/embed/X-kfW2728Wk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div><!-- /embed-responsive -->
				</div><!-- /col -->
			</div><!-- /row -->
			<div class="row">
				<div class="col-12 text-center">
					<h5>Para preencher o formulário e concorrer a uma vaga <a href="#">Clique Aqui!</a></h5>
				</div>

			<!-- Se não houver testes -->
			<?php if (empty($testes)): ?>
				<div class="col-md-12 text-center">
					<h2>Desculple, mas não há testes disponíveis no momento.</h2>
				</div>
			<!-- Caso tenha testes -->
			<?php else : ?>
				</div><!-- /row -->
				<div class="row">
					<div class="col-md-12 text-center">
						<h2>Testes de Proficiência</h2>
						<!-- Tabela com os tetes -->
						<table class="table table-striped">
							<thead>
								<tr>
									<td class="text-left">Nome do Teste</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($testes as $teste) : ?>
									<tr>
										<td class="text-left"><?= $teste->Nome ?></td>
										<td class="text-right"><a href="<?= base_url('testes/teste/'.$teste->ID) ?>">Realizar</a></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php endif ?>
		</div><!-- /container -->
	</div><!-- /Page -->

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

