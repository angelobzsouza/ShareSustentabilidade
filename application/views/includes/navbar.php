<nav class="fh5co-nav sticky-top" role="navigation">
	<!-- Div para funcionar o sytle -->
	<div>
		<div class="row align-items-center">
			<div class="left-menu text-right menu-1">
				<ul>
					<?php if ($this->session->nivel_acesso == 1 || $this->session->nivel_acesso == 2) :?>
						<li><a href="<?= base_url('pessoas/ensinar') ?>">Ensinar</a></li>
					<?php endif; ?>
					<li><a href="<?= base_url('pessoas/aprender')?>">Aprender</a></li>
					<li><a href="<?= base_url('testes') ?>">Inscreva-se</a></li>
					<li><a href="<?= $this->session->logado ? base_url('welcome/perfil'):base_url('welcome/login') ?>"><?= $this->session->logado ? "Perfil":"Login" ?></a></li>
				</ul>
			</div>
			<div class="logo text-center">
				<div id="fh5co-logo"><a href="<?= base_url('') ?>">
					<img id="logo_nav" src="<?php echo base_url('assets/images/logo-frase.png') ?>" alt="share" class="img-fluid"></a></div>
			</div>
			<div class="right-menu text-left menu-1">
				<ul>
					<li><a href="<?= base_url('noticias') ?>">Noticias</a></li>
					<!-- <li><a href="<?= base_url('formularios') ?>">Participe</a></li> -->
					<li><a href="<?= base_url('welcome/sobre') ?>">Sobre</a></li>
					<li><a href="<?= base_url('welcome/ajude') ?>">Ajude</a></li>
					<?php if ($this->session->logado) { ?>
						<li><a href="<?= base_url('pessoas/desloga')?>">Sair</a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</nav>