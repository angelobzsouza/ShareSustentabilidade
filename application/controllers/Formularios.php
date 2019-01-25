<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formularios extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Formulario_model', 'formulario');
		$this->load->model('Pessoa_model', 'pessoa');
	}

	// Busca as noticias no banco e exibe na view com paginação
	public function index() {
		$this->load->view('participe');
	}

	public function professor() {
		$this->load->view('formulario_professor');
	}

	public function administrativo() {
		$this->load->view('formulario_administrador');
	}

	public function salvaFormularioProfessor () {
		$data['Nome'] = $this->input->post('nome');
		$data['Email'] = $this->input->post('email');
		$data['RG'] = $this->input->post('rg');
		$data['Telefone'] = $this->input->post('telefone');
		$data['Facebook'] = $this->input->post('facebook');
		$data['AlunoUfscar'] = $this->input->post('e_aluno');
		if($data['AlunoUfscar']) {
			$data['InformacoesAluno'] = $this->input->post('informacoes_aluno');
		}
		$data['QualAula'] = $this->input->post('qual_aula');
		$data['Certificado'] = $this->input->post('certificado');
		if($data['Certificado']) {
			$data['Instituicao'] = $this->input->post('qual_escola');
		}
		else {
			$data['ComoAprendeu'] = $this->input->post('como_aprendeu');
		}
		$data['PorQue'] = $this->input->post('porque');
		$data['SalvoEm'] = "NOW()";

		if ($this->formulario->salvaRespostaProfessor($data)) {
			$this->load->view('respostas_salvas');
		}
		else {
			$this->load->view('errors/erros_share/erro_geral');
		}
	}
}