base_url_cms = "http://localhost/share/cms/";

// SCRIPTS DAS VIEWS DE CADASTRO
//Verifica se os emails são iguais
$("#form_cadastro").submit(function verificaEmail () {
	var email = $("#email").val();
	var email2 = $("#email2").val();
  if (email != email2) {
    alert ("Os email devem ser iguais");
    $("#email2").val("");
    return false;
  }
  else {
  	return true;
  }
});

// Exclui um professor sem atualizar a página
function excluiProfessor(id) {
	// Seta a linha correta em uma variável
	var linha = $("#linha"+id);

	var request = $.ajax({
		url: base_url_cms+"pessoas/excluiProfessor",
		method: 'post',
		data: {'id': id}
	});

	request.done(function (excluiu) {
		if (excluiu) {
			linha.remove();
			alert("Professor excluido com sucesso!")
		}
		else {
			alert("Este professor é responsável por um ou mais cursos, por favor, selecione outro responsável pelos cursos antes de exluir o docente!");
		}
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	});
}

// Exclui o aluno sem atualizar a página
function excluiAluno(id) {
	// Seta a linha correta em uma variável
	var linha = $("#linha"+id);

	var request = $.ajax({
		url: base_url_cms+"pessoas/excluiAluno",
		method: 'post',
		data: {'id': id}
	});

	request.done(function (excluiu) {
		if (excluiu) {
			alert('Aluno excluido com sucesso!');
			linha.remove();
		}
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	});
}

// Altera o nível de acesso do aluno no banco
function tornarProfessor (id) {
	// Seta a linha correta em uma variável
	var linha = $("#linha"+id);

	var request = $.ajax({
		url: base_url_cms+"pessoas/tornaAlunoProfessor",
		method: 'post',
		data: {'id': id}
	});

	request.done(function () {
		alert("Cargo alterado com sucesso!");
		linha.remove();
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	});
}

// SCRIPTS DA VIEW cadastrar_curso.php
// Valida professores para curso
$("#form_curso").submit(function validaProfessores () {
	var professor_a = $("#professor_a").val();
	var professor_b = $("#professor_b").val();
	console.log(professor_a);
	console.log(professor_b);
	if (professor_a == professor_b) {
		alert("Os professores precisam ser diferentes");
		$('#professor_b').val("");
		return false;
	}
	return true;
});

function excluiCurso (id_curso) {
	var request = $.ajax({
		url: base_url_cms+"cursos/excluiCurso",
		method: 'post',
		data: {'id': id_curso}
	});

	request.done(function () {
		alert("Curso exluido com sucesso!");
		linha = $("#linha"+id_curso);
		linha.remove();
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	});
}

// SCRIPTS DA VIEW matriculas.php
// Remove um aluno da tabela de matriculados e coloca na de não matriculados, essa função altera apenas a view, não o banco
function desmatricula (id_aluno) {
	var linha = $("#linha_aluno_"+id_aluno); 
	var botao = $("#botao_aluno_"+id_aluno);
	var input = $("#input_aluno_"+id_aluno);
	var tabela = $("#tabela_nao_matriculados>tbody");

	botao.attr("onclick", "matricula("+id_aluno+")");
	botao.text("Matricular");
	botao.removeClass('text-danger');
	botao.addClass('text-primary');
	input.attr("name", "nao_matriculados[]");
	linha.remove();
	tabela.append(linha);
}

// Adiciona um aluno da tabela de não matriculados e coloca na de matriculados, essa função altera apenas a view, não o banco
function matricula (id_aluno) {
	var linha = $("#linha_aluno_"+id_aluno); 
	var botao = $("#botao_aluno_"+id_aluno);
	var input = $("#input_aluno_"+id_aluno);
	var tabela = $("#tabela_matriculados>tbody");

	botao.attr("onclick", "desmatricula("+id_aluno+")");
	botao.text("Desmatricular");
	botao.removeClass('text-primary');
	botao.addClass('text-danger');
	input.attr("name", "matriculados[]");
	linha.remove();
	tabela.append(linha);
}

// SCRIPTS DA VIEW lista_noticias.php
// Exclui uma noticia sem atualizar a página
function excluiNoticia(id) {
	// Seta a linha correta em uma variável
	var linha = $("#linha"+id);

	var request = $.ajax({
		url: base_url_cms+"noticias/delete",
		method: 'post',
		data: {'noticia_id': id}
	});

	request.done(function (excluiu) {
		if (excluiu) {
			linha.remove();
			alert("Notícia exlcuida com sucesso!")
		}
		else {
			alert("Houve algum erro ao exlcuir a notícia, tente novamente mais tarde!");
		}
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	});
}

// SCRIPTS DA VIEW lista_testes.php
// Exclui um teste sem atualizar a página
function excluiTeste(id) {
	// Seta a linha correta em uma variável
	var linha = $("#linha"+id);

	var request = $.ajax({
		url: base_url_cms+"testes/delete",
		method: 'post',
		data: {'teste_id': id}
	});

	request.done(function (excluiu) {
		if (excluiu) {
			linha.remove();
			alert("Teste exlcuido com sucesso!")
		}
		else {
			alert("Houve algum erro ao exlcuir o teste, tente novamente mais tarde!");
		}
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	});
}

// SCRIPTS DA VIEW lista_questoes.php
// Exclui uma questão sem atualizar a página
function excluiQuestao(id) {
	// Seta a linha correta em uma variável
	var linha = $("#linha"+id);

	var request = $.ajax({
		url: base_url_cms+"testes/deleteQuestao",
		method: 'post',
		data: {'questao_id': id}
	});

	request.done(function (excluiu) {
		if (excluiu) {
			linha.remove();
			alert("Questao exlcuida com sucesso!")
		}
		else {
			alert("Houve algum erro ao exlcuir a questão, tente novamente mais tarde!");
		}
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	});
}

// SCRIPTS DA VIEW resultados.php
// Exclui um resultado sem atualizar a página
function excluiResultado(id) {
	// Seta a linha correta em uma variável
	var linha = $("#linha"+id);

	var request = $.ajax({
		url: base_url_cms+"testes/deleteResult",
		method: 'post',
		data: {'resultado_id': id}
	});

	request.done(function (excluiu) {
		if (excluiu) {
			linha.remove();
			alert("Resultado excluido com sucesso!");
		}
		else {
			alert("Houve algum erro ao exlcuir o resultado, tente novamente mais tarde!");
		}
	});

	request.fail(function () {
		alert("Estamos com problemas, tente novamente mais tarde!");
	});
}