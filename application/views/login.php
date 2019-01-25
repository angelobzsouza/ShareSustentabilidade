<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Login</title>
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

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-login" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section id="fh5co-blog" class="mt-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-6 col-10 text-center">
					<form id="form_login" method="POST" action="<?= base_url('pessoas/loga') ?>">
						<h2>Login</h2>
					  <div class="form-group">
					    <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Email" maxlength="200">
					  </div>
					  <div class="form-group">
					    <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" onkeypress="enterSenha(event);" maxlength="200">
					  </div>
					  <div class="form-group">
					  	<button type="button" class="btn btn-primary" onclick="verificaSenha()">Entrar</button>
					  </div>
					  <div class="form-group">
							<button type="button" class="link text-primary" onclick="habilitaRecuperacaoSenha()">Esqueceu sua senha?</button>
					  </div>
					</form>
					<div id="recuperar_senha" class="sr-only text-center">
						<form action="<?= base_url('pessoas/enviaEmailSenha') ?>" method="post" id="form_recupera_senha">
							<h2>Recuperar Senha</h2>
							<p class="text-justify">Enviaremos um email com um link de recuperação de senha para seu email</p>
							<input type="email" name="email_senha" id="email_senha" class="form-control" maxlength="200" placeholder="Digite seu email">
							<button type="submit" class="btn btn-primary my-4">Enviar Email</button>
						</form>
					</div>
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

