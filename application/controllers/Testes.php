<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testes extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Teste_model', 'teste');
	}

	// Caso o usuário tenta acessar o controller sem especificar a função, redireciona para a tela de aprendizado
	public function index() {
		// Busca os teste e abre a view
		$data['testes'] = $this->teste->readAllActive();
		$this->load->view('inscrever', $data);
	}

	// Param: ID do teste por get
	// A view de ralização do teste
	public function teste ($teste_id = NULL) {
		if (empty($teste_id)) {
			$this->load->view('errors/erros/erro_geral');
			return false;
		}
		// Busca o teste e chama a view
		$data['teste'] = $this->teste->read($teste_id);
		$data['questoes'] = $this->teste->readQuestoesLimite($teste_id, $data['teste']->QuantidadeQuestoes);
		$this->load->view("teste", $data);
	}

	//Param: As respoostas por post
 	//Return: Tela com mensagem de resultado salvo 
	public function finalizaTeste () {
		// Recebe a quantidade de questões
		$qtd_questoes = $this->input->post('qtd_questoes');
		$nome = $this->input->post('nome');
		$email = $this->input->post('email');

		// Pra cada questão, cria um objeto e salva no vetor respostas
		for($i = 0; $i < $qtd_questoes; $i++) {
			$respostas[$i] = (object) array(
				"questao_id" => $this->input->post('questao_'.$i.'_id'), 
			 	"resposta" => $this->input->post('resposta_'.$i)
			 );
		}

		if ($this->teste->calculaResultado($respostas, $qtd_questoes, $nome, $email)) {
			$this->load->view('resultado_teste');
		}
		else {
			$this->load->view('errors/erros_share/erro_geral');
		}
	}
}