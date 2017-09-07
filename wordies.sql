-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2017 at 03:15 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wordies`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_desc` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_desc`) VALUES
(1, 'Poetry', '<p>This is often considered the oldest form of literature. Before writing was invented, oral stories were commonly put into some sort of poetic form to make them easier to remember and recite. Poetry today is usually written down, but is still sometimes performed.\r\n\r\n<p>A lot of people think of rhymes and counting syllables and lines when they think of poetry, and some poems certainly follow strict forms. But other types of poetry are so free-form that they lack any rhymes or common patterns. There are even kinds of poetry that cross genre lines, such as prose poetry. In general, though, a text is a poem when it has some sort of meter or rhythm, and when it focuses on the way the syllables, words, and phrases sound when put together. Poems are heavy in imagery and metaphor, and are often made up of fragments and phrases rather than complete, grammatically correct sentences. And poetry is nearly always written in stanzas and lines, creating a unique look on the page.\r\n\r\n<p>Poetry as experienced in the classroom is usually one of three types. There are the shorter, more modern poems, spanning anything from a few lines to a few pages. Often these are collected in books of poems by a single author or by a variety of writers. Edgar Allen Poe’s “The Raven," is one of the most commonly taught poems of this type. Then there are the classical, formulaic poems of Shakespeare’s time, such as the blank verse and the sonnet. And finally there are the ancient, epic poems transcribed from oral stories. These long, complex poems resemble novels, such as Homer’s The Iliad and The Odyssey.'),
(2, 'Prose', '<p>Once you know what poetry is, it’s easy to define prose. Prose can be defined as any kind of written text that isn’t poetry (which means drama, discussed below, is technically a type of prose). The most typical varieties of prose are novels and short stories, while other types include letters, diaries, journals, and non-fiction (also discussed below). Prose is written in complete sentences and organized in paragraphs. Instead of focusing on sound, which is what poetry does, prose tends to focus on plot and characters.\r\n\r\n<p>Prose is the type of literature read most often in English classrooms. Any novel or short story falls into this category, from Jane Eyre to Twilight and from “A Sound of Thunder" to “The Crucible." Like poetry, prose is broken down into a large number of other sub-genres. Some of these genres revolve around the structure of the text, such as novellas, biographies, and memoirs, and others are based on the subject matter, like romances, fantasies, and mysteries.'),
(3, 'Drama', '<p>Any text meant to be performed rather than read can be considered drama (unless it’s a poem meant to be performed, of course). In layman’s terms, dramas are usually called plays. When written down the bulk of a drama is dialogue, with periodic stage directions such as “he looks away angrily." Of all the genres of literature discussed in this article, drama is the one given the least time in most classrooms. And often when drama is taught, it’s only read the same way you might read a novel. Since dramas are meant to be acted out in front of an audience, it’s hard to fully appreciate them when looking only at pages of text. Students respond best to dramas, and grasp their mechanics more fully, when exposed to film or theater versions or encouraged to read aloud or act out scenes during class.\r\n\r\n<p>The dramas most commonly taught in classrooms are definitely those written by the bard. Shakespeare’s plays are challenging, but rewarding when approached with a little effort and a critical mindset. Popular choices from his repertoire include Hamlet, Taming of the Shrew, and Romeo and Juliet, among others. Older Greek plays are also taught fairly often, especially Sophocles’ Antigone. And any good drama unit should include more modern plays for comparison, such as Arthur Miller’s Death of a Salesman.'),
(4, 'Fanfiction', '<p>Fan fiction or fanfiction (also abbreviated to fan fic, fanfic, or fic) is fiction about characters or settings from an original work of fiction, created by fans of that work rather than by its creator. It is a popular form of fan labor, particularly since the advent of the Internet.\r\n\r\n<p>Fan fiction is rarely commissioned or authorized by the original work''s creator or publisher, and is rarely professionally published. It may or may not infringe on the original author''s copyright, depending on the jurisdiction and on such questions as whether or not it qualifies as "fair use" (see Legal issues with fan fiction). Attitudes of authors and copyright owners of original works to fan fiction have ranged from indifference to encouragement to rejection. Copyright owners have occasionally responded with legal action.\r\n\r\n<p>Fan fiction is defined by being both related to its subject''s canonical fictional universe (often referred to as "canon") and simultaneously existing outside it. Most fan fiction writers assume that their work is read primarily by other fans, and therefore presume that their readers have knowledge of the canon universe (created by a professional writer) in which their works are based.'),
(5, 'Non-Fiction', '<p>Poetry and drama both belong to the broader category of fiction—texts that feature events and characters that have been made up. Then there is non-fiction, a vast category that is a type of prose and includes many different sub-genres. Non-fiction can be creative, such as the personal essay, or factual, such as the scientific paper. Sometimes the purpose of non-fiction is to tell a story (hence the autobiography), but most of the time the purpose is to pass on information and educate the reader about certain facts, ideas, and/or issues.\r\n\r\n<p>Some genres of non-fiction include histories, textbooks, travel books, newspapers, self-help books, and literary criticism. A full list of non-fiction types would be at least as long as this entire article. But the varieties most often used in the classroom are textbooks, literary criticism, and essays of various sorts. Most of what students practice writing in the classroom is the non-fiction essay, from factual to personal to persuasive. And non-fiction is often used to support and expand students’ understanding of fiction texts—after reading Hamlet students might read critical articles about the play and historical information about the time period and/or the life of Shakespeare.');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `story_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_up` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `view_count` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `content`, `story_id`, `created`, `updated`, `user_up`, `status`, `view_count`) VALUES
(1, 'Prologue', 'The End Of Everything', 1, '2017-09-06 19:06:40', '2017-09-07 19:28:45', 1, 1, 0),
(2, 'The Wind That Blows Me Towards You', '', 1, '2017-09-07 15:56:17', '2017-09-07 15:56:17', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE IF NOT EXISTS `characters` (
`id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `physical` text,
  `personality` text,
  `background` text NOT NULL,
  `face` text,
  `other` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_up` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `story_id`, `name`, `gender`, `age`, `physical`, `personality`, `background`, `face`, `other`, `created`, `updated`, `user_up`) VALUES
(1, 1, 'Lee Hyeon', NULL, NULL, NULL, NULL, '', NULL, NULL, '2017-09-06 19:11:07', '2017-09-06 19:11:07', 1),
(2, 1, 'Heo Yeonhwa', NULL, NULL, NULL, NULL, '', NULL, NULL, '2017-09-07 15:56:36', '2017-09-07 15:56:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `character_relations`
--

CREATE TABLE IF NOT EXISTS `character_relations` (
`id` int(11) NOT NULL,
  `char1` int(11) NOT NULL,
  `char2` int(11) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_session`
