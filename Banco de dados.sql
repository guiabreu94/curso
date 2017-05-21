-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Maio-2017 às 23:33
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensinoaprendizagem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `user_id` bigint(20) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `nome_curto` varchar(40) DEFAULT NULL,
  `login_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`user_id`, `email`, `nome`, `nome_curto`, `login_id`) VALUES
(46480000000000993, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contem`
--

CREATE TABLE `contem` (
  `ID_questionario` int(11) NOT NULL,
  `ID_pergunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contem`
--

INSERT INTO `contem` (`ID_questionario`, `ID_pergunta`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `ID_pergunta` int(11) NOT NULL,
  `Conteudo` text NOT NULL,
  `Status` char(3) NOT NULL,
  `Tipo` varchar(30) DEFAULT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`ID_pergunta`, `Conteudo`, `Status`, `Tipo`, `foto`) VALUES
(1, 'Eu entendo melhor as coisas depois de:', 'a', 'Vis', '123.jpg'),
(2, 'Eu prefiro ser considerado:', 'a', 'Vis', ''),
(3, ' trtertere', 'a', 'Vis', ''),
(4, ' Tendo a:', 'i', 'Ver', ''),
(5, 'Quando estou aprendendo um assunto novo, algo que me ajuda é:', 'a', 'Ati', '5.jpg'),
(6, 'Se eu fosse um professor, eu preferiria ensinar uma disciplina:', 'a', 'Sen', ''),
(7, 'Eu prefiro obter novas informações a partir de:', 'a', 'Ver', ''),
(8, 'Uma vez que eu entenda:', 'i', 'Seq', ''),
(9, 'Em um grupo de estudo, trabalhando um assunto difícil, eu geralmente:', 'a', 'Ati', ''),
(10, 'Acho mais fácil:', 'a', 'Glo', ''),
(11, 'Em um livro com várias figuras e desenhos, eu provavelmente:', 'a', 'Vis', ''),
(12, 'Quando eu resolvo problemas de matemática eu:', 'a', 'Seq', ''),
(13, 'Nas disciplinas que cursei eu:', 'a', 'Ati', ''),
(14, 'Em literatura de não ficção, eu prefiro:', 'a', 'Int', ''),
(15, 'Eu gosto de professores:', 'i', 'Ver', ''),
(16, 'Quando estou analisando uma história eu:', 'i', 'Seq', ''),
(17, 'Quando começo a resolver um trabalho de casa, normalmente eu:', 'i', 'Ref', ''),
(18, 'Quando estou estudando prefiro lidar com:', 'i', 'Sen', ''),
(19, 'Relembro melhor:', 'i', 'Vis', ''),
(20, 'É mais importante para mim que o professor:', 'i', 'Seq', ''),
(21, 'Eu prefiro estudar:', 'i', 'Ati', ''),
(22, 'Eu costumo ser considerado(a):', 'i', 'Int', ''),
(23, 'Quando busco orientação para chegar a um lugar desconhecido, eu prefiro:', 'i', 'Vis', ''),
(24, 'Eu aprendo:', 'i', 'Glo', ''),
(25, 'Eu prefiro primeiro:', 'i', 'Ref', ''),
(26, 'Quando estou lendo por lazer, prefiro autores que:', 'i', 'Sen', ''),
(27, 'Quando vejo um diagrama ou esquema em uma aula, relembro mais facilmente:', 'i', 'Vis', ''),
(28, 'Quando considero um conjunto de informações, provavelmente eu:', 'i', 'Seq', ''),
(29, 'Relembro mais facilmente:', 'i', 'Ati', ''),
(30, 'Quando tenho alguma tarefa para executar, eu prefiro:', 'i', 'Sen', ''),
(31, 'Quando alguém está me mostrando dados, eu prefiro:', 'i', 'Vis', ''),
(32, 'Quando escrevo um texto, um artigo, uma redação, eu prefiro trabalhar (pensar a respeito ou escrever):', 'i', 'Seq', ''),
(33, 'Quando tenho que trabalhar em um projeto em grupo, eu prefiro que se faça:', 'i', 'Ati', ''),
(34, 'Considero um elogio chamar alguém de:', 'i', 'Sen', ''),
(35, 'Quando conheço pessoas em uma situação informal, é mais provável que eu me lembre melhor:', 'i', 'Vis', ''),
(36, 'Quando estou aprendendo um assunto novo, eu prefiro:', 'i', 'Seq', ''),
(37, 'Geralmente sou considerado(a):', 'i', 'Ati', ''),
(38, 'Prefiro disciplinas que enfatizem:', 'i', 'Sen', ''),
(39, 'Para entretenimento, eu prefiro:', 'i', 'Vis', ''),
(40, 'Alguns professores iniciam suas aulas com um resumo do que irão abordar.Tais resumos são:', 'i', 'Seq', ''),
(41, 'A ideia de fazer o trabalho de casa em grupo, com a mesma nota para todos do grupo:', 'i', 'Ati', ''),
(42, 'Quando estou fazendo cálculos longos:', 'i', 'Sen', ''),
(43, 'Costumo relembrar, visualizar os lugares onde estive:', 'i', 'Vis', ''),
(44, 'Quando estou resolvendo problemas em grupo, mais provavelmente eu:', 'i', 'Seq', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario`
--

CREATE TABLE `questionario` (
  `ID_questionario` int(11) NOT NULL,
  `Conteudo` text NOT NULL,
  `Status` char(3) NOT NULL,
  `conclusao` text NOT NULL,
  `instrucao` text NOT NULL,
  `Nome` text NOT NULL,
  `Numero_questoes_necessarias` int(11) NOT NULL,
  `pagina` varchar(50) NOT NULL,
  `SIS_idcurso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questionario`
--

INSERT INTO `questionario` (`ID_questionario`, `Conteudo`, `Status`, `conclusao`, `instrucao`, `Nome`, `Numero_questoes_necessarias`, `pagina`, `SIS_idcurso`) VALUES
(1, 'Para cada uma das 44 perguntas abaixo, selecione uma das apções para indicar sua\n                resposta. Só é possível escolher uma resposta para cada pergunta. Se ambas parecem se aplicar a\n                você, escolha a que se aplica com mais freqüência. Quando terminar de selecionar\n                as respostas para cada pergunta, selecione o botão Enviar no final do formulário.', 'a', '<p >Se sua pontuação em uma escala é de 1 a 3, você está bem equilibrado\n                nas duas dimensões dessa escala.</p>\n            <p >Se a sua pontuação em uma escala é 5-7, você tem uma preferência \n            moderada para uma dimensão da escala. </p>\n            <p >Se sua pontuação em uma escala é 9-11, você tem uma forte \n            preferência por uma dimensão da escala.</p>\n	  </UL>\n	   Sugerimos que você imprima esta página, para que quando você olha para\n           as explicações das diferentes escalas você terá um registro de suas preferências\n           individuais<b>Ao fechar a página, as informações não podem ser recuperadas.</b><P>', 'Seu nome será impresso nas informações que lhe forem devolvidas.', 'Ensino de aprendizagem', 4, '', 0),
(2, 'Questionario de teste.', 'i', 'testando', 'Questionario usado para teste', 'Questionario de teste', 20, '', 0),
(3, 'dasdsa', 'a', 'asdadd', 'dasdad', 'dasdasd', 22, 'asdsad', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario_estilo`
--

CREATE TABLE `questionario_estilo` (
  `cod_resp` int(11) NOT NULL,
  `ID_aluno` bigint(20) DEFAULT NULL,
  `Ati_Ref` int(11) NOT NULL,
  `Sen_Int` int(11) NOT NULL,
  `Seq_glo` int(11) NOT NULL,
  `Vis_Ver` int(11) NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario_resp`
--

CREATE TABLE `questionario_resp` (
  `codigo_resp` int(11) NOT NULL,
  `ID_questionario` int(11) NOT NULL,
  `ID_aluno` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respondem`
--

CREATE TABLE `respondem` (
  `ID_pergunta` int(11) DEFAULT NULL,
  `ID_resposta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `respondem`
--

INSERT INTO `respondem` (`ID_pergunta`, `ID_resposta`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10),
(6, 11),
(6, 12),
(7, 13),
(7, 14),
(8, 15),
(8, 16),
(9, 17),
(9, 18),
(10, 19),
(10, 20),
(11, 21),
(11, 22),
(12, 23),
(12, 24),
(13, 25),
(13, 26),
(14, 27),
(14, 28),
(15, 29),
(15, 30),
(16, 31),
(16, 32),
(17, 33),
(17, 34),
(18, 35),
(18, 36),
(19, 37),
(19, 38),
(20, 39),
(20, 40),
(21, 41),
(21, 42),
(22, 43),
(22, 44),
(23, 45),
(23, 46),
(24, 47),
(24, 48),
(25, 49),
(25, 50),
(26, 51),
(26, 52),
(27, 53),
(27, 54),
(28, 55),
(28, 56),
(29, 57),
(29, 58),
(30, 59),
(30, 60),
(31, 61),
(31, 62),
(32, 63),
(32, 64),
(33, 65),
(33, 66),
(34, 67),
(34, 68),
(35, 69),
(35, 70),
(36, 71),
(36, 72),
(37, 73),
(37, 74),
(38, 75),
(38, 76),
(39, 77),
(39, 78),
(40, 79),
(40, 80),
(41, 81),
(41, 82),
(42, 83),
(42, 84),
(43, 85),
(43, 86),
(44, 87),
(44, 88),
(1, 89);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `ID_resposta` int(11) NOT NULL,
  `Conteudo` text NOT NULL,
  `status` char(3) NOT NULL,
  `Correta` char(3) DEFAULT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`ID_resposta`, `Conteudo`, `status`, `Correta`, `foto`) VALUES
(1, 'Experimenta-la.', 'i', 'c', ''),
(2, 'Pensar sobre ela.', 'a', 'e', ''),
(3, 'Realista.', 'a', 'e', ''),
(4, 'Inovador(a).', 'a', 'c', ''),
(5, '', 'a', 'e', '5.jpg'),
(6, '', 'a', 'c', '6.jpg'),
(7, 'Compreender os detalhes de um assunto, mas a estrutura geral pode ficar imprecisa.', 'a', 'c', ''),
(8, 'Compreender a estrutura geral de um assunto,mas os detalhes podem ficar imprecisos.', 'a', 'e', ''),
(9, 'Falar sobre ele.', 'a', 'c', ''),
(10, 'Pensar sobre ele.', 'a', 'e', '10.jpg'),
(11, 'Que lidasse com fatos e situações reais.', 'a', 'c', ''),
(12, 'Que lidasse com ideias e teorias.', 'a', 'e', ''),
(13, 'Figuras, diagramas, gráficos ou mapas.', 'a', 'c', ''),
(14, 'Instruções escritas ou informações verbais.', 'a', 'e', ''),
(15, 'todas as partes, consigo entender o todo.', 'a', 'c', ''),
(16, 'o todo, consigo ver como as partes se encaixam.', 'a', 'e', ''),
(17, 'Tomo a iniciativa e contribuo com ideias.', 'a', 'c', ''),
(18, 'Assumo uma posição discreta e escuto.', 'a', 'e', ''),
(19, 'Aprender fatos.', 'a', 'c', ''),
(20, 'Aprender conceitos.', 'a', 'e', ''),
(21, 'Observo as figuras e desenhos cuidadosamente.', 'a', 'c', ''),
(22, 'Concentro-me no texto escrito.', 'a', 'e', ''),
(23, 'Geralmente trabalho uma etapa de cada vez para obter os resultados.', 'a', 'e', ''),
(24, 'Frequentemente percebo, sei as soluções, mas depois tenho que me esforçar muito para compreender e descrever as etapas para chegar a essas soluções', 'a', 'c', ''),
(25, 'Geralmente me aproximei de muitos dos colegas', 'a', 'c', ''),
(26, 'Raramente me aproximei de muitos dos colegas.', 'a', 'e', ''),
(27, 'Algo que me ensine fatos novos ou me mostre como fazer alguma coisa.', 'a', 'c', ''),
(28, 'Algo que me apresente novas ideias para pensar.', 'a', 'e', ''),
(29, 'Que colocam um monte de diagramas no quadro.', 'a', 'c', ''),
(30, 'Que gastam bastante tempo explicando.', 'a', 'e', ''),
(31, 'Penso sobre os incidentes e tento colocá-los juntos para identificar os temas.', 'a', 'c', ''),
(32, 'Só identifico quais são os temas quando termino a leitura; então, tenho que voltar à história e identificar os incidentes que demonstrem esses temas.', 'a', 'e', ''),
(33, 'Começo a trabalhar imediatamente buscando a sua solução.', 'a', 'e', ''),
(34, 'Primeiro tento compreender o problema como um todo.', 'a', 'c', ''),
(35, 'Certezas, fatos concretos.', 'a', 'e', ''),
(36, 'Teorias, hipóteses, conceitos.', 'a', 'c', ''),
(37, 'O que vejo.', 'a', 'e', ''),
(38, 'O que ouço.', 'a', 'c', ''),
(39, 'Apresente a matéria em etapas sequenciais claras.', 'a', 'e', ''),
(40, 'Apresente uma visão geral e relacione a matéria com outros assuntos.', 'a', 'c', ''),
(41, 'Em grupo.', 'a', 'e', ''),
(42, 'Sozinho(a).', 'a', 'c', ''),
(43, 'Cuidadoso(a) com os detalhes do meu trabalho.', 'a', 'e', ''),
(44, 'Criativo(a) na maneira de realizar meu trabalho.', 'a', 'c', ''),
(45, 'Um mapa.', 'a', 'e', ''),
(46, 'Instruções por escrito.', 'a', 'c', ''),
(47, 'Gradativamente, em um ritmo bastante regular. Se eu estudar bastante, \"chego lá\".', 'a', 'e', ''),
(48, 'Indo e voltando, em saltos. Fico totalmente confuso(a) por algum tempo e, então, repentinamente, tudo faz sentido, \"num estalo\".', 'a', 'c', ''),
(49, 'Experimentar, tentar fazer as coisas.', 'a', 'c', ''),
(50, 'Pensar sobre como é que eu vou fazer.', 'a', 'e', ''),
(51, 'Explicitem claramente o que querem dizer.', 'a', 'c', ''),
(52, 'Digam as coisas de maneira criativa, interessante.', 'a', 'e', ''),
(53, 'A figura.', 'a', 'c', ''),
(54, 'O que o professor disse a respeito dela.', 'a', 'e', ''),
(55, 'Presto mais atenção aos detalhes e não percebo o quadro geral.', 'a', 'e', ''),
(56, 'Procuro compreender o quadro geral antes de atentar para os detalhes.', 'a', 'c', ''),
(57, 'Algo que fiz.', 'a', 'e', ''),
(58, 'Algo sobre o que pensei, refleti bastante.', 'a', 'c', ''),
(59, 'Saber bem uma maneira de executar a tarefa.', 'a', 'e', ''),
(60, 'Desenvolver novas maneiras de executar a tarefa.', 'a', 'c', ''),
(61, 'Diagramas e gráficos.', 'a', 'c', ''),
(62, 'Texto resumindo os resultados.', 'a', 'e', ''),
(63, 'A parte inicial do texto e avançar linearmente do início para o fim.', 'a', 'e', ''),
(64, 'Diferentes partes do texto e ordená-las depois.', 'a', 'c', ''),
(65, 'Um debate em grupo em que todos contribuam com ideias, um brainstorming* coletivo.', 'a', 'e', ''),
(66, 'Um brainstorming* individual, seguido de reunião do grupo para comparar ideias.', 'a', 'c', ''),
(67, 'Sensato.', 'a', 'c', ''),
(68, 'Imaginativo.', 'a', 'c', ''),
(69, 'De sua aparência.', 'a', 'c', ''),
(70, 'Do que elas disseram sobre si mesmas.', 'a', 'e', ''),
(71, 'Concentrar-me no assunto, aprendendo o máximo possível sobre ele.', 'a', 'c', ''),
(72, 'Tentar estabelecer conexões entre o assunto e outros a ele relacionados.', 'a', 'e', ''),
(73, 'Expansivo.', 'a', 'e', ''),
(74, 'Reservado(a).', 'a', 'c', ''),
(75, 'Material concreto (fatos, dados).', 'a', 'e', ''),
(76, 'Material abstrato (conceitos, teorias).', 'a', 'c', ''),
(77, 'Assistir televisão.', 'a', 'c', ''),
(78, 'Ler um livro.', 'a', 'e', ''),
(79, 'De alguma maneira úteis para mim.', 'a', 'e', ''),
(80, 'Muito úteis para mim.', 'a', 'e', ''),
(81, 'Sim, me agrada.', 'a', 'e', ''),
(82, 'Não me agrada.', 'a', 'e', ''),
(83, 'Costumo repetir todos os passos e conferir meu trabalho cuidadosamente.', 'a', 'e', ''),
(84, 'Acho cansativo conferir o meu trabalho e tenho que me esforçar para fazê-lo.', 'a', 'c', ''),
(85, 'Com facilidade e bom detalhamento.', 'a', 'e', ''),
(86, 'Com dificuldade e sem muitos detalhes.', 'a', 'c', ''),
(87, 'Penso nas etapas do processo de solução.', 'a', 'e', ''),
(88, 'Penso nas possíveis consequências ou nas possíveis aplicações da solução para outras áreas.', 'a', 'c', ''),
(89, 'Outra resposta.', 'a', 'c', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tentativas_resposta`
--

CREATE TABLE `tentativas_resposta` (
  `tentativa` int(11) NOT NULL,
  `ID_pergunta` int(11) NOT NULL,
  `ID_resposta` int(11) NOT NULL,
  `ID_tentativa` int(11) NOT NULL,
  `codigo_resp` int(11) NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `index_user_id` (`user_id`);

--
-- Indexes for table `questionario_estilo`
--
ALTER TABLE `questionario_estilo`
  ADD PRIMARY KEY (`cod_resp`),
  ADD KEY `ID_aluno` (`ID_aluno`);

--
-- Indexes for table `questionario_resp`
--
ALTER TABLE `questionario_resp`
  ADD PRIMARY KEY (`codigo_resp`),
  ADD KEY `ID_questionario` (`ID_questionario`),
  ADD KEY `user_id` (`ID_aluno`);

--
-- Indexes for table `tentativas_resposta`
--
ALTER TABLE `tentativas_resposta`
  ADD PRIMARY KEY (`ID_tentativa`),
  ADD KEY `ID_resposta` (`ID_resposta`),
  ADD KEY `ID_pergunta` (`ID_pergunta`),
  ADD KEY `codigo_resp` (`codigo_resp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questionario_estilo`
--
ALTER TABLE `questionario_estilo`
  MODIFY `cod_resp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questionario_resp`
--
ALTER TABLE `questionario_resp`
  MODIFY `codigo_resp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tentativas_resposta`
--
ALTER TABLE `tentativas_resposta`
  MODIFY `ID_tentativa` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `questionario_estilo`
--
ALTER TABLE `questionario_estilo`
  ADD CONSTRAINT `questionario_estilo_ibfk_1` FOREIGN KEY (`ID_aluno`) REFERENCES `aluno` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
