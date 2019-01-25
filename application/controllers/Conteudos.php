<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conteudos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Conteudo_model', 'conteudo');
	}

	public function index() {

	}

	// Param: O ID do conteúdo
	// Return: A view do conteúdo
	public function conteudo ($conteudo_id = NULL) {
		$this->load->model('Curso_model', "curso");
		// Busca as infos do conteúdo no banco e chama a view
		$data['conteudo'] = $this->conteudo->read($conteudo_id);
		$data['curso'] = $this->curso->buscaCurso($data['conteudo']->IDCurso);
		$this->load->view('conteudo', $data);
	}

	// Abre a view para cadastrar um novo conteúdo
	public function cadastraConteudo ($curso_id = NULL) {
		$data['curso_id'] = $curso_id;
		$this->load->view('cadastrar_conteudo', $data);
	}

	// Faz o upload do conteúdo e salva no banco
	public function salvaConteudo () {
		// Variáveis do banco
		$data['nome'] = $this->input->post('nome');
		$data['descricao'] = $this->input->post('descricao');
		$data['curso_id'] = $this->input->post('curso_id');

		// Faz o upload e chama a view com o resultado
		if ($this->conteudo->upload($data)) {
			redirect(base_url('cursos/curso/'.$data['curso_id']));
		}
		else {
			$this->load->view('errors/erros_share/erro_geral');
		}
	}

	// Exclui um arquivo
	public function excluiConteudo () {
		$conteudo['nome_arquivo'] = $this->input->post('nome_arquivo');
		$conteudo['id'] = $this->input->post('id');

		echo $this->conteudo->excluiConteudo($conteudo);
	}
}