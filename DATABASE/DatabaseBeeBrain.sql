-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Giu 04, 2020 alle 18:27
-- Versione del server: 8.0.20-0ubuntu0.20.04.1
-- Versione PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beeBrain`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `anime`
--

CREATE TABLE `anime` (
  `id` int NOT NULL,
  `animeDone` int DEFAULT NULL,
  `animeError` int DEFAULT NULL,
  `animeCorrect` int DEFAULT NULL,
  `animePoints` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `anime`
--

INSERT INTO `anime` (`id`, `animeDone`, `animeError`, `animeCorrect`, `animePoints`) VALUES
(1, 31, 441, 474, 13),
(2, 1, 0, 20, 100),
(3, 1, 0, 20, 100),
(4, 1, 11, 9, 23),
(5, 1, 8, 12, 44),
(6, 0, NULL, NULL, NULL),
(7, 1, 7, 13, 51),
(8, 0, NULL, NULL, NULL),
(9, 0, NULL, NULL, NULL),
(10, 0, NULL, NULL, NULL),
(11, 0, NULL, NULL, NULL),
(12, 0, NULL, NULL, NULL),
(13, 0, NULL, NULL, NULL),
(14, 0, NULL, NULL, NULL),
(15, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `correctAns`
--

CREATE TABLE `correctAns` (
  `id` int NOT NULL,
  `ans` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `correctAns`
--

INSERT INTO `correctAns` (`id`, `ans`) VALUES
(1, 'vero,vero,vero,vero,vero,vero,vero,vero,vero,vero,vero,falso,vero,falso,falso,vero,vero,falso,vero,vero'),
(2, 'vero,vero,vero,vero,vero,vero,falso,vero,vero,vero,vero,vero,falso,falso,vero,vero,vero,vero,falso,vero'),
(3, 'vero,vero,vero,falso,vero,falso,vero,vero,vero,vero,vero,vero,vero,vero,vero,falso,falso,vero,vero,falso'),
(4, 'vero,vero,vero,vero,vero,falso,vero,vero,vero,vero,falso,falso,vero,falso,vero,falso,vero,vero,falso,vero'),
(5, 'vero,vero,vero,vero,vero,falso,falso,falso,falso,vero,vero,vero,vero,vero,falso,vero,vero,falso,vero,vero'),
(6, 'vero,falso,falso,falso,falso,falso,vero,vero,falso,vero,falso,falso,falso,falso,vero,vero,vero,falso,vero,vero'),
(7, 'falso,vero,falso,vero,falso,falso,vero,vero,vero,vero,falso,vero,falso,vero,vero,falso,vero,falso,falso,vero'),
(8, 'falso,falso,vero,vero,falso,vero,vero,falso,vero,falso,vero,vero,vero,vero,falso,vero,vero,vero,falso,vero'),
(9, 'vero,vero,vero,vero,falso,vero,vero,falso,falso,falso,vero,vero,vero,falso,falso,vero,falso,falso,vero,falso'),
(10, 'vero,vero,falso,vero,vero,falso,falso,vero,vero,vero,vero,vero,vero,vero,falso,falso,falso,falso,vero,falso'),
(11, 'ans'),
(12, 'ans'),
(13, 'ans'),
(14, 'ans'),
(15, 'ans');

-- --------------------------------------------------------

--
-- Struttura della tabella `generale`
--

CREATE TABLE `generale` (
  `id` int NOT NULL,
  `generalDone` int DEFAULT NULL,
  `generalError` int DEFAULT NULL,
  `generalCorrect` int DEFAULT NULL,
  `generalPoints` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `generale`
--

INSERT INTO `generale` (`id`, `generalDone`, `generalError`, `generalCorrect`, `generalPoints`) VALUES
(1, 24, 308, 124, -18),
(2, 0, NULL, NULL, NULL),
(3, 0, NULL, NULL, NULL),
(4, 0, NULL, NULL, NULL),
(5, 0, NULL, NULL, NULL),
(6, 0, NULL, NULL, NULL),
(7, 0, NULL, NULL, NULL),
(8, 1, 8, 12, 44),
(9, 1, 11, 9, 23),
(10, 0, NULL, NULL, NULL),
(11, 0, NULL, NULL, NULL),
(12, 0, NULL, NULL, NULL),
(13, 0, NULL, NULL, NULL),
(14, 0, NULL, NULL, NULL),
(15, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `geografia`
--

CREATE TABLE `geografia` (
  `id` int NOT NULL,
  `geoDone` int DEFAULT NULL,
  `geoError` int DEFAULT NULL,
  `geoCorrect` int DEFAULT NULL,
  `geoPoints` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `geografia`
--

INSERT INTO `geografia` (`id`, `geoDone`, `geoError`, `geoCorrect`, `geoPoints`) VALUES
(1, 7, 110, 30, -70),
(2, 0, NULL, NULL, NULL),
(3, 0, NULL, NULL, NULL),
(4, 0, NULL, NULL, NULL),
(5, 0, NULL, NULL, NULL),
(6, 1, 9, 11, 37),
(7, 0, NULL, NULL, NULL),
(8, 0, NULL, NULL, NULL),
(9, 0, NULL, NULL, NULL),
(10, 0, NULL, NULL, NULL),
(11, 0, NULL, NULL, NULL),
(12, 0, NULL, NULL, NULL),
(13, 0, NULL, NULL, NULL),
(14, 0, NULL, NULL, NULL),
(15, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `questions`
--

CREATE TABLE `questions` (
  `idQ` int NOT NULL,
  `questionText` longtext NOT NULL,
  `correctAns` tinytext NOT NULL,
  `category` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `questions`
--

INSERT INTO `questions` (`idQ`, `questionText`, `correctAns`, `category`) VALUES
(1, 'Nel 1958 la Coppa del Mondo venne vinta dal brasile.', 'vero', 'sport'),
(2, 'Nel 1947 per la prima volta la coppa del mondo venne trasmessa in televisione.', 'falso', 'sport'),
(3, 'Al mondiale di calcio del 1930 parteciparono solo 13 squadre.', 'vero', 'sport'),
(4, 'Nel 1982 la finale Italia-Germania Ovest si concluse con il 3-1.', 'vero', 'sport'),
(5, 'I giorni totali in maglia rosa e gialla di Bartali furono 73.', 'vero', 'sport'),
(6, 'I giorni totali in maglia rosa e gialla di Bartali furono 73.', 'vero', 'sport'),
(7, 'Il Tour de France si volse la prima volta nel 1899 .', 'falso', 'sport'),
(8, 'Le prime competizioni ciclistiche si svolsero a Lione .', 'falso', 'sport'),
(9, 'Mrio Cipollini vinse 3 volte la Gand-Wevelgem.', 'vero', 'sport'),
(10, 'Pietro Mannea è stato campione nazionale nei 200 metri piani per ben 11 volte.', 'vero', 'sport'),
(11, 'Michel Platini non ricevetta mai il pallone d\'oro.', 'falso', 'sport'),
(12, 'L\'Inter ha partecipato a tutti i campionati di Serie A dalla sua fondazione.', 'vero', 'sport'),
(13, 'L\'associazione sportiva Roma venne fondata nel 1932.', 'falso', 'sport'),
(14, 'La prima squadra a ricevere il titolo di Campione d\'Italia fu il Genoa.', 'vero', 'sport'),
(15, 'Nel campionato di serie A giocano 25 squadre.', 'falso', 'sport'),
(16, 'A vincere i mondiali di calcio nel 2006 fu la francia.', 'falso', 'sport'),
(17, 'Max Biaggi ha corso per l\'Aprilia.', 'vero', 'sport'),
(18, 'l 17 ottobre 1975 fu giocata in messico la famosa partita Brasile-Nicaragua che fini 14-0.', 'vero', 'sport'),
(19, 'Nel 1930 si tenne la prima edizione dei mondiali di calcio.', 'vero', 'sport'),
(20, 'Nel 1926 si tenne la prima edizione dei mondiali di calcio.', 'falso', 'sport'),
(21, 'Maria Canins non ha mai praticato in maniera professionale il nuoto sincronizzato.', 'vero', 'sport'),
(22, 'Se mi trovo a Dordrecht sono in Olanda.', 'vero', 'geografia'),
(23, 'Se mi trovo ad Anversa sono in Belgio.', 'vero', 'geografia'),
(24, 'Se mi trovo a Strasburgo sono in Belgio.', 'falso', 'geografia'),
(25, 'Se mi trovo ad Hammamet sono in Tunisia.', 'vero', 'geografia'),
(26, 'Nichelino si trova in Piemonte.', 'vero', 'geografia'),
(27, 'Lugo si trova in Molise.', 'falso', 'geografia'),
(28, 'Lecce si trova in Puglia.', 'vero', 'geografia'),
(29, 'Torre Boldone si trova in Sicilia.', 'falso', 'geografia'),
(30, 'La torre di Pisa si trova in Toscana.', 'vero', 'geografia'),
(31, 'Barletta si trova in Sardegna.', 'falso', 'geografia'),
(32, 'Le Dolomiti si trovano in Piemonte.', 'falso', 'geografia'),
(33, 'Il Molise confina con le Marche.', 'falso', 'geografia'),
(34, 'L\'isola del Giglio ha una superficie di soli 24km quadrati.', 'vero', 'geografia'),
(35, 'La frazione di Contane, secondo l\'Istituto Geografico Militare, é il punto altimetricamente più basso d\'Italia(-3,44 s.l.m.).', 'vero', 'geografia'),
(36, 'La Sardegna è l\'isola italiana con il territorio più vasto.', 'falso', 'geografia'),
(37, 'San Paolo è la capitale del Brasile.', 'falso', 'geografia'),
(38, 'Brasilia non esiste.', 'falso', 'geografia'),
(39, 'Santiago del Cile è la capitale del Cile.', 'vero', 'geografia'),
(40, 'Quito è la capitale dell\'equador.', 'vero', 'geografia'),
(41, 'Kabul è la capitale dell\'Afghanistan.', 'vero', 'geografia'),
(42, 'Algeri è la capitale dell\'Algeria.', 'vero', 'geografia'),
(43, 'Tirana è la capitale dell\'Armenia.', 'falso', 'geografia'),
(44, 'L\'Angola è entrato nell\'ONU nel 1976.', 'vero', 'geografia'),
(45, 'Nella repubblica del Benin si parla Francese.', 'vero', 'geografia'),
(46, 'La lingua ufficiale del Cile è il Francese.', 'falso', 'geografia'),
(47, 'L\'Avana è la capitale di Cuba.', 'vero', 'geografia'),
(48, 'Nella repubblica Gabonese si parla spagnolo.', 'falso', 'geografia'),
(49, 'Rabat è la capitale del Marocco.', 'vero', 'geografia'),
(50, 'Maputo è la capitale del Mozambico.', 'vero', 'geografia'),
(51, 'La Repubblica di Naru è considerata la più piccola al mondo con circa 10 000 abitanti.', 'vero', 'geografia'),
(52, '27 sono gli stati che attualmente fanno parte dell\'Unione europea', 'vero', 'generale'),
(53, 'La parola “genetliaco” significa compleanno', 'vero', 'generale'),
(54, 'Joann Gutenberg è diventato famoso per aver interpretato la scrittura cuneiforme', 'falso', 'generale'),
(55, 'Il nome del celeberrimo cavallo di Alessandro Magno era Bucefalo', 'vero', 'generale'),
(56, 'I colori primari sono giallo rosso e verde', 'falso', 'generale'),
(57, 'La parola Tartan si riferisce ad un caratteristico tessuto', 'vero', 'generale'),
(58, 'Lo scirocco è un vento che proviene da Sud-ovest', 'falso', 'generale'),
(59, 'L\'aforisma “Colui che potendo esprimere un concetto in dieci parole ne usa dodici, io lo ritengo capace delle peggiori azioni” è stato pronunciato da Giosuè Carducci', 'vero', 'generale'),
(60, ' L’artista Frida Khalo era di nazionalità tedesca', 'falso', 'generale'),
(61, 'Taranto affaccia sul Mar Ionio', 'vero', 'generale'),
(62, 'Bari è la città più ad Est dell\'italia', 'vero', 'generale'),
(63, 'I capoluoghi di provincia della Toscana sono 7', 'falso', 'generale'),
(64, 'Si vis pacem, para bellum è un famoso proverbio latino', 'vero', 'generale'),
(65, 'Lecce è la citta natale di Benedetto Croce', 'falso', 'generale'),
(66, 'Dante nel V canto incontra Svevia', 'falso', 'generale'),
(67, 'L\'ultimo cavaliere è un romanzo di k. Follet', 'falso', 'generale'),
(68, 'Il dio greco Elios era il dio del sole', 'vero', 'generale'),
(69, 'La parola inglese throat significa gola', 'vero', 'generale'),
(70, 'Il trapassato remoto del verbo parlare è io ho parlato', 'falso', 'generale'),
(71, 'Buoi è il plurale di Bue', 'vero', 'generale'),
(72, 'il paese Filippine è membro della NATO ', 'falso', 'generale'),
(73, 'CECA significa Comunità Europea del Carbone e dell\'Acciaio', 'vero', 'generale'),
(74, 'La disciplina che si occupa delle questioni morali che sorgono in concomitanza della ricerca biologica e medica, viene definita Bioetica', 'vero', 'generale'),
(75, ' Il quotidiano \"Il Messaggero\" ha sede a Milano', 'falso', 'generale'),
(76, 'Un corpo rigido sospeso per un punto fisso qualsiasi rimane sempre immobile', 'falso', 'generale'),
(77, 'Il glicogeno è un carboidrato', 'vero', 'generale'),
(78, 'L\'adenina non è un costituente di un generico acido nucleico', 'falso', 'generale'),
(79, 'Le cellule germinali umane contengono 23 cromosomi', 'vero', 'generale'),
(80, 'Anna bolena era una cortigiana della corte di Maria Antonietta di Francia', 'falso', 'generale'),
(81, 'Le isole tremiti appartengono alla Puglia', 'vero', 'generale'),
(82, 'La penisola Kamcatka si trova in russia', 'vero', 'generale'),
(83, 'I colori della bandiera del madagascar sono bianco e blu', 'falso', 'generale'),
(84, 'Il petrolio è una fonte di energia non rinnovabile', 'vero', 'generale'),
(85, 'Sulmona è la città dei confetti', 'vero', 'generale'),
(86, 'Uno nessuno e centomila è stato scritto da Luigi Pirandello', 'vero', 'generale'),
(87, 'Afrodite era la dea della guerra', 'falso', 'generale'),
(88, 'L\'autore dei \"Quaderni del carcere\" è A. Gramsci', 'vero', 'generale'),
(89, 'Durante la strage di Piazza fontana nessuno perse la vita', 'falso', 'generale'),
(90, 'La strage di Piazza fontana accadde nell\'anno 1969', 'vero', 'generale'),
(91, 'Il presidente della repubblica detiene il comando delle forze armate', 'vero', 'generale'),
(92, 'L\'Albania è membro della Nato', 'vero', 'generale'),
(93, 'L\'apparato scheletrico può essere suddiviso in tre parti: testa, tronco e gambe', 'falso', 'generale'),
(94, 'Ulisse è il nome del re di Itaca che nell\'Illiade prese parte alla guerra di Troia', 'vero', 'generale'),
(95, 'In morte al fratello Giovanni fu scritta da Giosuè Carducci', 'falso', 'generale'),
(96, 'La madre fu scritta da Giosuè Carducci', 'vero', 'generale'),
(97, 'Lenin guidò la rivoluzione russa', 'vero', 'generale'),
(98, 'Putin guidò la rivoluzione russa', 'falso', 'generale'),
(99, 'La parafrasi consiste nella trasposizione dei versi in prosa', 'vero', 'generale'),
(100, 'Santa Lucia è il nome di una delle Caravelle di Colombo', 'falso', 'generale'),
(101, 'One Piece: La taglia di Rockstar in One Piece ammonta a 94 milioni di Berry', 'vero', 'anime'),
(102, 'One Piece: Alla sirene comincia a biforcarsi la coda verso i trent\'anni', 'vero', 'anime'),
(103, 'One Piece: Moby Dick è la nave principale di Barbabianca', 'vero', 'anime'),
(104, 'One Piece: Elliot è uno dei bambini tenuti a Punk Hazard', 'falso', 'anime'),
(105, 'One Piece: Van Der Decken XV viene affrontato da Rufy', 'falso', 'anime'),
(106, 'One Piece: Il Pacifista PX-4 viene sconfitto dai pirati di Rufy', 'vero', 'anime'),
(107, 'One Piece: Doma fu stato sconfitto da Ace prima di diventare alleato di Barbabianca', 'vero', 'anime'),
(108, 'One Piece: Woop Slap è un membro della ciurma di rufy', 'falso', 'anime'),
(109, 'One Piece: Brulèe, figlio di Charlotte Linlin possiede un frutto del diavolo legato al cibo', 'falso', 'anime'),
(110, 'One Piece: Grand\'Ammiraglio è il grado più alto raggiungibile in Marina', 'vero', 'anime'),
(111, 'One Piece: Leo ha mangiato un frutto del diavolo di tipo Paramisha', 'vero', 'anime'),
(112, 'One Piece: Non esistono stagioni su Cenessuno, isola di dell\'addestramento di due anni di Rufy', 'falso', 'anime'),
(113, 'One Piece: Esistono 48 stagioni su Cenessuno, isola dell\'addestramento di due anni di Rufy ', 'vero', 'anime'),
(114, 'One Piece: Il sogno di Barbabianca era avere una famiglia', 'vero', 'anime'),
(115, 'One Piece: Sanji si rifiuta di combattere contro Califa perche è una donna', 'vero', 'anime'),
(116, 'One Piece: L\'isola Reverse Mountain è un\'isola estiva', 'falso', 'anime'),
(117, 'One Piece: Shanks ha fatto gavetta sulla Oro Jackson, la nave di Gol D. Roger, il Re dei Pirati', 'vero', 'anime'),
(118, 'One Piece: Qunado  Emporio Ivankov cura Rufy a Impel Down, gli dice che perderà metà della sua vita rimanente', 'falso', 'anime'),
(119, 'One Piece: Rocket Man è il prototipo dei treni marini', 'vero', 'anime'),
(120, 'One Piece: Shanks perse il braccio sinistro per salvare la vita a Rufy', 'vero', 'anime'),
(121, 'One Piece: La Going Merry non ha ricevuto nessun funerale', 'falso', 'anime'),
(122, 'One Piece: Chopper viene spesso confuso per un procione nella sua forma ibrida', 'vero', 'anime'),
(123, 'One Piece: Kozuki Oden non usava alcuna spada in combattimento', 'falso', 'anime'),
(124, 'One Piece: La spada Emna venne impugnata da Kozuki Oden', 'vero', 'anime'),
(125, 'One Piece:  Nella ciurma di Do Flamingo, il trono di Cuori era quello riservato a Trafalgar Law', 'vero', 'anime'),
(126, 'One Piece: Kuzan (ex ammiraglio Aokiji) afferma di dovere un grande favore a Monkey D. Garp', 'vero', 'anime'),
(127, 'One Piece: Monkey D. Garp è soprannominato il magnifico', 'falso', 'anime'),
(128, 'One Piece: Monkey D. Garp è soprannominato l\'eroe perchè è stato in grado di respingere i Rocks', 'vero', 'anime'),
(129, 'One Piece: La Thousand Sunny è costruita con lo stesso tipo di legno della Oro Jackson', 'vero', 'anime'),
(130, 'Naruto: Gaara porta sulle spalle una giara', 'vero', 'anime'),
(131, 'Naruto: Naruto fa parte del gruppo 7', 'vero', 'anime'),
(132, 'Naruto: L\'organizzazione Alba fu fondata da Madara', 'falso', 'anime'),
(133, 'Naruto: Il ninja più potente è l\'eremita delle 6 vie', 'vero', 'anime'),
(134, 'Naruto: Tsunade era innamorata di Dan', 'vero', 'anime'),
(135, 'Naruto: Nagato possiede il rinnegan', 'vero', 'anime'),
(136, 'Naruto: Il Byakugan è una tecnica segreta', 'falso', 'anime'),
(137, 'Naruto: Il byakugan è un\'abilità innata appartenente al clan Hyuga', 'vero', 'anime'),
(138, 'Naruto: Minato era soprannominato Lampo Giallo della Foglia', 'vero', 'anime'),
(139, 'Naruto: Iruka è stato il primo maestro di Naruto', 'vero', 'anime'),
(140, 'Naruto: Il clan Uchiha è stato sterminato da Itachi Uchiha', 'vero', 'anime'),
(141, 'Naruto: Tsunade adora giocare d\'azzardo', 'vero', 'anime'),
(142, 'Naruto: Rock Lee è uno specialista nelle arti magiche', 'falso', 'anime'),
(143, 'Naruto: Suigetsu si impossessa della spada Tagliateste', 'vero', 'anime'),
(144, 'Naruto: Il padre di Kakashi è morto in missione', 'falso', 'anime'),
(145, 'Naruto: Kakashi, in quanto possessore dello Sharingan, fa parte del clan Uchiha', 'falso', 'anime'),
(146, 'Naruto: Lo Sharingan di Kakashi apparteneva ad Obito Uchiha', 'vero', 'anime'),
(147, 'Naruto: Kisame fa parte dell\'organizzazione Alba', 'vero', 'anime'),
(148, 'Naruto: Pain fu sconfitto da Jiraya', 'falso', 'anime'),
(149, 'Naruto: La volpe a nove code si chiama Kurama', 'vero', 'anime'),
(150, 'Naruto: Coscina è il nome della madre di Naruto', 'vero', 'anime'),
(151, 'Naruto: Naruto è il figlio del quarto Hokage', 'vero', 'anime'),
(152, 'Naruto: Il titolo di Hokage è stato creato da Hashirama Senju', 'vero', 'anime'),
(153, 'Naruto: Yamato è l\'unico a poter usare l\'arte del legno', 'vero', 'anime'),
(154, 'Naruto: Sasuke usa l\'arte dell\'acqua', 'falso', 'anime');

-- --------------------------------------------------------

--
-- Struttura della tabella `sport`
--

CREATE TABLE `sport` (
  `id` int NOT NULL,
  `sportDone` int DEFAULT NULL,
  `sportError` int DEFAULT NULL,
  `sportCorrect` int DEFAULT NULL,
  `sportPoints` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `sport`
--

INSERT INTO `sport` (`id`, `sportDone`, `sportError`, `sportCorrect`, `sportPoints`) VALUES
(1, 24, 382, 78, -374),
(2, 0, NULL, NULL, NULL),
(3, 0, NULL, NULL, NULL),
(4, 0, NULL, NULL, NULL),
(5, 0, NULL, NULL, NULL),
(6, 0, NULL, NULL, NULL),
(7, 0, NULL, NULL, NULL),
(8, 0, NULL, NULL, NULL),
(9, 0, NULL, NULL, NULL),
(10, 1, 4, 16, 72),
(11, 0, NULL, NULL, NULL),
(12, 0, NULL, NULL, NULL),
(13, 0, NULL, NULL, NULL),
(14, 0, NULL, NULL, NULL),
(15, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `idUsers` int NOT NULL,
  `username` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `totalPoints` int DEFAULT NULL,
  `quizDone` int DEFAULT NULL,
  `mediaPoints` float DEFAULT NULL,
  `risposteCorr` int DEFAULT NULL,
  `risposteErr` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`idUsers`, `username`, `emailUsers`, `pwdUsers`, `image`, `totalPoints`, `quizDone`, `mediaPoints`, `risposteCorr`, `risposteErr`) VALUES
(1, 'Samu636', 'samu220111@gmail.com', '$2y$10$8HWHrkD7Fje/CvYHBfUDQu/zpFRYs2zqON/cU5XS7KCROnRcGwCQa', 'rufy.png', 38209, 112, 341, 608, 1572),
(2, 'samu22', 'ciao@gmail.com', '$2y$10$k6hVRrVHJc79qw1NqagRx.1Sa0VGN65RpQf/9/nz73NGUdVNEHgru', NULL, 100, 1, 100, 20, 0),
(3, 'theLegend27', 'legend@ggmail.com', '$2y$10$ANXOiXiAo2MOsV1L8dEOf.ZRUR2d5lFSfKzpVXmyaNBEoiLAcY9RS', NULL, 100, 1, 100, 20, 0),
(4, 'sam', 'sam@gmail.com', '$2y$10$uPh3pzvullZ2nh49KciUAOEhWGZAZjs1fNIJcIrrAIBuY0mQ9P6X6', NULL, 23, 1, 23, 9, 11),
(5, 'Paolo', 'paolo@gmail.com', '$2y$10$5D.tvxjNMt9CrVehkGxeCuVWWbfxlU4Cv3cdbaEonHcoUXIZiL/jW', NULL, 44, 1, 44, 12, 8),
(6, 'Bee', 'bee@gmail.com', '$2y$10$TN97p98NH4unNOXzZUE/UOyd9NXs3bLvotzitiwU2JFCNmPWXR5lu', NULL, 37, 1, 37, 11, 9),
(7, 'gerry', 'gerry@gmail.com', '$2y$10$R.HNnPBbOH.Zc0J96q4xn.9mMdSl2eub0xTGyMo0H5BnEAOMVO.z.', NULL, 51, 1, 51, 13, 7),
(8, 'Link', 'link@gmail.com', '$2y$10$yY1DySpk.HquJ2vHsLgqBeJImPrwkIQ/XGk5cmHlFWnrNvjOLmhC.', NULL, 44, 1, 44, 12, 8),
(9, 'Kiln', 'kiln@gmail.com', '$2y$10$H.yIukBgTAbmyIF/7D9AOOEOuX26JDVnYZ4XzpwNTVZC1MKBMR3zm', NULL, 23, 1, 23, 9, 11),
(10, 'AshenOne', 'ashenOne@gmail.com', '$2y$10$zx.51D6yXHx/AbEcBXEo4e9UDHSEg6n4nk5dBgXin/Ok7.uFpmA.u', NULL, 72, 1, 72, 16, 4),
(11, 'Hello', 'hello@gmail.com', '$2y$10$DO4p5GSQoT9CdNCIcXXMWe//rxGLZAh9DcNTsgK.LxXFA3X9jKAgS', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'ciao22', 'samu220111@gmail.com', '$2y$10$sbA0Fz8CUzIPw.3d0i0FPeprjGokAbKNZlWKkfUTEmHSTGPHn5TR.', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'qwwqwqwqwwqq', 'samu220111@gmail.com', '$2y$10$7xamMW/6tfN0UOTpqha4q.wNmKq4VIKxSfUA4gGw5C7Ct.yf2VBWG', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'samuel33', 'samu220111@gmail.com', '$2y$10$7EOzSM6g7oOUXCu6Ll1KIOe/nX2qxTx6ebbnaqAY.6uLJM36efRIi', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Samu6364444', 'samu220111@gmail.com', '$2y$10$x83fW9uEl3G0xg5ApiWO/Ob3IACqKFblogwRAv5qnRSsAI2A9zYia', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `correctAns`
--
ALTER TABLE `correctAns`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `generale`
--
ALTER TABLE `generale`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `geografia`
--
ALTER TABLE `geografia`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`idQ`);

--
-- Indici per le tabelle `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `correctAns`
--
ALTER TABLE `correctAns`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `generale`
--
ALTER TABLE `generale`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `geografia`
--
ALTER TABLE `geografia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `questions`
--
ALTER TABLE `questions`
  MODIFY `idQ` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT per la tabella `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
