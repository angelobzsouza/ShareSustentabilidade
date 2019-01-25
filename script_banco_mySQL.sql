SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `plataforma_share`
--

-- --------------------------------------------------------

--
-- Table structure for table `AlunoCurso`
--

CREATE TABLE `AlunoCurso` (
  `IDPessoa` int(10) UNSIGNED NOT NULL,
  `IDCurso` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Conteudo`
--

CREATE TABLE `Conteudo` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Descricao` mediumtext,
  `Link` varchar(50) DEFAULT NULL,
  `IDCurso` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CorpoAdministrativo`
--

CREATE TABLE `CorpoAdministrativo` (
  `Presidente` int(10) UNSIGNED NOT NULL,
  `VicePresidente` int(10) UNSIGNED NOT NULL,
  `Marketing` int(10) UNSIGNED NOT NULL,
  `Financeiro` int(10) UNSIGNED NOT NULL,
  `RelacoesExternas` int(10) UNSIGNED NOT NULL,
  `RH` int(10) UNSIGNED NOT NULL,
  `Academica` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Curso`
--

CREATE TABLE `Curso` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `IDProfessorA` int(10) UNSIGNED NOT NULL,
  `IDProfessorB` int(10) UNSIGNED DEFAULT NULL,
  `Ativo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `FormAdministrativo`
--

CREATE TABLE `FormAdministrativo` (
  `ID` int(6) UNSIGNED NOT NULL,
  `Nome` int(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DataNascimento` date NOT NULL,
  `Facebook` varchar(50) DEFAULT NULL,
  `Linkedin` varchar(50) DEFAULT NULL,
  `Telefone` varchar(16) NOT NULL,
  `Curso` varchar(50) NOT NULL,
  `RA` int(10) NOT NULL,
  `AnoIngresso` int(4) NOT NULL,
  `RelacoesExternas` int(1) NOT NULL,
  `Financeiro` int(1) NOT NULL,
  `Marketing` int(1) NOT NULL,
  `RH` int(1) NOT NULL,
  `Academica` int(1) NOT NULL,
  `PreferenciaRelacoes` int(1) DEFAULT NULL,
  `PreferenciaFinanceiro` int(1) DEFAULT NULL,
  `PreferenciaMarketing` int(1) DEFAULT NULL,
  `PreferenciaRH` int(1) DEFAULT NULL,
  `PreferenciaAcademica` int(1) DEFAULT NULL,
  `Entidade` int(1) NOT NULL,
  `FuncaoEntidade` text,
  `TempoEntidade` text,
  `ExperienciaEntidade` text,
  `Tecnico` int(1) NOT NULL,
  `QualTecnico` text,
  `ExperienciaTecnico` text,
  `Trabalho` int(1) NOT NULL,
  `AindaTrabalha` int(1) DEFAULT NULL,
  `DescricaoTrabalho` text,
  `CaracteristicasPessoais` text NOT NULL,
  `Office` int(1) DEFAULT NULL,
  `Drive` int(1) DEFAULT NULL,
  `Photoshop` int(1) DEFAULT NULL,
  `Video` int(1) DEFAULT NULL,
  `Canvas` int(1) DEFAULT NULL,
  `Trello` int(1) DEFAULT NULL,
  `FerramentasFacebook` int(1) DEFAULT NULL,
  `FerramentasLinkedIn` int(1) DEFAULT NULL,
  `ConhecimentoFinanceiro` int(1) DEFAULT NULL,
  `ConhecimentoOratoria` int(1) DEFAULT NULL,
  `FerramentasEmail` int(1) DEFAULT NULL,
  `MailChimp` int(1) DEFAULT NULL,
  `ConhecimentoIngles` int(1) NOT NULL,
  `ConhecimentoEspanhol` int(1) NOT NULL,
  `ConhecimentoAlemao` int(1) NOT NULL,
  `ConhecimentoFrances` int(1) NOT NULL,
  `Observacoes` text,
  `SalvoEm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `FormProfessor`
--

CREATE TABLE `FormProfessor` (
  `ID` int(6) UNSIGNED NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `RG` varchar(14) NOT NULL,
  `Telefone` varchar(16) NOT NULL,
  `Facebook` varchar(50) NOT NULL,
  `AlunoUfscar` int(1) NOT NULL,
  `InformacoesAluno` varchar(50) DEFAULT NULL,
  `QualAula` varchar(50) NOT NULL,
  `Certificado` int(1) NOT NULL,
  `Instituicao` varchar(50) DEFAULT NULL,
  `ComoAprendeu` varchar(50) DEFAULT NULL,
  `PorQue` text NOT NULL,
  `SalvoEm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Noticia`
--

CREATE TABLE `Noticia` (
  `ID` int(6) UNSIGNED NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Previa` varchar(350) NOT NULL,
  `Texto` text NOT NULL,
  `Foto` varchar(45) DEFAULT NULL,
  `SalvoEm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Pessoa`
--

CREATE TABLE `Pessoa` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Senha` varchar(45) NOT NULL,
  `Sobre` mediumtext,
  `Foto` varchar(45) DEFAULT NULL,
  `DataNascimento` varchar(10) DEFAULT NULL,
  `NivelAcesso` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Questao`
--

CREATE TABLE `Questao` (
  `ID` int(6) UNSIGNED NOT NULL,
  `IDTeste` int(6) UNSIGNED NOT NULL,
  `Questao` text NOT NULL,
  `A` text NOT NULL,
  `B` text NOT NULL,
  `C` text NOT NULL,
  `D` text NOT NULL,
  `E` text NOT NULL,
  `Resposta` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Teste`
--

CREATE TABLE `Teste` (
  `ID` int(6) UNSIGNED NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Ativo` int(1) NOT NULL,
  `SalvoEm` datetime DEFAULT NULL,
  `QuantidadeQuestoes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TesteResultado`
--

CREATE TABLE `TesteResultado` (
  `ID` int(6) UNSIGNED NOT NULL,
  `IDTeste` int(6) UNSIGNED NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Resultado` float NOT NULL,
  `SalvoEm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AlunoCurso`
--
ALTER TABLE `AlunoCurso`
  ADD PRIMARY KEY (`IDPessoa`,`IDCurso`),
  ADD KEY `FK_Curso` (`IDCurso`);

--
-- Indexes for table `Conteudo`
--
ALTER TABLE `Conteudo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_CursoConteudo` (`IDCurso`);

--
-- Indexes for table `CorpoAdministrativo`
--
ALTER TABLE `CorpoAdministrativo`
  ADD PRIMARY KEY (`Presidente`),
  ADD KEY `VicePresidente` (`VicePresidente`),
  ADD KEY `Marketing` (`Marketing`),
  ADD KEY `Financeiro` (`Financeiro`),
  ADD KEY `RelacaoExternas` (`RelacoesExternas`),
  ADD KEY `RH` (`RH`),
  ADD KEY `Academica` (`Academica`);

--
-- Indexes for table `Curso`
--
ALTER TABLE `Curso`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Fk_ProfessorA` (`IDProfessorA`),
  ADD KEY `Fk_ProfessorB` (`IDProfessorB`);

--
-- Indexes for table `FormAdministrativo`
--
ALTER TABLE `FormAdministrativo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `FormProfessor`
--
ALTER TABLE `FormProfessor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Noticia`
--
ALTER TABLE `Noticia`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Pessoa`
--
ALTER TABLE `Pessoa`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `Questao`
--
ALTER TABLE `Questao`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDTeste` (`IDTeste`);

--
-- Indexes for table `Teste`
--
ALTER TABLE `Teste`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `TesteResultado`
--
ALTER TABLE `TesteResultado`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDTeste` (`IDTeste`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Conteudo`
--
ALTER TABLE `Conteudo`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Curso`
--
ALTER TABLE `Curso`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `FormAdministrativo`
--
ALTER TABLE `FormAdministrativo`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `FormProfessor`
--
ALTER TABLE `FormProfessor`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Noticia`
--
ALTER TABLE `Noticia`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Pessoa`
--
ALTER TABLE `Pessoa`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Questao`
--
ALTER TABLE `Questao`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Teste`
--
ALTER TABLE `Teste`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `TesteResultado`
--
ALTER TABLE `TesteResultado`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AlunoCurso`
--
ALTER TABLE `AlunoCurso`
  ADD CONSTRAINT `FK_Aluno` FOREIGN KEY (`IDPessoa`) REFERENCES `Pessoa` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Curso` FOREIGN KEY (`IDCurso`) REFERENCES `Curso` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Conteudo`
--
ALTER TABLE `Conteudo`
  ADD CONSTRAINT `FK_CursoConteudo` FOREIGN KEY (`IDCurso`) REFERENCES `Curso` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CorpoAdministrativo`
--
ALTER TABLE `CorpoAdministrativo`
  ADD CONSTRAINT `CorpoAdministrativo_ibfk_1` FOREIGN KEY (`Presidente`) REFERENCES `Pessoa` (`ID`),
  ADD CONSTRAINT `CorpoAdministrativo_ibfk_2` FOREIGN KEY (`VicePresidente`) REFERENCES `Pessoa` (`ID`),
  ADD CONSTRAINT `CorpoAdministrativo_ibfk_3` FOREIGN KEY (`Marketing`) REFERENCES `Pessoa` (`ID`),
  ADD CONSTRAINT `CorpoAdministrativo_ibfk_4` FOREIGN KEY (`Financeiro`) REFERENCES `Pessoa` (`ID`),
  ADD CONSTRAINT `CorpoAdministrativo_ibfk_5` FOREIGN KEY (`RelacoesExternas`) REFERENCES `Pessoa` (`ID`),
  ADD CONSTRAINT `CorpoAdministrativo_ibfk_6` FOREIGN KEY (`RH`) REFERENCES `Pessoa` (`ID`),
  ADD CONSTRAINT `CorpoAdministrativo_ibfk_7` FOREIGN KEY (`Academica`) REFERENCES `Pessoa` (`ID`);

--
-- Constraints for table `Curso`
--
ALTER TABLE `Curso`
  ADD CONSTRAINT `Fk_ProfessorA` FOREIGN KEY (`IDProfessorA`) REFERENCES `Pessoa` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_ProfessorB` FOREIGN KEY (`IDProfessorB`) REFERENCES `Pessoa` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `Questao`
--
ALTER TABLE `Questao`
  ADD CONSTRAINT `Questao_ibfk_1` FOREIGN KEY (`IDTeste`) REFERENCES `Teste` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `TesteResultado`
--
ALTER TABLE `TesteResultado`
  ADD CONSTRAINT `TesteResultado_ibfk_1` FOREIGN KEY (`IDTeste`) REFERENCES `Teste` (`ID`) ON DELETE CASCADE;
COMMIT;