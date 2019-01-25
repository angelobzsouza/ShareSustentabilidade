<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testes extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Teste_model", "teste");
	}

	public function index() {
		if (!$this->temPermissao(2)) {
			return;
		}
		// Busca as infos e carrega a tela
		$data['testes'] = $this->teste->readAll();
		$this->load->view('cms/lista_testes', $data);
	}

	// CRUD
	// Retorno: Tela do cadastro do objeto
	public function createView () {
		// Verifica permissão
		if(!$this->temPermissao(2)) {
			return;
		}
		// Chama a página
		$this->load->view('cms/cadastrar_teste');
	}

	// Salva um novo teste no banco de dados
	public function store () {
		// Perissão
		if (!$this->temPermissao(2)) {
			return;
		}
		// Recebe as variáveis
		$teste['nome'] = $this->input->post('nome');
		$teste['ativo'] = $this->input->post('ativo');
		$teste['qtde_questoes'] = $this->input->post('qtde_questoes');

		if($this->teste->store($teste)) {
			redirect(base_url('cms/testes'));
		}
		else {
			$this->load->view('errors/erros_share/erro_403');
		}
	}

	// Abre a view de atualização
	public function updateView ($teste_id = NULL) {
		// Perissão
		if (!$this->temPermissao(2)) {
			return;
		}
		// Busca o teste no BD para editar
		$data['teste'] = $this->teste->read($teste_id);
		$this->load->view('cms/editar_teste', $data);
	}

	public function update () {
		// Perissão
		if (!$this->temPermissao(2)) {
			return;
		}
		// Busca o teste no BD para editar
		$data['ID'] = $this->input->post('id');	
		$data['Nome'] = $this->input->post('nome');	
		$data['Ativo'] = $this->input->post('ativo');	
		$data['QuantidadeQuestoes'] = $this->input->post('qtde_questoes');

		if($this->teste->update($data)) {
			redirect(base_url('cms/testes'));
		}	
		else {
			$this->load->view('errors/erros_share/erro_403');
		}
	}

	// O delete é feito por ajax
	public function delete () {
		// Perissão
		if (!$this->temPermissao(2)) {
			echo 0;
		}
		$teste_id = $this->input->post('teste_id');
		echo $this->teste->delete($teste_id);
	}

	// QUESTÕES
	// Param: int ID do teste
	// Return: View com as questões 
	public function questoes ($teste_id = NULL) {
		// Permissão
		if (!$this->temPermissao(2)) {
			return;
		}
		$data['questoes'] = $this->teste->readAllQuestions($teste_id);
		$data['teste'] = $this->teste->read($teste_id);
		$this->load->view('cms/lista_questoes', $data);
	}

	// Param: int id do teste
	// Return: A view de cadastro de view
	public function createQuestao ($teste_id = NULL) {
		// Permissão
		if (!$this->temPermissao(2)) {
			return;
		}
		$data['teste_id'] = $teste_id;
		$this->load->view('cms/cadastrar_questao', $data);		
	}

	// Param: Questão objecti
	// Return: Lista de questões de determinado curso
	public function storeQuestao () {
		// Permissão
		if (!$this->temPermissao(2)) {
			return;
		}
		// Pega as infos do post
		$questao['IDTeste'] = $this->input->post('teste_id');
		$questao['Questao'] = $this->input->post('questao');
		$questao['A'] = $this->input->post('a');
		$questao['B'] = $this->input->post('b');
		$questao['C'] = $this->input->post('c');
		$questao['D'] = $this->input->post('d');
		$questao['E'] = $this->input->post('e');
		$questao['Resposta'] = $this->input->post('resposta');

		if ($this->teste->storeQuestao($questao)) {
			redirect(base_url('cms/testes/questoes/'.$questao['IDTeste']));
		}
		else {
			$this->load->view('errors/erros_share/erro_403');
		}
	}

	// Param: Id da questão
	// Return: resposta para a requisão ajax
	public function deleteQuestao  () {
		// Permissão
		if (!$this->temPermissao(2)) {
			echo 0;
		}
		$questao_id = $this->input->post('questao_id');
		echo $this->teste->deleteQuestao($questao_id);
	}

	// RESULTADOS
	// Param: ID do teste por get 
	// Return: View com os resultados do teste
	public function resultados ($teste_id = NULL) {
		// Permissão
		if (!$this->temPermissao(2)) {
			return;
		}
		// Busca o teste e os resultados no banco
		$data['teste'] = $this->teste->read($teste_id);
		$data['resultados'] = $this->teste->readTestResults($teste_id);
		$this->load->view('cms/resultados', $data);
	}

	// Param: ID do teste por get 
	// Return: View com os resultados do teste
	public function deleteResult () {
		// Permissão
		if (!$this->temPermissao(2)) {
			return;
		}
		// Retorna resultado da query pra requisição
		$resultado_id = $this->input->post('resultado_id');
		echo $this->teste->deleteResult($resultado_id);
	}

	// PERMISSÕES
	// Faz as verificações necessárias para abrir uma página que são: varificar se esta logado e se tem permissão.
	private function temPermissao ($nivel_acesso = NULL) {
		if (!$this->session->logado) {
			$this->load->view('login');
			return false;
		}
		else if (!empty($nivel_acesso) && $nivel_acesso != $this->session->nivel_acesso) {
			$this->load->view('errors/erros_share/erro_403');
			return false;
		}
		else {
			return true;
		}
	}
}