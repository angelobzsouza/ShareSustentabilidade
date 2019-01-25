<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Noticia_model', 'noticia');
	}

	// Busca as noticias no banco e exibe na view com paginação
	public function index($pagina = 0) {
		// Carrega a biblioteca de paginação
		$this->load->library('pagination');

		$qtde_noticias = $this->noticia->contaNoticias();

		$config['base_url'] = base_url('noticias/index');
		$config['total_rows'] = $qtde_noticias;
		$config['per_page'] = 12;
		$config['first_link'] = "&nbsp&nbspInício";
		$config['last_link'] = "&nbsp&nbspÚltimo";
		$config['next_link'] = "&nbsp&nbspPróximo";
		$config['prev_link'] = "&nbsp&nbspAnterior";
		$config['cur_tag_open'] = "&nbsp<b>";
		$config['cur_tag_close'] = "&nbsp</b>";
		$config['num_tag_open'] = "&nbsp";
		$config['num_tag_close'] = "&nbsp";

		$this->pagination->initialize($config);
		
		// Busca info no banco de acordo com a paginação
		$data['noticias'] = $this->noticia->buscaNoticiasPaginadas($pagina);

		// Chama a view
		$this->load->view('noticias', $data);
	}

	public function veNoticia($noticia_id = NULL) {
		// Busca a notícia no banco
		$data['noticia'] = $this->noticia->buscaNoticia($noticia_id);

		// Chama a view
		$this->load->view("noticia", $data);
	}
}