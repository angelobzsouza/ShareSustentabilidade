<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Meu Perfil</title>
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

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-perfil" role="banner" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<div class="container-img">
	 							<?php if($pessoa->Foto == NULL) {?>
									<img id="foto_perfil" src="<?= base_url('assets/images/user-icon.png') ?>" class="rounded-circle image" alt="foto-perfil" onclick="selecionaAlterarFoto()" height="225" width="225">
								<?php } else { ?>
									<img id="foto_perfil" src="<?= base_url('assets/uploads/images/'.$pessoa->Foto) ?>" class="rounded-circle image" alt="foto-perfil" onclick="selecionaAlterarFoto()" height="225" width="225">
								<?php } ?>	
							  <div class="middle">
							    <div class="text-img" onclick="selecionaAlterarFoto()">Alterar</div>
							  </div>
							</div><!-- container-img -->
							<h2 class="text-white" id="nome_header">Olá <?= $pessoa->Nome ?>!</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<form id="form_foto_perfil" enctype="multipart/form-data" method="POST">
		<input type="file" name="foto_input" id="foto_input" class="sr-only" onchange="alteraFotoPerfil()">;
	</form>

	<section id="fh5co-blog">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-12 text-center">
					<h2>Perfil</h2>
				</div>
				<!-- Infos -->
				<div class="col-md-4">
					<p id="txt_nome"><span class="font-weight-bold">Nome:</span> <?= $pessoa->Nome ?></p>
					<input type="text" name="nome" id="nome" class="form-control mb-2 sr-only" value="<?= $pessoa->Nome ?>" maxlength="45">
					<p id="txt_email"><span class="font-weight-bold">Email:</span> <?= $pessoa->Email ?></p>
					<input type="email" name="email" id="email" class="form-control mb-2 sr-only" value="<?= $pessoa->Email ?>" maxlength="200">
					<p id="txt_data_nasc"><span class="font-weight-bold">Data de Nascimeto:</span> <?= $pessoa->DataNascimento ?></p>
					<input type="text" name="data_nascimento" id="data_nascimento" class="form-control mb-2 sr-only" value="<?= $pessoa->DataNascimento ?>" maxlength="10" onkeypress="maskFunction(this, '##/##/####')">
				</div>
				<!-- Sobre -->
				<div class="col-md-4">
					<p id="txt_sobre" class="text-justify wordwrap"><?= $pessoa->Sobre ?></p>
					<textarea id="sobre" class="form-control sr-only" rows="5" maxlength="500"><?= $pessoa->Sobre ?></textarea>
				</div>
				<!-- Opções -->
				<div class="col-md-4 text-center">
					<div class="row justify-content-center">
						<div class="col-md-10 col-lg-8 my-1">
							<?php if($pessoa->NivelAcesso == 2) {?>
								<a href="<?= base_url('cms') ?>" class="btn btn-block btn-primary">Dashboard</a>
							<?php } ?>
						</div>
						<div class="col-md-10 col-lg-8 my-1 justify-content-center">
							<button id="btn_editar" class="btn btn-primary btn-block" onclick="alteraInfosPessoa()">Editar Info</button>
							<button id="btn_salvar" class="btn btn-primary btn-block sr-only" onclick="salvaInfosPessoa()">Salva Info</button>
						</div>
						<div class="col-md-10 col-lg-8 my-1 justify-content-center">
							<button id="btn_editar_senha" class="btn btn-primary btn-block" onclick="habilitaEdicaoSenha()">Editar Senha</button>
							<button id="btn_salvar_senha" class="btn btn-primary btn-block sr-only" onclick="alteraSenha()">Salvar Senha</button>	
						</div>
					</div>
				</div>
			</div><!-- /row -->
			<div class="row mt-4">
				<div class="col-md-4">
					<input type="password" name="senha_atual" id="senha_atual" class="form-control sr-only" maxlength="50" placeholder="Digite sua senha">
				</div>
				<div class="col-md-4">
					<input type="password" name="nova_senha" id="nova_senha" class="form-control sr-only" maxlength="50" placeholder="Nova senha">
				</div>
				<div class="col-md-4">
					<input type="password" name="nova_senha2" id="nova_senha2" class="form-control sr-only" maxlength="50" placeholder="Confirmar nova senha">
				</div>
			</div><!-- /row -->
		</div><!-- /container-fluid -->
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

