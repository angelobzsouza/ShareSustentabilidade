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

	<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-formulario-administrador" role="banner">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Quero ser administrador!</h1>
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
					<form>
						<div class="form-row">
							<!--nome-->
							<div class="form-group col-md-12">
								<label for="nome"></label>
								<input type="text" class="form-control" id="nome" placeholder="Nome" maxlength="50">
							</div>
							<!--email-->
							<div class="form-group col-md-12">
								<label for="email"></label>
								<input type="email" class="form-control" id="email" placeholder="E-mail" maxlength="50">
							</div>
							<!--Data Nascimento-->
							<div class="form-group col-md-12">
								<label for="data_nascimento"></label>
								<input type="text" class="form-control" id="data_nascimento" placeholder="Data de Nascimento ">
							</div>
							<!--telefone-->
							<div class="form-group col-md-12">
								<label for="telefone"></label>
								<input type="text" class="form-control" id="telefone" placeholder="Telefone" maxlength="16">
							</div>
							<!-- link do facebook-->
							<div class="form-group col-md-12">
								<label for="facebook"></label>
								<input type="text" class="form-control" id="facebook" placeholder="Link do Facebook" maxlength="50">
							</div>
							<!-- link do LinkedIn-->
							<div class="form-group col-md-12">
								<label for="linkedIn"></label>
								<input type="text" class="form-control" id="linkedIn" placeholder="Link do LinkedIn" maxlength="50">
							</div>
							<!--RA-->
							<div class="form-group col-md-12">
								<label for="rg"></label>
								<input type="text" class="form-control" id="ra" placeholder="RA" maxlength="6">
							</div>
							<!--Ano de ingresso-->
							<div class="form-group col-md-12">
								<label for="ingresso"></label>
								<input type="text" class="form-control" id="ingresso" placeholder="Ano de ingresso na UFSCar" maxlength="4">
							</div>

							<!--qual curso?-->
							<div class="form-group col-md-12 my-4">
								<h3><label>Curso</label></h3>
								<form class="form-horizontal">
	 								<fieldset>
		  								<div class="form-group col-xl-6">
			   								<h6>
			   									<label class="col-xs-9 control-label"></label>
			  								<div class="col-xs-3">
			  							    	<div class="radio text-left">
				     								<label>
				      								<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
				      								Administração</label>
			    								</div>
			   									<div class="radio text-left">
			     									<label>
			      									<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
			      									Ciências Biológicas</label>
			    								</div>
			   									<div class="radio text-left">
			     									<label>
			     									<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
			      									Ciência da Computação</label>
			    								</div>
			    								<div class="radio text-left">
			     									<label>
			     									<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
			      									Ciências Econômicas</label>
			    								</div>	    								
			    								<div class="radio text-left">
			     									<label>
			     									<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
			      									Engenharia de Produção</label>
			    								</div>
			    								<div class="radio text-left">
			     									<label>
			     									<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
			      									Engenharia Florestal</label>
			    								</div>
			    								<div class="radio text-left">
			     									<label>
			     									<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
			      									Física</label>
			    								</div>
			    								<div class="radio text-left">
			     									<label>
			     									<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
			      									Geografia</label>
			    								</div>
			    								<div class="radio text-left">
			     									<label>
			     									<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
			      									Matemática</label>
			    								</div>
			    								<div class="radio text-left">
			     									<label>
			     									<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
			      									Pedagogia</label>
			    								</div>
			    								<div class="radio text-left">
			     									<label>
			     									<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
			      									Química</label>
			    								</div>
			    								<div class="radio text-left">
			     									<label>
			     									<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
			      									Turismo</label>
			    								</div>
			    								<div class="radio text-left">
			     									<label>
			     									<input id="inlineradio1" name="sampleinlineradio" value="option1" type="radio">
			      									Outro:
			      									<input class="form-control" id="inlinetext1" name="simpleinlinetext" type = "text"></label>
			    								</div>
			    							</h6>
			    							</div>
		 								</div>
	 								</fieldset>
	 							</form>
							</div>
							<!-- Áreas de interesse?-->
							<div class="form-group col-md-12">
								<h3><label>Áreas de interesse (marque quantas áreas quiser!)</label></h3>
								<form class="form-vertical">
	 								<fieldset>
		  								<div class="form-group">
			   								<h4><label class="col-xs-12 control-label mt-4">Relações Externas</label></h4>
			  								<div class="col-xs-12">
			  							    	<div class="checkbox">
				     								<label class="text-justify">
				      								<input id="relacoes_externas" name="relacoes_externas" value="option1" type="checkbox">
				      								É a área responsável pela expansão da Share! É a equipe que adquire parcerias, faz contatos e planeja um futuro cada vez mais promissor para os membros da entidade. É a área ideal para quem pensa em aprimorar suas habilidades de persuasão, postura, linguagem corporal e comunicação.</label>
			    								</div>
			    							</div>

			    							<h4><label class="col-xs-12 control-label mt-4">Financeiro</label></h4>
			  								<div class="col-xs-12">
			  							    	<div class="checkbox">
				     								<label class="text-justify">
				      								<input id="financeiro" name="financeiro" value="option1" type="checkbox">
				      								É a área responsável por gerenciar os recursos da entidade. É a equipe que consegue fazer com que qualquer coisa se transforme em oportunidade! É uma de nossas áreas mais desafiadoras, pois convida seus membros a adquirirem não só conhecimentos financeiros como também judiciais! É a área ideal para quem tem interesse em política e para quem vê além do comum.</label>
			    								</div>
			    							</div>

			    							<h4><label class="col-xs-12 control-label mt-4">Marketing</label></h4>
			  								<div class="col-xs-12">
			  							    	<div class="checkbox">
				     								<label class="text-justify">
				      								<input id="marketing" name="marketing" value="option1" type="checkbox">
				      								É a equipe responsável por promover a imagem da entidade e transparecer o que é a Share dentro e fora da UFSCar! É a área da criatividade e da inovação! Foi essa equipe que despertou o interesse de empresas como a Microsoft em menos de dois anos de existência do Centro de Línguas. É com certeza uma das áreas que mais desenvolvem seus membros!</label>
			    								</div>
			    							</div>

			    							<h4><label class="col-xs-12 control-label mt-4">Recursos Humanos</label></h4>
			  								<div class="col-xs-12">
			  							    	<div class="checkbox">
				     								<label class="text-justify">
				      								<input id="recursos_humanos" name="recursos_humanos" value="option1" type="checkbox">
				      								É a equipe responsável por promover a imagem da entidade e transparecer o que é a Share dentro e fora da UFSCar! É a área da criatividade e da inovação! Foi essa equipe que despertou o interesse de empresas como a Microsoft em menos de dois anos de existência do Centro de Línguas. É com certeza uma das áreas que mais desenvolvem seus membros!</label>
			    								</div>
			    							</div>

			    							<h4><label class="col-xs-12 control-label mt-4">Acadêmico</label></h4>
			  								<div class="col-xs-12">
			  							    	<div class="checkbox">
				     								<label class="text-justify">
				      								<input id="academico" name="academico" value="option1" type="checkbox">
				      								É a área responsável por garantir que a mágica aconteça! Muitas pessoas nos perguntam como nós conseguimos oferecer aulas tão variadas e completas sem cobrar um centavo por isso. E a resposta está aqui! É com essa equipe que nós conseguimos oferecer aulas de qualidade e que têm atingido cada vez mais pessoas. Sem o acadêmico, não existiria centro de línguas. É uma área perfeita para quem tem vontade de aprimorar habilidades como organização e oratória.</label>
			    								</div>
			    							</div>
			    						</div>
				    				</fieldset>
			    				</form>
			    			</div>
			    			<!-- experiência com entidades-->
							<div class="form-group col-md-12">
								<h3><label>Você já teve experiência com entidades?</label></h3>
								<form class="form-horizontal">
	 								<fieldset>
		  								<div class="form-group">
			   								<label class="col-xs-12 control-label"></label>
			  								<div class="col-xs-12">
			  							    	<div class="radio text-left">
				     								<h6><label>
				      								<input id="sim" name="sim" value="option1" type="radio">
				      								Sim</label></h6>
				      								<h6><label>
				      								<input id="nao" name="nao" value="option2" type="radio">
			      									Não</label></h6>
			    								</div>
			    							</div>
			    						</div>
				    				</fieldset>
			    				</form>
			    			</div>
			    			<!--Função entidade-->
							<div class="form-group col-md-12">
								<label for="funcao_entidade"></label>
								<input type="text" class="form-control" id="funcao_entidade" placeholder="Função ou cargo dentro da Entidade ">
							</div>
							<!--tempo entidade-->
							<div class="form-group col-md-12">
								<label for="tempo_entidade"></label>
								<input type="text" class="form-control" id="tempo_entidade" placeholder="Tempo de experiência na Entidade">
							</div>
							<!--detalhes entidade-->
							<div class="form-group col-md-12">
								<label for="detalhes_entidade"></label>
								<input type="text" class="form-control" id="detalhes_entidade" placeholder="Detalhes sobre a experiência adquirida">
							</div>
							<!--ja fez curso tecnico-->
							<div class="form-group col-md-12">
			    				<h3><label class="mt-3">Você já fez algum curso técnico?</label></h3>
								<form class="form-horizontal">
	 								<fieldset>
		  								<div class="form-group">
			   								<label class="col-xs-12 control-label"></label>
			  								<div class="col-xs-12">
			  							    	<div class="radio text-left">
				     								<h6><label>
				      								<input id="sim" name="sim" value="option1" type="radio">
				      								Sim</label></h6>
				      								<h6><label>
				      								<input id="nao" name="nao" value="option2" type="radio">
			      									Não</label></h6>
			    								</div>
			    							</div>
			    						</div>
				    				</fieldset>
			    				</form>
			    			</div>
		    				<!--qual curso técnico-->
							<div class="form-group col-md-12">
								<label for="curso_tecnico"></label>
								<input type="text" class="form-control" id="curso_tecnico" placeholder=" Curso técnico realizado">
							</div>
							<!--detalhes curso técnico-->
							<div class="form-group col-md-12">
								<label for="detalhes_curso"></label>
								<input type="text" class="form-control" id="detalhes_curso" placeholder="Detalhes sobre a experiência adquirida">
							</div>
							<!-- trabalha?-->
							<div class="form-group col-md-12">
				    			<h3><label class="mt-3">Você já trabalha(ou)?</label></h3>
								<form class="form-horizontal">
		 							<fieldset>
			  							<div class="form-group">
				   							<label class="col-xs-12 control-label"></label>
				  							<div class="col-xs-12">
				  						    	<div class="radio text-left">
					     							<h6><label>
					      							<input id="sim" name="sim" value="option1" type="radio">
					      							Sim</label></h6>
					      							<h6><label>
					      							<input id="nao" name="nao" value="option2" type="radio">
				      								Não</label></h6>
				    							</div>
				    						</div>
				    					</div>
					    			</fieldset>
			    				</form>
			    			</div>		
		    				<!--trabalho-->
							<div class="form-group col-md-12">
								<label for="curso_tecnico"></label>
								<input type="text" class="form-control" id="curso_tecnico" placeholder="Onde trabalha(ou) e função">
							</div>

							<h3><label class ="my-4">Porque você quer fazer parte do nosso time?</label></h3>
							<h6><label> Aqui nós valorizamos a diversidade, não tenha medo de ser diversificado, seja você mesmo!</label></h6>
							<div class="col-md-12">
								<img class="img-responsive" src="<?= base_url('assets/images/login.jpg') ?>" alt="about">
							</div>
							<!--características para fazer parte da share-->
							<div class="form-group col-md-12 my-4">
								<label for="detalhes_curso"></label>
								<input type="text" class="form-control" id="detalhes_curso" placeholder="Quais características você tem que considera importante para a Share?">	
			    			</div>

			    			<!--características para fazer parte da share-->
							<h3><label class ="my-4">Ferramentas e conhecimentos</label></h3>
							<h3><label class ="my-4">Você possui conhecimento em algum idioma?</label></h3>

							<!-- edital -->

							<div class="radio text-center mt-4">
				     			<h6><label>
				      			<input id="edital" name="edital" value="option1" type="checkbox">
				      			</a>Li atentamente o <a href="#">edital</a> e aceito os termos e condições</label></h6>
			    			</div>
						</div>			    				
					</form>
				</div>
			</div><!--row-->
		</div><!--container-->
	</section>
	<div class="row justify-content-center text-center">
		<div class="col-md-3">
			<a href="<?= base_url('formularios/professor') ?>" class="btn btn-primary">Enviar</a>
		</div>
	</div><!-- /row -->

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