--

CREATE TABLE IF NOT EXISTS `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_session`
--

INSERT INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('08m7akt4shfpntc0bdef8lv7qcm7qo2m', '::1', 1504785266, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738343937363b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('0r34q6kih93f14m6l1q28721epf6b46u', '::1', 1504774626, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343737343534313b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('1kp95b4snks9gsslnd7tio05hdap28l9', '::1', 1504693397, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639333339343b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034313631323138223b6c6173745f636865636b7c693a313530343639333036393b),
('1l2bl6ntlv18jiri8fm7h0aql21110ms', '::1', 1504776758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343737363733373b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('3rnji5jbtreuuq8l6gud483qr6lptrf1', '::1', 1504788561, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738383433303b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('3vavrcceu47i568rpoljmm5c7pcitppa', '::1', 1504784100, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738333835303b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('4o025sgip9758t1bo7sihv8cv8h0srl3', '::1', 1504784766, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738343337303b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('4si1c1qads62nt27e716jf4si0nus3nr', '::1', 1504786694, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738363639313b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('7age71k0op1g8j90ncp7anctqlqhcnkt', '::1', 1504782343, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738323036353b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('7idgi3u8d5prvo681cl2ef2ld77cf8rv', '::1', 1504785947, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738353634353b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('8aojbm4fpgs3elevutfjpn97usgu7kv9', '::1', 1504688943, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343638383638333b),
('8cpvme6q467l79vlc0n1db9rmnth167r', '::1', 1504789409, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738393134353b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('blilusidrh89ibhk9tsb9hir5c1k3h1p', '::1', 1504777333, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343737373132353b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('bmcblgf0m5n39es02muokemvi4chn70t', '::1', 1504780015, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343737393833383b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('csu0tb6drk6mrnr8kbu0h7vlt63te88b', '::1', 1504785630, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738353239323b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('dedjuen6n3fpu0hp302bc5hgj663492q', '::1', 1504786479, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738363134303b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('dg4hdpj2l150umemf74k4jssibacgpb5', '::1', 1504773544, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343737333532323b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('e0lfo5ec444hqfnhapc1f69sq8p3pjec', '::1', 1504781528, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738313237323b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('e3ihakd8b91ge1uvjo6b5qtvi9829ns8', '::1', 1504694139, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639343036393b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034313631323138223b6c6173745f636865636b7c693a313530343639333036393b),
('eesvnpjb2kkvsqjmljg6gv24ddophq2o', '::1', 1504699868, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639393538333b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034313631323138223b6c6173745f636865636b7c693a313530343639333036393b),
('f0m6nh9mo9t6cd5cs7gaj11o251bbv0q', '::1', 1504688318, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343638383034363b),
('fqk5q8iai0r6o88i3vkrcole7b81oa9e', '::1', 1504691771, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639313532313b),
('g3rngme57s6q6auo0js121e26neae4go', '::1', 1504787845, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738373834313b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('ghidds7o711gvn1upbq5s7v4hnjk1mgt', '::1', 1504698926, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639383638343b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034313631323138223b6c6173745f636865636b7c693a313530343639333036393b),
('gt17jc8ir5p6b98dlrt181upci1ci4qf', '::1', 1504688675, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343638383337373b),
('hibm7inimru1ba6rkhv1l3buhdgbqnmo', '::1', 1504776177, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343737363037323b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('ho64o438ngos1kucvhl9ohq3gjoqoq8b', '::1', 1504781915, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738313636323b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('ibl9chp6cnv8ig1lpv9gl9n0betf0qp9', '::1', 1504687428, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343638373334383b),
('im5qh3t10e1abt80u908hns2lvqt3tgq', '::1', 1504690945, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639303739303b),
('luvd0jm4peqb4s0athks3n0ia3rcdvu4', '::1', 1504691495, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639313230353b),
('mor1c802a5usjph9h8i47lc96973e77m', '::1', 1504694695, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639343432373b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034313631323138223b6c6173745f636865636b7c693a313530343639333036393b),
('mttcu1i14thiv4p3i0f65lt0c19rpltm', '::1', 1504787329, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738373138313b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('ncivq4gvk9bmsnd2j4mv8pvl9smm2rdv', '::1', 1504689294, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343638383939373b),
('ng9uudfkdtkusejdgf8l05m8rlk3sgs7', '::1', 1504775759, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343737353530393b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('nhmtg6gk0ohk1q4lmkqrkcgct5c8f0ka', '::1', 1504697019, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639363830373b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034313631323138223b6c6173745f636865636b7c693a313530343639333036393b),
('noaq8slhjd9mj4h1q1kfiatiatl8u384', '::1', 1504782791, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738323738373b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('plppqf2kdk93gbuhopo1cp9i0ugvrubv', '::1', 1504687985, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343638373733323b),
('r47et0n49nkmb2i6knr5pgo647qihneb', '::1', 1504700846, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343730303537363b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034313631323138223b6c6173745f636865636b7c693a313530343639333036393b),
('rfva55ijij1mf0lso19i9ru0kl6fqmbn', '::1', 1504689564, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343638393336373b),
('sj8ufprptfcou84gu2p159033j6k6qur', '::1', 1504694049, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639333736373b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034313631323138223b6c6173745f636865636b7c693a313530343639333036393b),
('stpnjtq7vtartk56liai0s1mn4g4hc3f', '::1', 1504780612, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738303335333b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('tn522rijr3prj38fci73bpj3rh7v90lk', '::1', 1504693302, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639333035393b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034313631323138223b6c6173745f636865636b7c693a313530343639333036393b),
('u0nvb98ngtcr9q3d1632nmjjt6njsou3', '::1', 1504698137, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639373934313b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034313631323138223b6c6173745f636865636b7c693a313530343639333036393b),
('u4cl5t7ijo34o61msijcbcf4qavbor4u', '::1', 1504789066, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343738383834333b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034363933303639223b6c6173745f636865636b7c693a313530343737333532323b),
('ujisavqsbo727vh81sgn2762sdiut0bt', '::1', 1504691899, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639313833313b),
('ur5i9bl4orvsf8kihsmllaqad8o1chl1', '::1', 1504698475, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530343639383331353b6964656e746974797c733a31333a2261646d696e6973747261746f72223b757365726e616d657c733a31333a2261646d696e6973747261746f72223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353034313631323138223b6c6173745f636865636b7c693a313530343639333036393b);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chapter_id` varchar(20) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_up` int(11) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(100) NOT NULL,
  `genre_exp` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `genre_name`, `genre_exp`) VALUES
(1, 'Action', NULL),
(2, 'Adventure', NULL),
(3, 'Angst', NULL),
(4, 'Crime', NULL),
(5, 'Drama', NULL),
(6, 'Family', NULL),
(7, 'Fantasy', NULL),
(8, 'Friendship', NULL),
(9, 'General', NULL),
(10, 'Horror', NULL),
(11, 'Humor', NULL),
(12, 'Hurt/Comfort', NULL),
(13, 'Mystery', NULL),
(14, 'Parody', NULL),
(15, 'Romance', NULL),
(16, 'Science Fiction', NULL),
(17, 'Spritual', NULL),
(18, 'Supernatural', NULL),
(19, 'Suspense', NULL),
(20, 'Tragedy', NULL),
(21, 'Western', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messages_header`
--

CREATE TABLE IF NOT EXISTS `messages_header` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sender` int(11) NOT NULL,
  `date_send` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_logs`
--

CREATE TABLE IF NOT EXISTS `message_logs` (
`id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_mapping`
--

CREATE TABLE IF NOT EXISTS `message_mapping` (
`id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `message_replies`
--

CREATE TABLE IF NOT EXISTS `message_replies` (
`id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `reply` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
`id` int(11) NOT NULL,
  `message` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0',
  `target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `rating_id` int(11) NOT NULL,
  `rating_name` varchar(100) NOT NULL,
  `rating_explanation` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `rating_name`, `rating_explanation`) VALUES
(1, 'K', 'Intended for general audience 5 years and older. Content should be free of any coarse language, violence, and adult themes.'),
(2, 'K+', 'Suitable for more mature childen, 9 years and older, with minor action violence without serious injury. May contain mild coarse language. Should not contain any adult themes.'),
(3, 'T', 'Suitable for teens, 13 years and older, with some violence, minor coarse language, and minor suggestive adult themes.'),
(4, 'M', 'Not suitable for children or teens below the age of 16 with non-explicit suggestive adult themes, references to some violence, or coarse language. Fiction M can contain adult language, themes and suggestions.'),
(5, 'MA', 'Not suitable for children or teens below the age of 16 with non-explicit suggestive adult themes, references to some violence, or coarse language. Fiction M can contain adult language, themes and suggestions. Detailed descriptions of physical interaction of sexual or violent nature is considered Fiction MA.');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `story_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `name`, `link`, `description`, `story_id`) VALUES
(1, 'Raon''s Song', 'https://www.youtube.com/watch?v=JvzHwH-YHj8', 'Lee Haeri- But', 1),
(2, 'Yeonhwa''s Song', 'https://www.youtube.com/watch?v=ax8qbOSZfcE', 'Chae Soobin - That''s Love', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
`id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `content` text NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `words_count` int(11) NOT NULL,
  `characters` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_up` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `desc`, `content`, `chapter_id`, `words_count`, `characters`, `created`, `updated`, `user_up`) VALUES
(1, 'Prologue', '<p data-p-id="bdb222dd1029f1796c0cf15689d0a5f2">Pemuda itu menatap ke bawah, melihat dataran yang akan menjadi tempatnya terjatuh jika ia melangkahkan kaki satu langkah saja ke depan. Tebing yang kini tengah ia pijaki mungkin akan menjadi saksi bagaimana hidupnya berakhir. Mungkin tak akan ada orang yang akan menemukan tubuhnya di tempat ini—ia tak berharap, tak berdoa untuk itu. Meski pun ia berputar balik, ia tak tahu kemana ia harus pergi, tak memiliki tujuan apa pun setelah kehilangan segalanya. Rasanya, ia tak memiliki tujuan apa pun lagi.<br></p><p data-p-id="627fbaa89b7ab25c4ff3c74c434343f1">Rintik-rintik hujan mulai mengenai tubuhnya, pertanda bahwa hujan akan mulai menemaninya. Ia mengulurkan tangannya, menikmati air yang semakin deras membasahi tangannya. Ia perlahan mengingat perkataan yang pernah diucap padanya, "Aku ingin saat aku mati nanti, hujan akan turun. Setidaknya, meski tak ada orang yang menangisi kepergianku, langit akan menangisiku."</p><p data-p-id="115c669c01c6dbab3afa5c46ea09e910">Apakah itu juga berlaku baginya? Tak akan ada yang menangisi kepergiannya, tak seorang pun. Mungkin karena itu, kini hujan turun dengan deras—agar ia merasa bahwa setidaknya ada yang menangisinya. Meski begitu ia tak akan meminta siapapun menangisinya, setelah banyak dosa yang dilakukannya, ia tak pantas menerima belas kasihan atau pun kasih sayang dari siapa pun.</p><p data-p-id="10193709b4c75234e6f41deb5643c943">Ia mendadak merasa rindu pada orang tercintanya, orang yang telah pergi meninggalkannya terlebih dahulu. Ia tak tahu apakah jika ia menyusulnya, ia akan dapat bertemu dengannya lagi. Namun ia ingin mencoba—mungkin, suatu hari nanti, ia akan mendapatkan kesempatan untuk mengulang kehidupannya lagi dan memperbaiki segalanya. Perlahan, ia semakin yakin dengan pilihannya. Dengan air mata yang terus mengalir dari kedua matanya, ia menutup mata dan melangkahkan kaki.</p>', 2, 247, 'Lee Hyeon, ', '0000-00-00 00:00:00', '2017-09-07 19:05:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `share_mapping`
--

CREATE TABLE IF NOT EXISTS `share_mapping` (
  `id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `share_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE IF NOT EXISTS `stories` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text,
  `cover` varchar(255) DEFAULT NULL,
  `rating_id` int(11) DEFAULT NULL,
  `genre_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT '1',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_up` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `desc`, `cover`, `rating_id`, `genre_id`, `type_id`, `author_id`, `status_id`, `created`, `updated`, `user_up`) VALUES
(1, 'When The Cold Wind Blows', 'Lee Hyeon membenci posisinya sebagai putra mahkota dan ingin hidup beban tanpa memikul beban akan posisinya sebagai seorang penerus tahta kerajaan. Ia tak menduga bahwa keinginannya akan terwujud, tak pula menduga bahwa ketika ia kehilangan posisinya, ia akan perlahan menginginkannya kembali.', NULL, 3, 15, 2, 1, 0, '2017-09-06 18:23:39', '2017-09-06 18:23:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
`id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `story_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
`id` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tag_mapping`
--

CREATE TABLE IF NOT EXISTS `tag_mapping` (
`id` int(11) NOT NULL,
  `story_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `twitter`, `facebook`, `profile_image`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, 'Yx0wpjtDQjXPENBklrI/u.', 1268889823, 1504773522, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
`id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `story_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `character_relations`
--
ALTER TABLE `character_relations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_session`
--
ALTER TABLE `ci_session`
 ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages_header`
--
ALTER TABLE `messages_header`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_logs`
--
ALTER TABLE `message_logs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_mapping`
--
ALTER TABLE `message_mapping`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_replies`
--
ALTER TABLE `message_replies`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_mapping`
--
ALTER TABLE `tag_mapping`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `character_relations`
--
ALTER TABLE `character_relations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages_header`
--
ALTER TABLE `messages_header`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message_logs`
--
ALTER TABLE `message_logs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message_mapping`
--
ALTER TABLE `message_mapping`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message_replies`
--
ALTER TABLE `message_replies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag_mapping`
--
ALTER TABLE `tag_mapping`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
