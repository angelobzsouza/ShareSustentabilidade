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

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-formulario-professor" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Quero ser professor!</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<section id="fh5co-blog">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 text-center">
					<h3><label class="text-center">Informações básicas</label></h3>
					<form action="<?= base_url('formularios/salvaFormularioProfessor') ?>" method="post">
						<div class="form-row">
							<!--nome-->
							<div class="form-group col-md-12">
								<label for="nome"></label>
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" maxlength="50" required>
							</div>
							<!--idade-->
							<div class="form-group col-md-12">
								<label for="idade"></label>
								<input type="number" class="form-control" id="idade" name="idade" placeholder="Idade" required>
							</div>
							<!--email-->
							<div class="form-group col-md-12">
								<label for="email"></label>
								<input type="email" class="form-control" id="email" name="email" placeholder="E-mail" maxlength="50" required>
							</div>
							<!--RG-->
							<div class="form-group col-md-12">
								<label for="rg"></label>
								<input type="text" class="form-control" id="rg" name="rg" placeholder="RG" maxlength="14" required>
							</div>
							<!--telefone-->
							<div class="form-group col-md-12">
								<label for="telefone"></label>
								<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" maxlength="16" required>
							</div>
							<!-- link do facebook-->
							<div class="form-group col-md-12">
								<label for="facebook"></label>
								<input type="text" class="form-control" id="facebook" name="facebook" placeholder="Link do Facebook" maxlength="50" required>
							</div>
							<!-- é aluno da ufscar-->
							<div class="form-group col-md-12 my-4">
								<h3><label>É aluno da UFSCar?</label></h3>
								<div class="form-group">
  								<div class="col-12 text-left">
										<div class="custom-control custom-radio">
										  <input type="radio" id="e_aluno_sim" name="e_aluno" class="custom-control-input" value="1" onchange="mostraAluno(true)" required>
										  <label class="custom-control-label" for="e_aluno_sim">Sim</label>
										</div>
										<div class="custom-control custom-radio">
										  <input type="radio" id="e_aluno_nao" name="e_aluno" class="custom-control-input" value="0" onchange="mostraAluno(false)" required>
										  <label class="custom-control-label" for="e_aluno_nao">Não</label>
										</div>
    							</div>
    						</div>
							</div>
							<!--curso, ingresso e RA-->
							<div class="form-group col-md-12 sr-only" id="informacoes_aluno">
								<input type="text" id="input_informacoes_aluno" name="informacoes_aluno" class="form-control" placeholder="Qual o curso, ano de entrada e RA?" maxlength="50" required>
							</div>
							<!--gual gusto gostaria de lecionar?-->
							<div class="form-group col-md-12 my-4">
								<h3><label>Qual curso você gostaria de lecionar?</label></h3>
								<div class="form-group">
  								<div class="col-12 text-left">
										<div class="custom-control custom-radio">
										  <input type="radio" id="curso_idiomas" name="qual_aula" class="custom-control-input" value="Idiomas" required onchange="habilitaOutroCurso(this.value)">
										  <label class="custom-control-label" for="curso_idiomas">Idiomas</label>
										</div>
										<div class="custom-control custom-radio">
										  <input type="radio" id="curso_teatro" name="qual_aula" class="custom-control-input" value="Teatro" required onchange="habilitaOutroCurso(this.value)">
										  <label class="custom-control-label" for="curso_teatro">Teatro</label>
										</div>
										<div class="custom-control custom-radio">
										  <input type="radio" id="curso_danca" name="qual_aula" class="custom-control-input" value="Danca" required onchange="habilitaOutroCurso(this.value)">
										  <label class="custom-control-label" for="curso_danca">Dança</label>
										</div>
										<div class="custom-control custom-radio">
										  <input type="radio" id="curso_oratoria" name="qual_aula" class="custom-control-input" value="Oratória" required onchange="habilitaOutroCurso(this.value)">
										  <label class="custom-control-label" for="curso_oratoria">Oratória</label>
										</div>
										<div class="custom-control custom-radio">
										  <input type="radio" id="curso_desenho" name="qual_aula" class="custom-control-input" value="Desenho" required onchange="habilitaOutroCurso(this.value)">
										  <label class="custom-control-label" for="curso_desenho">Desenho</label>
										</div>
										<div class="custom-control custom-radio">
										  <input type="radio" id="curso_musica" name="qual_aula" class="custom-control-input" value="Musica" required onchange="habilitaOutroCurso(this.value)">
										  <label class="custom-control-label" for="curso_musica">Música</label>
										</div>
										<div class="custom-control custom-radio">
										  <input type="radio" id="curso_fotografia" name="qual_aula" class="custom-control-input" value="Fotografia" required onchange="habilitaOutroCurso(this.value)">
										  <label class="custom-control-label" for="curso_fotografia">Fotografia</label>
										</div>
										<div class="custom-control custom-radio">
										  <input type="radio" id="curso_outro" name="qual_aula" class="custom-control-input" value="Outro" required onchange="habilitaOutroCurso(this.value)">
										  <label class="custom-control-label" for="curso_outro">Outro: </label>
										</div>

    								<div id="div_outro_curso" class="sr-only">
    									<input type="text" name="qual_aula" id="input_outro_curso" class="form-control" placeholder="Qual?">
    								</div>
    								<div id="div_idioma" class="sr-only">
    									<input type="text" name="qual_aula" id="input_curso_idioma" class="form-control" placeholder="Qual?">
    								</div>
    							</div>
								</div>
							</div>

							<!-- possui certificado?-->
							<div class="form-group col-md-12">
								<h3><label>Possui certificado de alguma escola de idiomas/sobre o conteúdo a lecionar?</label></h3>
								<div class="form-group">
  								<div class="col-12 text-left">
										<div class="custom-control custom-radio">
										  <input type="radio" id="certificado_sim" name="certificado" class="custom-control-input" value="1" required onchange="habilitaCertificado(true)">
										  <label class="custom-control-label" for="certificado_sim">Sim</label>
										</div>
										<div class="custom-control custom-radio">
										  <input type="radio" id="certificado_nao" name="certificado" class="custom-control-input" value="0" required onchange="habilitaCertificado(false)">
										  <label class="custom-control-label" for="certificado_nao">Não</label>
										</div>
    								<div id="div_certificado">
    									<input type="text" name="qual_escola" id="input_escola" class="form-control sr-only" placeholder="Qual escola?">
    									<input type="text" name="como_aprendeu" id="input_aprender" class="form-control sr-only" placeholder="Como aprendeu?">
    								</div>
	    						</div>
	    					</div>
	    				</div>
							<!--porque gostaria de ser professo?-->
							<div class="form-group col-md-12 my-4">
								<div class="form-group">
									<textarea name="porque" class="form-control" placeholder="Por que você gostaria de ser professor da Share?" maxlength="1000" rows="5" required></textarea>
								</div>
							</div>

							<!-- edital -->
							<div class=" form-group col-md-12 my-4 radio text-center mt-4">
								<div class="custom-control custom-checkbox">
								  <input type="checkbox" id="edital" name="edital" class="custom-control-input" value="1" required>
								  <label class="custom-control-label" for="edital">Li atentamente o <a href="#">edital</a> e aceito os termos e condições</label>
								</div>
			     		</div>
								
							<div class="col-12 text-center">
								<button type="submit" class="btn btn-primary">Enviar</button>
							</div>
						</div><!-- /form-row -->			    				
					</form>
				</div><!-- /col -->	
			</div><!--row-->
		</div><!--container-->
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

