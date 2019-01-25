<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Pessoa_model', 'pessoa');
	}

	public function index() {
		$this->load->model("Curso_model", 'curso');
		$this->load->model("Noticia_model", 'noticia');
		// Busca conteúdo para mostrar na index
		$data['cursos'] = $this->curso->readLastOnes(6);
		$data['noticias'] = $this->noticia->readLastOnes(6);
		foreach($data['cursos'] as $curso) {
			$curso->professor = $this->pessoa->buscaPessoa($curso->IDProfessorA)->Nome;
		}
		$this->load->view('index', $data);
	}

	public function login () {
		// Abre view de login
		$this->load->view('login');
	}

	public function perfil () {
		$data['pessoa'] = $this->pessoa->buscaPessoa($this->session->id);
		$this->load->view('perfil', $data);
	}

	// Busca as noticias no banco e exibe na view com paginação
	public function sobre() {
		// Busca as infos e chama a view
		$data['cargos'] = $this->pessoa->buscaCA();
		$data['pessoas'] = $this->pessoa->buscaPessoas();
		$data['presidente'] = $this->pessoa->buscaPessoa($data['cargos']->Presidente);
		$data['vice_presidente'] = $this->pessoa->buscaPessoa($data['cargos']->VicePresidente);
		$data['diretoria_marketing'] = $this->pessoa->buscaPessoa($data['cargos']->Marketing);
		$data['diretoria_financeiro'] = $this->pessoa->buscaPessoa($data['cargos']->Financeiro);
		$data['relacoes_externas'] = $this->pessoa->buscaPessoa($data['cargos']->RelacoesExternas);
		$data['recursos_humanos'] = $this->pessoa->buscaPessoa($data['cargos']->RH);
		$data['diretoria_academica'] = $this->pessoa->buscaPessoa($data['cargos']->Academica);
		$this->load->view('sobre', $data);
	}

	// Abre a página que possiblita fazer uma doação para a Share
	public function ajude () {
		//View
		$this->load->view('ajuda');
	}

	public function doar () {
		// DOAÇÃO ATRAVÉS DO PAGSEGURO
		// CONFIGURAÇÃO
		$sandbox = true; /* Para ativar o ambiente de produção substitua o true por false */
		$pagseguro['email'] = 'angelo.bz.souza@gmail.com'; /* Email de sua conta do PagSeguro ou do Sandbox PagSeguro */
		$pagseguro['token'] = '7B80B86F7BA7426E824CCCCBB0E02768'; /* Token de sua conta do PagSeguro ou do Sandbox PagSeguro */
		$pagseguro['redirectURL'] = base_url();
		$pagseguro['currency'] = 'BRL';
		// DOAÇAO
		$value = $this->input->post('valor');
		$pagseguro['itemId1'] = '1'; /* ID do produto */
		$pagseguro['itemDescription1'] = "Doação para a Share Idiomas"; /* Nome do produto */
		$pagseguro['itemAmount1'] = number_format($value, 2, ".", ""); /* Valor do produto */
		$pagseguro['itemQuantity1'] = 1; /* Quantidade */
		// DOADOR
		// Recebe por post
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		// Configura a requisição
		$name = "Comprador testes";
		$pagseguro['senderName'] = $name; /* Nome completo OBS: Este é o nome do comprdor, deve ser mantido como "Comprador teste" durante a fase de testes*/
		$pagseguro['senderEmail'] = $email; /* Email OBS: Este é o email do comprador, também deve ser mantido um específico durante a fase de testes */
		$pagseguro['shippingType'] = '3'; /* Tipo de Frete (1 PAC / 2 Sedex / 3 Sem frete) */
		/* Enviar Pedido */
		if ($sandbox==true) {
		    $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout';
		} else {
		    $url = 'https://ws.pagseguro.uol.com.br/v2/checkout';
		}
		$pagseguro = http_build_query($pagseguro);
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $pagseguro);
		$xml = curl_exec($curl);
		curl_close($curl);
		if ($xml == 'Unauthorized') {
			$this->load->view('errors/erros_share/erro_geral');
			return;
		}
		$xml1 = simplexml_load_string($xml);
		if (count($xml1->error) > 0) {
			$this->load->view('errors/erros_share/erro_geral');
			return;
		}
		if ($sandbox==true) {
		    header('Location: https://sandbox.pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml1->code);
		} else {
		    header('Location: https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml1->code);
		}
	}
}