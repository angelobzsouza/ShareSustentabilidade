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

	<?php $this->load->view('includes/navbar') ?>		

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-ensinar" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1><?= $curso->Nome ?></h1>
							<p class="text-white my-0"><?= $professores['professor_a']->Nome ?></p>
							<p class="text-white my-0"><?php if (!empty($professores['professor_b'])) {echo $professores['professor_b']->Nome;}?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section class="container" id="fh5co-blog">
		<div class="row">
			<!-- Coluna dos conteduos -->
			<div class="col-md-6 text-center">
				<h1>Conteúdos</h1>
				<?php if(isset($e_professor)) {?>
					<h5 class="text-right" style="height: 10px"><a href="<?= base_url('conteudos/cadastraConteudo/'.$curso->ID) ?>">Inserir</a></h5>
				<?php } ?>
				<table class="table text-left">
					<thead>
						<tr>
							<th scope="col">Nome</th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($conteudos as $conteudo) {?>
							<tr scope="row" id="linha<?= $conteudo->ID ?>">
								<td><?= $conteudo->conteudo_nome ?></td>
								<td class="text-right"><a href="<?= base_url('conteudos/conteudo/'.$conteudo->ID) ?>">ver</a></td>
								<!-- Se for professor habilita a opções de remover conteudo -->
								<?php if(isset($e_professor)) : ?>
									<td class="text-right"><button href="<?= base_url('conteudos/excluirConteudo/'.$conteudo->link."/".$conteudo->ID."/".$curso->ID) ?>" class="text-danger link" onclick="excluiConteudo(<?= $conteudo->ID ?>, '<?= $conteudo->link ?>')">remover</button></td>
								<?php endif ?>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div><!-- /col -->
			<!-- Coluna dos alunos -->
			<div class="col-md-6 text-center">
				<h1>Alunos</h1>
				<?php if(isset($e_professor)) {?>
					<h5 style="height: 10px"></h5>
				<?php } ?>
				<table class="table text-left">
					<thead>
						<tr>
							<th scope="col">Nome</th>
							<th scope="col">Email</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($alunos as $aluno) {?>
							<tr scope="row">
								<td><?= $aluno->nome ?></td>
								<td><?= $aluno->email ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>				
			</div>
		</div><!-- /row -->
	</section><!-- /container -->

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

