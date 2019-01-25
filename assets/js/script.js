base_url = "http://localhost/share/";

// SCRIPTS DA VIEW login.php
//Verifica se o email está cadastrado após o usuário terminar e inseri-lo
function existeEmail (deveExistir) {
	// Está flag é para informar a função que verifica credências se o email foi encontrado ou não pois a função .done do ajax não dita o retorno da função existeEmail
	var flagExiste = false;
	
	var request = $.ajax({
		url: base_url+"pessoas/existeEmail",
		data: {'email': $('#email').val()},
		method: 'post',
		async: false
	});

	request.done(function (find) {
		// Caso o email exista
		if ((find == true && deveExistir) || (find == false && !deveExistir)) {
			$('#email').removeClass('is-invalid');
			$('#email').addClass('is-valid');
			flagExiste = true;
		}
		else {
			$('#email').removeClass('is-valid');
			$('#email').addClass('is-invalid');
			$('#email').val("");
			if (find == true) {
				$('#email').attr("placeholder","Este email já esta sendo utilizado...");	
			}
			else {
				$('#email').attr("placeholder","Email Inválido");	
				flagExiste = false;
			}
		}
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	})

	return flagExiste;
}

// Verifica a senha e caso esteja correta já faz o login
function verificaSenha () {
	if (!existeEmail(true)) {
		return false;
	}

	var request = $.ajax({
		url: base_url+"Pessoas/verificaSenha",
		data: {'senha': $('#senha').val(), 'email': $('#email').val()},
		method: 'post'
	});

	request.done(function (correct) {
		// Caso o email exista
		if (correct == true) {
			$("#form_login").submit();
		}
		else {
			$('#senha').addClass('is-invalid');
			$('#senha').val("");
			$('#senha').attr("placeholder","Senha Inválida");
		}
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	})
}

// Submete formulário ao apertar enter com o campo de senha selecionado
function enterSenha (e) {
	if(e.keyCode == 13) {
	  verificaSenha();
	  e.returnValue = false;
	  e.cancel = true;
	}
}

// Recuperação de senha 
function habilitaRecuperacaoSenha () {
	$("#form_login").addClass('sr-only');
	$("#recuperar_senha").removeClass('sr-only');
}

$("#form_recupera_senha").submit(function (e) {
	// Busca email no banco
	var request = $.ajax({
		url: base_url+"pessoas/existeEmail",
		data: {'email': $('#email_senha').val()},
		method: 'post',
		async: false
	});

	request.done(function (find) {
		if(find) {
			alert("Email de recuperação enviado com sucesso");
		}
		else {
			$("#email_senha").addClass('is-invalid');
			$("#email_senha").attr('placeholder', 'Email não encontrado!');
			$("#email_senha").val('');
			e.preventDefault();
			return false;
		}
	});

	request.fail(function (find) {
		alert("Estamos com problemas, tente novamente mais tarde!");
		e.preventDefault();
		return false;
	});
});

$("#form_nova_senha").submit(function (e) {
	var senha = $("#senha");
	var senha2 = $("#senha2");

	if ($(senha).val() != $(senha2).val()) {
		$(senha).addClass('is-invalid');
		$(senha2).addClass('is-invalid');
		$(senha).attr('placeholder', 'As senhas devem ser iguais');
		$(senha2).attr('placeholder', 'As senhas devem ser iguais');
		$(senha).val('');
		$(senha2).val('');
		e.preventDefault();
		return false;
	}
});

// SCRIPTS DA VIEW cadastrar_conteudo.php
// Verifica se o formato de arquivo é permitido
function verificaExtensao($input) {
  var extPermitidas = ['zip', 'pdf', 'docx'];
  var extArquivo = $input.value.split('.').pop();

  if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {
    alert('Extensão "' + extArquivo + '" não permitida!');
  } else {
    alert('Ok!');
  }
}

// SCRIPTS DA VIEW perfil.php
// Habilita os botões para alterar o perfil das pessoas
function alteraInfosPessoa() {
	// Esconde os campos de texto
	$('#txt_nome').addClass('sr-only');
	$('#txt_email').addClass('sr-only');
	$('#txt_data_nasc').addClass('sr-only');
	$('#txt_sobre').addClass('sr-only');
	// Apresenta os inputs
	$('#nome').removeClass('sr-only');
	$('#email').removeClass('sr-only');
	$('#data_nascimento').removeClass('sr-only');
	$('#sobre').removeClass('sr-only');
	// Troca os botões
	$('#btn_salvar').removeClass('sr-only');
	$('#btn_editar').addClass('sr-only');
}

