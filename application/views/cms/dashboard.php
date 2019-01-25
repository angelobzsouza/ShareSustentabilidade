<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
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

    <?php $this->load->view('cms/includes/navbar') ?>

    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm fundo-dashboard" role="banner" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="fh5co-blog">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 dashboard-card my-3 text-center p-4 animate-box">
                    <h2>Últimos Conteúdos</h2>
                    <table class="table table-striped">
                        <head>
                            <tr>
                                <th class="text-left"><b>Nome</b></th>
                                <th class="text-right"></th>
                            </tr>
                        </head>
                        <body>
                            <?php foreach($conteudos as $conteudo) :?>
                                <tr>
                                    <td class="text-left"><?= $conteudo->Nome ?></td>
                                    <td class="text-right"><a href="<?= base_url('conteudos/conteudo/'.$conteudo->ID) ?>">Ver</a></td>
                                </tr>
                            <?php endforeach ?>      
                        </body>
                    </table>
                </div>
                <div class="col-md-10 dashboard-card my-3 text-center p-4 animate-box">
                    <h2>Últimas Notícias</h2>
                    <table class="table table-striped">
                        <head>
                            <tr>
                                <th class="text-left"><b>Título</b></th>
                                <th class="text-right"></th>
                            </tr>
                        </head>
                        <body>
                            <?php foreach($noticias as $noticia) :?>
                                <tr>
                                    <td class="text-left"><?= $noticia->Titulo ?></td>
                                    <td class="text-right"><a href="<?= base_url('noticias/veNoticia/'.$noticia->ID) ?>">Ver</a></td>
                                </tr>
                            <?php endforeach ?>      
                        </body>
                    </table>
                </div>
                <div class="col-md-10 dashboard-card my-3 text-center p-4 animate-box">
                    <h2>Últimos Professores</h2>
                    <table class="table table-striped">
                        <head>
                            <tr>
                                <th class="text-left"><b>Nome</b></th>
                                <th class="text-left"><b>Email</b></th>
                            </tr>
                        </head>
                        <body>
                            <?php foreach($professores as $professor) :?>
                                <tr>
                                    <td class="text-left"><?= $professor->Nome ?></td>
                                    <td class="text-left"><?= $professor->Email ?></td>
                                </tr>
                            <?php endforeach ?>      
                        </body>
                    </table>
                </div>
                <div class="col-md-10 text-center my-3">
                    <a class="btn btn-primary" href="<?= base_url() ?>">Voltar à plataforma</a>
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
    </body>
</html>

