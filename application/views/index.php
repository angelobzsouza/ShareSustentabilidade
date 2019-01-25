<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Bem Vindo a Share!</title>
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

	<header id="fh5co-header" class="fh5co-cover header-index" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Share - Centro de Línguas</h1>
							<h2></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-project">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-12 text-center fh5co-heading">
					<h2 >Nossos Cursos</h2>
					<p>Estes são alguns dos cursos oferecidos pela nossa entidade</p>
				</div>
			</div>
			<div class="row">
				<?php $i = 0; ?>
				<?php foreach ($cursos as $curso) :?>
					<div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
						<a href="<?= base_url('testes'); ?>"><img src="<?= base_url('assets/images/plataforma/index/cursos-'.$i.'.jpg') ?>" alt="cursos-share" class="img-responsive">
							<h3><?= $curso->Nome ?></h3>
							<span><?= $curso->professor ?></span>
						</a>
					</div>
				<?php $i++ ?>	
				<?php endforeach ?>
			</div><!-- /row -->
		</div><!-- /container -->
	</div>

	<div id="fh5co-blog" class="fh5co-bg-section fundo-noticias-index">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-12 text-center fh5co-heading">
					<h2 class="text-white">Ultímas Notícias</h2>
					<p class="text-white">Veja nossas últimas notícias e fique por dentro de tudo o qu está acontecendo na Share.</p>
				</div>
			</div><!-- /row -->
			<div class="row">
				<?php foreach ($noticias as $noticia) {?>
					<div class="col-lg-4 col-md-6">
						<div class="fh5co-blog animate-box">
							<a href="<?= base_url('noticia/'.$noticia->ID) ?>"><img class="img-responsive" src="<?= base_url('assets/uploads/images/'.$noticia->Foto) ?>" alt="imagem-noticia"></a>
							<div class="blog-text" style="height: 360px">
								<h3><a href="<?= base_url('noticia/'.$noticia->ID) ?>"><?= strlen($noticia->Titulo)>20 ? substr($noticia->Titulo, 0, 20)."...": $noticia->Titulo?></a></h3>
								<!-- Cria a data para que possa ser formatada -->
								<?php $date = date_create($noticia->SalvoEm) ?>
								<span class="posted_on"><?= date_format($date, "d/m/Y - H:m") ?></span>
								<p class="text-justify"><?= substr($noticia->Previa, 0, 150)."..." ?></p>
								<a href="<?= base_url('noticia/'.$noticia->ID) ?>" class="btn btn-primary">Veja mais...</a>
							</div> 
						</div>
					</div>
				<?php } ?>
			</div><!-- /row -->
		</div><!-- /container -->
	</div><!-- fh5co-blog -->


	<div id="fh5co-services h-100" class="fh5co-bg-section">
		<div class="container py-5">
			<div class="row py-5">
				<div class="col-md-4 col-sm-4">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon text-justify">
							<i class="icon-pencil"></i>
						</span>
						<h3>Sobre</h3>
						<p>A Share é uma entidade da Universidade Federal de São Carlos - Campus Sorocaba. Objetiva incentivar o aprendizado de línguas e atividades culturais.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon text-justify">
							<i class="icon-menu"></i>
						</span>
						<h3>Missão</h3>
						<p>Nossa missão é compartilhar conhecimento linguístico com os alunos, a fim de expandir os horizontes dos mesmos e inibir quaisquer limitações.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon text-justify">
							<i class="icon-eye"></i>
						</span>
						<h3>Visão</h3>
						<p>Ser reconhecida como uma entidade sem fins lucrativos que disponibiliza ensino de qualidade de distintas naturezas para a comunidade.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

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

