<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Sobre</title>
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

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-sobre" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Sobre a Share</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="fh5co-about">
		<div class="container">
			<div class="about-content">
				<div class="row animate-box">
					<div class="col-md-6 col-md-push-6">
						<div class="desc text-justify">
							<h3>História</h3>
							<p>A Share - Centro de Línguas é uma entidade estudantil da UFSCar - Campus Sorocaba que surgiu no ano de 2017, com o intuito de disponibilizar o ensino de línguas para os alunos da universidade. Atualmente, além de oferecermos diversos cursos de línguas ainda atuamos em outras áreas (como dança e fotografia) e visamos sempre atingir novos objetivos.</p> 
						</div>
						<div class="desc text-justify">
							<h3>Missão &amp; Valores</h3>
							<p>Temos como missão compartilhar conhecimento linguístico com os alunos da nossa Universidade e da comunidade sorocabana, a fim de expandir os horizontes que, sem conhecimento de diferentes idiomas, possam ser limitados.
							<br>
							Os valores da Share objetiva apresentar as crenças, culturas e práticas que devem orientar o comportamento dos membros e diretores dessa entidade. São eles:
							<br>
							1. Colaboração
							As pessoas que compõem a Share presentam valores de colaboração. Por ser uma entidade que preza contribuir para uma melhoria da sociedade, é essencial que os membros e diretores possuam a cultura de colaborar com o próximo.
							<br>
							2. Proatividade
							Dentro da entidade precisamos de pessoas capazes de agir antecipadamente, evitando ou resolvendo situações e problemas futuro para um melhor desenvolvimento e crescimento da Share.
							<br>
							3. Resiliência
							Durante o cotidiano, poderá haver barreiras que possam prejudicar a gestão da entidade, por isso é extremamente importante que os membros e diretores possuam resiliência, capacidade de lidar com seus próprios problemas e vencer obstáculos a partir das dificuldades.
							<br>
							4. Diversidade
							Um fator que enriquece o cotidiano e a convivência entre as pessoas dentro da Share é a grande abrangência cultural que ela apresenta. Devendo haver sempre respeito com as diversas multiplicidades culturais existentes.
							<br>
							5. Inovação
							A Share sempre objetiva o crescimento da entidade e para que isso ocorra, as pessoas que a compõe precisam apresentar novidades para o melhor desenvolvimento da entidade..</p> 
						</div>
					</div>
					<div class="col-md-6 col-md-pull-6">
						<img class="img-responsive" src="<?= base_url('assets/images/login.jpg') ?>" alt="about">
					</div>
					
				</div>
			</div>

			<div class="row animate-box">
				<div class="row animate-box">
					<div class="col-md-12 text-center fh5co-heading">
						<h2>Conheça Nossa Equipe</h2>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
				<div class="col-md-12 text-center fh5co-heading">
					<div class="fh5co-blog animate-box">
						<!-- Presidente -->
						<?php if($presidente->Foto == NULL) {?>
							<img src="<?= base_url('assets/images/user-icon.png') ?>" alt="imagem-pessoa"></a>
						<?php } else { ?>
							<img src="<?= base_url('assets/uploads/images/'.$presidente->Foto) ?>" alt="imagem-pessoa"></a>
						<?php } ?>				
						<h3>Presidente</h3>
						<div class = "col-md-12 col-sm-3 animate-box" data-animate0effect="fadeIn">
							<p><?= $presidente->Sobre ?></p>
						</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-staff">
						<!-- Vice Presidente -->
						<?php if($vice_presidente->Foto == NULL) {?>
							<img src="<?= base_url('assets/images/user-icon.png') ?>" alt="imagem-pessoa"></a>
						<?php } else { ?>
							<img src="<?= base_url('assets/uploads/images/'.$vice_presidente->Foto) ?>" alt="imagem-pessoa"></a>
						<?php } ?>				
						<h3>Vice-Presidente</h3>
						<div class = "col-md-12 col-sm-3 animate-box" data-animate0effect="fadeIn">
							<p class=" text-justify wordwrap"><?= $vice_presidente->Sobre ?></p>
						</div> 
					</div>
				</div>

				<div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-staff">
						<?php if($diretoria_marketing->Foto == NULL) {?>
							<img src="<?= base_url('assets/images/user-icon.png') ?>" alt="imagem-pessoa"></a>
						<?php } else { ?>
							<img src="<?= base_url('assets/uploads/images/'.$diretoria_marketing->Foto) ?>" alt="imagem-pessoa"></a>
						<?php } ?>				
						<h3>Marketing</h3>
						<div class = "col-md-12 col-sm-3 animate-box" data-animate0effect="fadeIn">
							<p class=" text-justify wordwrap"><?= $diretoria_marketing->Sobre ?></p>
						</div> 
					</div>
				</div>

				<div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-staff">
						<?php if($diretoria_financeiro->Foto == NULL) {?>
							<img src="<?= base_url('assets/images/user-icon.png') ?>" alt="imagem-pessoa"></a>
						<?php } else { ?>
							<img src="<?= base_url('assets/uploads/images/'.$diretoria_financeiro->Foto) ?>" alt="imagem-pessoa"></a>
						<?php } ?>				
						<h3>Financeiro</h3>
						<div class = "col-md-12 col-sm-3 animate-box" data-animate0effect="fadeIn">
							<p class=" text-justify wordwrap"><?= $diretoria_financeiro->Sobre ?></p>
						</div> 
					</div>
				</div>

				<div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-staff">
						<?php if($relacoes_externas->Foto == NULL) {?>
							<img src="<?= base_url('assets/images/user-icon.png') ?>" alt="imagem-pessoa"></a>
						<?php } else { ?>
							<img src="<?= base_url('assets/uploads/images/'.$relacoes_externas->Foto) ?>" alt="imagem-pessoa"></a>
						<?php } ?>				
						<h3>Relações Externas</h3>
						<div class = "col-md-12 col-sm-3 animate-box" data-animate0effect="fadeIn">
							<p class=" text-justify wordwrap"><?= $relacoes_externas->Sobre ?></p>
						</div> 
					</div>
				</div>

				<div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-staff">
						<?php if($recursos_humanos->Foto == NULL) {?>
							<img src="<?= base_url('assets/images/user-icon.png') ?>" alt="imagem-pessoa"></a>
						<?php } else { ?>
							<img src="<?= base_url('assets/uploads/images/'.$recursos_humanos->Foto) ?>" alt="imagem-pessoa"></a>
						<?php } ?>				
						<h3>Recursos Humanos</h3>
						<div class = "col-md-12 col-sm-3 animate-box" data-animate0effect="fadeIn">
							<p class=" text-justify wordwrap"><?= $recursos_humanos->Sobre ?></p>
						</div> 
					</div>
				</div>

				<div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeIn">
					<div class="fh5co-staff">
						<?php if($diretoria_academica->Foto == NULL) {?>
							<img src="<?= base_url('assets/images/user-icon.png') ?>" alt="imagem-pessoa"></a>
						<?php } else { ?>
							<img src="<?= base_url('assets/uploads/images/'.$diretoria_academica->Foto) ?>" alt="imagem-pessoa"></a>
						<?php } ?>				
						<h3>Acadêmico</h3>
						<div class = "col-md-12 col-sm-3 animate-box" data-animate0effect="fadeIn">
							<p class=" text-justify wordwrap"><?= $diretoria_academica->Sobre ?></p>
						</div>  
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
	</body>
</html>

