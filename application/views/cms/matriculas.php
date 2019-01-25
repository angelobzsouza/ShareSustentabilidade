<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $curso->Nome ?> - Matriculas</title>
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
	 <!-- Datatable CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/datatable/datatables.min.css') ?>">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url('assets/node_modules/bootstrap/dist/js/modernizr-2.6.2.min.js') ?>"></script>
	</head>

	<body>
	<div class="fh5co-loader"></div>
	
	<div id="page">

	<?php $this->load->view('cms/includes/navbar') ?>

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-matriculas" role="banner">
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

	<section id="fh5co-blog">
		<div class="container">
			<form method="post" action="<?= base_url('cms/cursos/salvaMatriculas') ?>">
				<input type="hidden" name="id_curso" id="id_curso" value="<?= $curso->ID ?>">

				<div class="row">
					<div class="col-12">
						<h1 class="mt-4">Alunos Matriculados</h1>
					</div><!-- /col -->
					<div class="col-12">
						<table class="table" id="tabela_matriculados">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Email</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($matriculados as $aluno)  {?>
									<tr id="linha_aluno_<?= $aluno->ID ?>">
										<td><?= $aluno->nome ?></td>
										<td><?= $aluno->email ?></td>
										<td><button type="button" id="botao_aluno_<?= $aluno->ID ?>" class="link text-danger" onclick="desmatricula(<?= $aluno->ID ?>)">Desmatricular</button></td>
										<input type="hidden" id="input_aluno_<?= $aluno->ID ?>" name="matriculados[]" value="<?= $aluno->ID ?>">
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div><!-- /col -->
				</div><!-- /row -->

				<div class="row">
					<div class="col-12">
						<h1 class="mt-4">Alunos Não Matriculados</h1>
					</div><!-- /col -->
					<div class="col-12">
						<table class="table" id="tabela_nao_matriculados">
						<thead>
							<tr>
								<th>Nome</th>
								<th>Email</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($nao_matriculados as $aluno)  {?>
								<tr id="linha_aluno_<?= $aluno->ID ?>">
									<td><?= $aluno->Nome ?></td>
									<td><?= $aluno->Email ?></td>
									<td><button type="button" id="botao_aluno_<?= $aluno->ID ?>" class="link text-primary" onclick="matricula(<?= $aluno->ID ?>)">Matricular</button></td>
									<input type="hidden" id="input_aluno_<?= $aluno->ID ?>" name="nao_matriculados[]" value="<?= $aluno->ID ?>">
								</tr>
							<?php } ?>
						</tbody>
						</table>
					</div><!-- /col -->
				</div><!-- /row -->

				<div class="row">
					<div class="col-12 text-center">
						<button type="submit" class="btn btn-primary">Salvar</button>
					</div><!-- /col -->
				</div><!-- /row -->
			</form>
		</div><!-- /container -->
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
	<script src="<?php echo base_url('assets/js/script_cms.js') ?>"></script>
	<!-- Configurações das datatables -->
  <script src ="<?php echo base_url('assets/js/data_tables_share.js') ?>"></script>
  <!-- Datatable JS -->
  <script src ="<?php echo base_url('assets/datatable/datatables.min.js') ?>"></script>

	</body>
</html>

