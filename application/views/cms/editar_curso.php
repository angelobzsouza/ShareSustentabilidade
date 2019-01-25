<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $curso->Nome ?></title>
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

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-editar-curso" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1><?= $curso->Nome ?></h1>
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
					<form action="<?= base_url('cms/cursos/atualizaCurso') ?>" method="POST" id="form_curso">
						<input type="hidden" name="id" id="id" value="<?= $curso->ID ?>">
						<input type="text" class="form-control mb-3" name="nome" id="name" required maxlength="45" placeholder="Nome" value="<?= $curso->Nome ?>">
						<select id="professor_a" class="form-control mb-3" required name="professor_a">
							<option value="">Professor Responsável</option>
							<?php foreach($professores as $professor) {?>
								<option value="<?= $professor->ID ?>" <?php if ($professor->ID == $curso->IDProfessorA) {echo "selected";} ?>><?= $professor->Nome ?></option>
							<?php } ?>
						</select>
						<select id="professor_b" class="form-control mb-3" name="professor_b">
							<option value="">Segundo Professor</option>
							<?php foreach($professores as $professor) {?>
								<option value="<?= $professor->ID ?>" <?php if ($professor->ID == $curso->IDProfessorB) {echo "selected";} ?>><?= $professor->Nome ?></option>
							<?php } ?>
						</select>
						<select id="ativo" class="form-control mb-5" name="ativo">
							<option value="1" <?php if ($curso->Ativo == 1) {echo "selected";} ?>>Ativo</option>
							<option value="0" <?php if ($curso->Ativo == 0) {echo "selected";} ?>>Inativo</option>
						</select>
						<button type="submit" class="btn btn-primary">Salvar</button>
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

