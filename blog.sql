-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Jun-2018 às 13:44
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `criado_em_cat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `usuario_id`, `nome`, `criado_em_cat`) VALUES
(1, 1, 'Teste', '2018-05-19 14:33:23'),
(2, 1, 'adriano ', '2018-05-19 18:02:12'),
(3, 1, 'adriano ', '2018-05-19 18:02:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `post_id`, `nome`, `email`, `conteudo`, `criado_em`) VALUES
(1, 5, 'teste', 'slivadrip@gmail.com', 'Tendo como base de partida o MySQL 5.0, a forma de alterarmos o nome de uma tabela é trivial e simples com o comando/função “rename table”. Outrora, renomear uma coluna, era extremamente confuso e complexo, mesmo lendo a documentação de trás para a frente. Deixamos alguns ', '2018-05-19 17:58:14'),
(2, 5, 'adriano ', 'slivadrip@gmail.com', 'teste', '2018-05-19 17:59:30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `categoria_id`, `usuario_id`, `titulo`, `slug`, `conteudo`, `post_image`, `criado_em`) VALUES
(1, 1, 1, 'Adriano', 'Adriano', '<p>teste</p>\r\n', '17264804_1061801143923713_3935183043056655989_n.jpg', '2018-05-19 14:33:40'),
(2, 1, 1, 'Na montanha-russa do futebol, Paquetá e Evander vivem Flamengo x Vasco diferente', 'Na-montanha-russa-do-futebol-Paqueta-e-Evander-vivem-Flamengo-x-Vasco-diferente', '<p>Se o futebol fosse uma montanha-russa, como aquelas grandes e assustadoras de parques de divers&otilde;es, Lucas Paquet&aacute;, do Flamengo, e Evander, do Vasco, estariam em carrinhos diferentes. Enquanto um frequentaria o alto, o outro talvez estivesse num trecho mais complicado.</p>\r\n\r\n<p>Titular absoluto do Flamengo, Lucas Paquet&aacute; n&atilde;o viveu s&oacute; de gl&oacute;rias no in&iacute;cio de sua carreira profissional - recebia poucas oportunidades justamente com Z&eacute; Ricardo. J&aacute; Evander, que era quase incontest&aacute;vel no Vasco, caiu de produ&ccedil;&atilde;o em 2018, viu as chances diminu&iacute;rem e as vaias da torcida come&ccedil;arem.</p>\r\n\r\n<p>Neste s&aacute;bado, &agrave;s 19h (de Bras&iacute;lia), Flamengo e Vasco estar&atilde;o frente a frente no Maracan&atilde;, pelo Campeonato Brasileiro, mas s&oacute; Lucas Paquet&aacute; ser&aacute; titular. Evander ficar&aacute; no banco de reservas, mais uma vez.</p>\r\n', '32.jpg', '2018-05-19 16:45:17'),
(3, 1, 1, 'Vasco x Flamengo: os detalhes da grande final do Carioca Sub-20 2018', 'Vasco-x-Flamengo-os-detalhes-da-grande-final-do-Carioca-Sub-20-2018', '<p>Depois de 90 minutos jogados na semana passada e o empate por 1 a 1, chegou a hora da verdade no Carioca Sub-20. Vasco e Flamengo decidem o t&iacute;tulo neste s&aacute;bado, no Maracan&atilde;, a partir das 16h. O GloboEsporte.com transmite o jogo em tempo real. E nas pr&oacute;ximas linhas, o blog vai tentar destrinchar um pouco o perfil das duas equipes.</p>\r\n\r\n<p><strong>Como foi o primeiro jogo?</strong></p>\r\n\r\n<p>Dois tempos distintos. No primeiro, o Flamengo teve leve superioridade, marcou no campo de ataque e abriu o placar com Bill em um belo chute de fora da &aacute;rea. No segundo, o Vasco melhorou, empatou com Lucas Santos e ainda teve uma bola na trave no fim, em cobran&ccedil;a de falta do mesmo Lucas Santos. No final, resultado justo.</p>\r\n\r\n<p><strong>Como fica para a segunda partida?</strong></p>\r\n\r\n<p>Bem simples. Quem ganhar &eacute; campe&atilde;o. Em caso de empate, decis&atilde;o por p&ecirc;naltis.</p>\r\n\r\n<p><strong>Como v&atilde;o as equipes?</strong></p>\r\n\r\n<p>O Vasco ter&aacute; o retorno de Hugo Borges, que cumpriu suspens&atilde;o. Mas ele dever&aacute; come&ccedil;ar no banco de reservas. No Flamengo, Lucas Silva, artilheiro do time com seis gols, sofreu uma grave les&atilde;o no tornozelo e est&aacute; afastado por quatro meses. Michael, que ficou no banco, &eacute; d&uacute;vida e pode voltar no lugar de Ramon.</p>\r\n\r\n<p><strong>As caracter&iacute;sticas</strong></p>\r\n\r\n<p>As duas equipes jogam em transi&ccedil;&atilde;o r&aacute;pida para o ataque. O Flamengo tem em Pep&ecirc; um meia que joga pelo lado, mas cadencia mais o jogo em alguns momentos. No Vasco, a velocidade e a qualidade individual de Lucas Santos certamente s&atilde;o um trunfo na m&atilde;o do t&eacute;cnico Marcos Valadares.</p>\r\n\r\n<p><strong>Vasco tenta o bi</strong></p>\r\n\r\n<p>Campe&atilde;o no ano passado, o Vasco tinha em sua equipe nomes como Evander, Bruno Cosendey, Ricardo Gra&ccedil;a, Caio Monteiro e Andrey, hoje j&aacute; nos profissionais. Paulinho antes da decis&atilde;o.</p>\r\n\r\n<p><strong>Flamengo tenta recuperar hegemonia</strong></p>\r\n\r\n<p>O &uacute;ltimo t&iacute;tulo carioca do Flamengo foi em 2015, com Lucas Paquet&aacute; com a camisa 8 e grande partida de Cafu em campo. O t&eacute;cnico era Z&eacute; Ricardo, hoje nos profissionais do pr&oacute;prio Vasco.</p>\r\n\r\n<p><strong>As prov&aacute;veis escala&ccedil;&otilde;es</strong></p>\r\n\r\n<p><strong>Vasco:&nbsp;</strong>Alexander, Rafael Fran&ccedil;a, Miranda, Gabriel Nor&otilde;es e Luan; Rodrigo, Caio Lopes, Dudu, Marrony e Lucas Santos; Moresche. T&eacute;cnico: Marcos Valadares</p>\r\n\r\n<p><strong>Flamengo:&nbsp;</strong>Gabriel, Wesley, Thuler, Matheus Dantas e Michael (Ramon); Hugo Moura, Theo, Pep&ecirc;, Luiz Henrique e Bill; Vitor Gabriel. T&eacute;cnico: M&aacute;rcio Torres</p>\r\n', '1.jpg', '2018-05-19 17:03:19'),
(4, 1, 1, 'Segundo jornal, Guerrero terá reunião com presidente da Fifa para falar da suspensão', 'Segundo-jornal-Guerrero-tera-reuniao-com-presidente-da-Fifa-para-falar-da-suspensao', '<p>egundo o &quot;As&quot;, do Peru, o atacante Paolo Guerrero ter&aacute; uma reuni&atilde;o neste domingo com o presidente da Fifa, Gianni Infantino, para falar sobre a suspens&atilde;o por doping. Tamb&eacute;m estar&aacute; neste encontro o presidente da Federa&ccedil;&atilde;o Peruana de Futebol (FPF), Edwin Oviedo. De acordo com o jornal, Guerrero viaja neste domingo para Zurique, na Su&iacute;&ccedil;a.</p>\r\n\r\n<p>Segundo a imprensa peruana, a reuni&atilde;o com Infantino e outros representantes da Fifa ser&aacute; na ter&ccedil;a-feira. A Fifa n&atilde;o tem poder para anistiar um caso de doping. Isto &eacute;, n&atilde;o pode reverter a decis&atilde;o do Tribunal Arbitral do Esporte (TAS), de suspend&ecirc;-lo por 14 meses.</p>\r\n\r\n<p>Paolo Guerrero foi suspenso por 14 meses pelo TAS ap&oacute;s ser flagrado no exame anti-doping pela presen&ccedil;a da subst&acirc;ncia benzoilecgonina, um metab&oacute;lito da coca&iacute;na e da folha de coca. A defesa do jogador alega que, por um erro do hotel, o jogador consumiu ch&aacute; de coca acidentalmente.</p>\r\n\r\n<p><a href="https://globoesporte.globo.com/futebol/times/flamengo/noticia/chateado-com-postura-da-federacao-guerrero-cogita-se-aposentar-da-selecao.ghtml"><strong>+ Chateado com federa&ccedil;&atilde;o, Guerrero cogita se aposentar da sele&ccedil;&atilde;o</strong></a></p>\r\n\r\n<p><a href="https://globoesporte.globo.com/futebol/times/flamengo/noticia/flamengo-suspende-o-contrato-de-guerrero-pelo-segunda-vez.ghtml">O contrato de Guerrero com o Flamengo foi suspenso nesta sexta-feira.</a>&nbsp;O clube decidiu interromper pela segunda vez os pagamentos ao atacante. O v&iacute;nculo entre as partes vai at&eacute; o dia 10 de agosto.</p>\r\n', '2.jpg', '2018-05-19 17:06:25'),
(5, 1, 1, 'teste', 'teste', '<p>Tendo como base de partida o MySQL 5.0, a forma de alterarmos o nome de uma tabela &eacute; trivial e simples com o comando/fun&ccedil;&atilde;o &ldquo;rename table&rdquo;. Outrora, renomear uma coluna, era extremamente confuso e complexo, mesmo lendo a documenta&ccedil;&atilde;o de tr&aacute;s para a frente. Deixamos alguns exemplos concretos para explicar melhor.</p>\r\n', 'java.jpg', '2018-05-19 17:50:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `data_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `telefone`, `email`, `username`, `password`, `data_registro`) VALUES
(1, 'Adriano', '72301-811', 'slivadrip@gmail.com', 'adriano', 'c19c8f9b6caad92726f88434d1493ad5', '2018-05-19 14:26:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
