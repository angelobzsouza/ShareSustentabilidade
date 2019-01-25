<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class WelcomeCMS extends CI_Controller {
		public function index () {
			// Se o usuário não for administrador exibe o erro
			if ($this->session->nivel_acesso != 2) {
				$this->load->view('errors/erros_share/erro_403');
				return;
			}
			else {
				$this->load->model("Conteudo_model", "conteudo");
				$this->load->model("Noticia_model", "noticia");
				$this->load->model("Pessoa_model", "pessoa");
				// Busca as informações e chama a view
				$data['conteudos'] = $this->conteudo->readLastOnes(5);
				$data['noticias'] = $this->noticia->readLastOnes(5);
				$data['professores'] = $this->pessoa->readLastTeatchers(5);
				$this->load->view('cms/dashboard', $data);
			}
		}
	}
?>