// Salva as informações da pessoa inseridas na view
function salvaInfosPessoa() {
	var request = $.ajax({
		url: base_url+"pessoas/editaPessoa",
		method: 'POST',
		data: {'nome': $('#nome').val(), 'email': $('#email').val(), 'data_nascimento': $('#data_nascimento').val(), 'sobre': $('#sobre').val()}
	});

	request.done(function (resposta) {
		// Se o cadastro foi realizado com sucesso
		if (resposta == "salvou") {
			alert('Informações salvas com sucesso!')
			// Troca os botões
			$('#btn_salvar').addClass('sr-only');
			$('#btn_editar').removeClass('sr-only');
			// Atualiza os valores dos campos de texto
			$('#txt_nome').html('<span class="font-weight-bold">Nome: </span>'+$('#nome').val());
			$('#txt_email').html('<span class="font-weight-bold">Email: </span>'+$('#email').val());
			$('#txt_data_nasc').html('<span class="font-weight-bold">Data de Nascimento: </span>'+$('#data_nascimento').val());
			$('#txt_sobre').html('<span class="font-weight-bold"></span>'+$('#sobre').val());
			$('#nome_header').html("Olá "+$("#nome").val()+"!");
			// Apresenta os campos de texto
			$('#txt_nome').removeClass('sr-only');
			$('#txt_email').removeClass('sr-only');
			$('#txt_data_nasc').removeClass('sr-only');
			$('#txt_sobre').removeClass('sr-only');
			// Esconte os inputs
			$('#nome').addClass('sr-only');
			$('#email').addClass('sr-only');
			$('#data_nascimento').addClass('sr-only');
			$('#sobre').addClass('sr-only');
		}
		// Se o email já está cadastrado
		else if (resposta == "email_cadastrado"){
			$("#email").addClass("is-invalid");
			$("#email").val("");
			$("#email").attr("placeholder", "Email em uso...");
		}
		// Se houve algum outro problema de validação
		else {
			alert("Ocorreu um erro ao salvar os dados, tente novamente!");
		}
	})

	request.fail(function(){
		alert("Estamos com problemas, tente novamente mais tarde!");
	});
}

// Função de mascara para o campo de data
function maskFunction(t, mask){
  var i = t.value.length;
  var out = mask.substring(1,0);
  var text = mask.substring(i)
  if (text.substring(0,1) != out){
    t.value += text.substring(0,1);
  }
}

// Seleciona o input file ao clicar na foto
function selecionaAlterarFoto() {
	$("#foto_input").click();
}

// Alterar foto de perfil
function alteraFotoPerfil() {
	// Pegando os dados do formulário
	var form = $("#form_foto_perfil")[0];
	var data = new FormData(form);
	// Faz a requisição
	var request = $.ajax({
		url: base_url+"/pessoas/alteraFotoPerfil",
		type: 'POST',
		enctype: "multipart/form-data",
		data: data,
    processData: false,
    contentType: false,
    cache: false,
	});

	request.done(function (url){
		if (url != 'erro') {
	  	alert("Sua foto foi atualizada!");	
			$("#foto_perfil").attr("src", base_url+"assets/uploads/images/"+url);
		}
		else {
			alert("Ops, algo deu errado, tente novamente!");
		}
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	});
}

// Habilita os campos de edição de senha
function habilitaEdicaoSenha () {
	$('#btn_editar_senha').addClass('sr-only');
	$('#btn_salvar_senha').removeClass('sr-only');
	$('#senha_atual').removeClass('sr-only');
	$('#nova_senha').removeClass('sr-only');
	$('#nova_senha2').removeClass('sr-only');
}

