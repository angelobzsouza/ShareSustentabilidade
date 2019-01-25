
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Corpo Administrativo</title>
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

	<?php $this->load->view('cms/includes/navbar') ?>		

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-editar-corpo-administrativo" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Corpo Administrativo</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section id="fh5co-blog" class="mt-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-10 col-md-8 col-lg-6 text-center">
					<form action="<?= base_url('cms/Pessoas/updateCA') ?>" method="POST" id="form_curso">
						
						<label for="presidente">Presidente</label>
						<select id="presidente" class="form-control mb-3" required name="presidente">
							<?php foreach($pessoas as $pessoa) {?>
								<option value="<?= $pessoa->ID ?>" <?= $pessoa->ID == $cargos->Presidente ? "selected":"" ?>><?= $pessoa->Nome ?></option>
							<?php } ?>
						</select>
						
						<label for="vice-presidente">Vice-Presidente</label>
						<select id="vice-presidente" class="form-control mb-3" required name="vice-presidente">
							<?php foreach($pessoas as $pessoa) {?>
								<option value="<?= $pessoa->ID ?>" <?= $pessoa->ID == $cargos->VicePresidente ? "selected":"" ?>><?= $pessoa->Nome ?></option>
							<?php } ?>					
							</select>
						<label for="diretoria_marketing">Diretoria Marketing</label>
						<select id="diretoria_marketing" class="form-control mb-3" required name="diretoria_marketing">
							<?php foreach($pessoas as $pessoa) {?>
								<option value="<?= $pessoa->ID ?>" <?= $pessoa->ID == $cargos->Marketing ? "selected":"" ?>><?= $pessoa->Nome ?></option>
							<?php } ?>				
						</select>

						<label for="diretoria_financeiro">Diretoria Financeiro</label>
						<select id="diretoria_financeiro" class="form-control mb-3" required name="diretoria_financeiro">
							<?php foreach($pessoas as $pessoa) {?>
								<option value="<?= $pessoa->ID ?>" <?= $pessoa->ID == $cargos->Financeiro ? "selected":"" ?>><?= $pessoa->Nome ?></option>
							<?php } ?>						
						</select>

						<label for="relacoes_externas">Relações Externas</label>
						<select id="relacoes_externas" class="form-control mb-3" required name="relacoes_externas">
						<?php foreach($pessoas as $pessoa) {?>
							<option value="<?= $pessoa->ID ?>" <?= $pessoa->ID == $cargos->RelacoesExternas ? "selected":"" ?>><?= $pessoa->Nome ?></option>
						<?php } ?>					
						</select>

						<label for="recursos_humanos">Recursos Humanos</label>
						<select id="recursos_humanos" class="form-control mb-3" required name="recursos_humanos">
						<?php foreach($pessoas as $pessoa) {?>
							<option value="<?= $pessoa->ID ?>" <?= $pessoa->ID == $cargos->RH ? "selected":"" ?>><?= $pessoa->Nome ?></option>
							<?php } ?>							
						</select>

						<label for="diretoria_academica">Diretoria Acadêmica</label>
						<select id="diretoria_academica" class="form-control mb-3" required name="diretoria_academica">
						<?php foreach($pessoas as $pessoa) {?>
								<option value="<?= $pessoa->ID ?>" <?= $pessoa->ID == $cargos->Academica ? "selected":"" ?>><?= $pessoa->Nome ?></option>
							<?php } ?>						
						</select>

						<button type="submit" "name="btn_submit" id="btn_submit" class="btn btn-primary mt-3">Salvar</button>
					</form>
				</div><!-- /col -->
			</div>
		</div><!-- container -->
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

