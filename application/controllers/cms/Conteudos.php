<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conteudos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Conteudo_model', 'conteudo');
	}

	public function index() {
		// Busca todo o conteudo do site e manda pra view
		$data['conteudos'] = $this->conteudo->readAll();
		$this->load->view('cms/lista_conteudo', $data);
	}
}