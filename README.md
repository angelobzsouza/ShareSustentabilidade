# Reutilização da plataforma

Para que seja possível a reutilização, é preciso realizar alguns passos, descritos abaixo. Por motivos de padronização pessoal, toda a explicação tomará como diretório base a pasta Share baixada do repositório.
Antes de mais nada, é importante salientar que, para personalizar a reutilização da aplicação, todas as imagens a serem utilizadas são de responsabilidade de quem deseja reutilizar desenvolvê-las.

Primeiro passo: Ícone da entidade na aba do navegador.
Neste passo, o logo da entidade, que aparece na aba do navegador, será trocado pelo logo desejado.
Para isso, deve-se substituir o arquivo “favicon.ico” pelo logo desejado, lembrando que o nome deve permanecer o mesmo. O arquivo favicon.ico está localizado em “share-master/assets/images”. Feito isso, coloque o arquivo na pasta raíz do projeto.

Segundo passo: mudar a URL do projeto.
Neste passo, será alterado os arquivos de configuração onde está definido a localização da aplicação no sistema.
Para isso, abra o arquivo “config.php”, localizado em “share-master/application/config/config.php”, procure a linha “$config['base_url'] = ‘ ’ ” e, dentro das aspas simples, insira a URL de onde está a aplicação no sistema.
Repita o procedimento para o arquivo scripts.js, localizado em “share-master/assets/js/scripts.js”, e substitua os dados da variável “base_url”, logo na primeira linha, pelos novos dados.

Terceiro passo: Criando o banco de dados.
Neste passo, será criado o banco de dados necessário para que a aplicação possa funcionar corretamente.
Para isso, é necessário executar o script do arquivo “script_banco_mySQL.sql”, localizado em “share-master/script_banco_mySQL.sql”, em qualquer banco mySQL desejado. O script também funciona em outros bancos SQL, mas podem ser necessárias pequenas alterações 

Quarto passo: Configurando o banco.
Neste passo, as credenciais do banco de dados serão atualizadas no arquivo de configuração da aplicação para que seja possível o acesso.
Para isso, abra o arquivo “database.php”, localizado em “share-master/application/config/database.php”, e preencha os dados necessários nos campos:
- ‘Hostname’ - onde o banco está hospedado.
- ‘Username’ - usuário que irá realizar acesso com o banco
- ‘Password’ - senha para esse usuário
- ‘Database’ - nome do banco
- ‘Dbdriver’ - driver referente a qual banco se está utilizando

Quinto passo: Informação visual da aplicação.
Neste passo, todas as imagens que formam a informação visual da aplicação, poderão ser substituídas.
Para isso, é necessário que todas as imagens substituídas tenham o mesmo formato , dimensões e nome.
As imagens utilizadas em toda a aplicação podem ser encontradas em “share-master/assets/images/plataforma” e “share-master/assets/images/cms”. Dentro dessas pastas estão outras pastas, divididas por páginas da aplicação, para que a reutilização se torne mais simples.

Sexto passo: Configurar API do PagSeguro
Neste passo é configurada a conexão com a API de pagamento do PagSeguro. Para isso é necessário ter uma conta no PagSeguro pois serão utilizados seus email de login etoken de API (obtida no site do PagSeguro).
Obtidas essas informações, entre no arquivo “share-master/application/controllers/Welcome.php” e configure as linhas 58 e 59 da seguinte forma: $pagseguro[‘email’] = “seuemail@email.com” e $pagseguro[‘token’] = “seutokendopagseguro”. Caso deseje fazer testes com a api, altere o valor da variável $sandbox na linha 57 para true.

Mudanças extras:
Para realizar mudanças nas páginas, como títulos, textos, explicações e outras mais, é necessário realizar alterações nos arquivos php com código html. Essas mudanças podem ser realizadas em qualquer arquivo .php da aplicação e toda a alteração fica a cargo de quem está replicando a aplicação.
Os arquivos .html podem ser encontrados em “share-master/application/views”
Além disso, outro objetivo é que que a aplicação seja autossustentável, ou seja, aqueles que desejam utilizar o sistema, possam inserir, excluir, visualizar e atualizar todos os dados do sistema, assim não é necessário de uma equipe de manutenção, sendo total responsabilidade dos administradores, professores e alunos. 

# Hospedagem

Após o download da plataforma, a princípio o site só pode ser utilizado na própria máquina. Para que o sistema esteja ao alcance de todos, principalmente de professores e alunos, é necessário realizar a hospedagem deste site, ou seja, é preciso comprar um domínio para o site. Atualmente, para realizar a hospedagem de um site, há um custo para manter a plataforma online e acessível a todos, os custos variam bastante e existem diversos planos. Primeiramente, é necessário comprar um domínio, onde existem alguns, assim, é necessário verificar qual domínio é necessário para a aplicação. Depois de ter um domínio, necessário hospedar esta plataforma, seja esta compartilhada, em cloud ou em servidores virtuais. Alguns provadores que podem ser analisados, são: Weblink, GoDaddy, Hostinger, UOLHost, entre outros.

# Como utilizar

Nesta seção, será demonstrado como que cada tipo de usuário, seja administrador, aluno ou professor pode utilizar o site e quais funcionalidades estão disponíveis para cada tipo de acesso.

- Administrador
No geral, o administrador, em si, consegue realizar inserção, remoção, atualização e visualização dos dados em todo o sistema, ou seja, tem acesso em tudo. Quando o sistema reconhece que um administrador está logado, aparece uma página diferente dos outros usuários no que diz respeito ao dashboard, ou seja, consegue ver análises e dados que estão acontecendo na plataforma. Em relação aos cursos oferecidos, é de responsabilidade do administrador selecionar o(s) professore(s) para oferecer um curso e deixar este disponível na plataforma.

- Aluno
Em relação ao aluno, primeiramente, é necessário realizar um login para ter o acesso de aluno. Para isso, é importante ler o edital disponibilizado no site para se tornar um novo colaborador. Após ter acesso, o aluno consegue ler as notícias que são postadas, os eventos que a entidade prepara para seus alunos, consegue visualizar os seus dados, no caso é importante manter esses dados atualizados e o mais importante, ele consegue participar de curso. Para participar de um curso, o aluno deve entrar localizar na barra de navegação, a palavra aprender, no qual ao ser clicado, será redirecionado para esta página e, dentro desta página aparecerá os cursos que estão sendo oferecidos pelo(s) professore(s) e assim, o aluno poderá realizar a inscrição neste curso e acessar os materiais disponibilizados pelo(s) professore(s). Além disso, é possível realizar testes e questionários referentes aos cursos que o aluno está inscrito dentro do sistema.
-Professor
Em relação ao professor, é bem parecido com um aluno, porém ao acessar a plataforma, é necessário logar como professor. Após logado, consegue ver os mesmos dados que os alunos, porém este é responsável por querer ofertar um curso. É de total responsabilidade do professor, postar os materiais da aula na plataforma, assim como editar e preparar os testes e questionários para os alunos.