function alteraSenha () {
	// Limpa formatação para caso já tenha acontecido algum erro
	$("#senha_atual").removeClass('is-invalid')
	$('#nova_senha').removeClass('is-invalid');
	$('#nova_senha2').removeClass('is-invalid');
	$('#senha_atual').attr('placeholder', "Senha atual");
	$('#nova_senha').attr('placeholder', "Nova senha");
	$('#nova_senha2').attr('placeholder', "Confirmar nova senha");

	// Se a senha atual estiver vazia
	if($('#senha_atual').val().length == 0) {
		$('#senha_atual').addClass('is-invalid');
		$('#senha_atual').attr('placeholder', 'Este campo não pode estar vazio');
		return false;
	}

	// Se a nova senha estiver vazia
	if($('#nova_senha').val().length == 0) {
		$('#nova_senha').addClass('is-invalid');
		$('#nova_senha').attr('placeholder', 'Este campo não pode estar vazio');
		return false;
	}

	// Se a confirmação atual estiver vazia
	if($('#nova_senha2').val().length == 0) {
		$('#nova_senha2').addClass('is-invalid');
		$('#nova_senha2').attr('placeholder', 'Este campo não pode estar vazio');
		return false;
	}

	if ($("#nova_senha").val() != $("#nova_senha2").val()){
		$('#nova_senha').addClass('is-invalid');
		$('#nova_senha2').addClass('is-invalid');
		$('#nova_senha').attr('placeholder', "As senhas devem ser iguais");
		$('#nova_senha2').attr('placeholder', "As senhas devem ser iguais");
		$('#nova_senha').val('');
		$('#nova_senha2').val('');
		return false;
	}

	// Faz a resuisição
	var request = $.ajax({
		url: base_url+"pessoas/updatePasswordSite",
		method: "post",
		data: {
			'senha_atual': $("#senha_atual").val(),
			'nova_senha': $("#nova_senha").val(),
		}
	});

	// 0 - Erro, 1 - Salvou, 2 - Senha inválida
	request.done(function (resposta) {
		if (resposta == 0) {
			alert('Algo deu errado na alteração de senha, tente novamente!');
		}
		else if (resposta == 2) {
			$("#senha_atual").addClass('is-invalid');
			$("#senha_atual").attr('placeholder', 'Senha inválida');
			$("#senha_atual").val('');
			return false;
		}
		else if (resposta == 1) {
			alert('Senha salva com sucesso');
			$('#senha_atual').addClass('sr-only');
			$('#nova_senha').addClass('sr-only');
			$('#nova_senha2').addClass('sr-only');
			$("#btn_salvar_senha").addClass('sr-only');
			$("#btn_editar_senha").removeClass('sr-only');
		}
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	});
}

// SCRIPTS DA VIEW curso.php
// Exclui um conteudo
function excluiConteudo (id_conteudo, link) {
	// Faz a requisição
	var request = $.ajax({
		url: base_url+"/conteudos/excluiConteudo",
		type: 'POST',
		data: {'id': id_conteudo, 'nome_arquivo': link}
	});

	request.done(function (reposta){
		if (reposta) {	
			var linha = $("#linha"+id_conteudo);
			linha.remove();
		}
		else {
			alert("Ops, algo deu errado, tente novamente!");
		}
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	});
}

// SCRIPTS DA VIEW cadastrar_noticia.php
// Função para exibir imagem na tela ao selecionar
$("#foto_input").on('change', function(){
  if (this.files && this.files[0]){
    var reader = new FileReader();
    reader.onload = function(e){
      $('#imagem-noticia').attr("src", e.target.result).fadeIn();
    }
    reader.readAsDataURL(this.files[0]);
  }
});

// SCRIPTS DA VIEW formulario_professor.php
// Verifica input se é aluno ufscar e apresneta o campo para curso, ano e RA
function mostraAluno (e_aluno) {
	if(e_aluno) {
		$("#informacoes_aluno").removeClass('sr-only');
		$("#input_informacoes_aluno").attr('required', 'required');
	}
	else {
		$("#informacoes_aluno").addClass('sr-only');
		$("#input_informacoes_aluno").removeAttr('required');
	}
}

function habilitaOutroCurso (opcao) {
	$("#div_idioma").addClass('sr-only');
	$("#input_curso_idioma").removeAttr('required');
	$("#div_outro_curso").addClass('sr-only');
	$("#input_outro_curso").removeAttr('required');	
	if(opcao == "Outro") {
		$("#div_outro_curso").removeClass('sr-only');
		$("#input_outro_curso").attr('required', 'required');
	}
	else if(opcao == "Idiomas"){
		$("#div_idioma").removeClass('sr-only');
		$("#input_curso_idioma").attr('required', 'required');
	}
}

function habilitaCertificado (possui) {
	$("#input_escola").addClass('sr-only');
	$("#input_escola").removeAttr('required');
	$("#input_aprender").addClass('sr-only');
	$("#input_aprender").removeAttr('required');	
	if(possui) {
		$("#input_escola").removeClass('sr-only');
		$("#input_escola").attr('required', 'required');
	}
	else {
		$("#input_aprender").removeClass('sr-only');
		$("#input_aprender").attr('required', 'required');
	}
}