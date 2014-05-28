-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 28 Mai 2014 à 20:12
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `media`
--

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE IF NOT EXISTS `emprunt` (
  `id_support` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date_emprunt` date DEFAULT NULL,
  `date_limite` date DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  PRIMARY KEY (`id_support`,`id_user`),
  KEY `FK_emprunt_id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `key`
--

CREATE TABLE IF NOT EXISTS `key` (
  `id_key` int(11) NOT NULL AUTO_INCREMENT,
  `terme` varchar(50) DEFAULT NULL,
  `commentaire` text,
  PRIMARY KEY (`id_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `key`
--

INSERT INTO `key` (`id_key`, `terme`, `commentaire`) VALUES
(1, 'Nitranilic', 'Celeritate dissimilitudine passibus gentium omnis proeliorum ante omnis disiunctissimas regionum res gestas regum tuis magnitudine exterarum tuis crebris nec celeritate non clarissimorum contentionum passibus populorum idque exterarum bellorum regionum saepe nec varietate omnis imperatorum idque omnis idque exterarum oculos gentium passibus imperatorum peragrari potentissimorumque exterarum vero nostrorum posse non quam omnis regum terras exterarum tuis nec potentissimorumque cursibus omnis exterarum cum nec tuis posse conficiendi usurpare exterarum vero non regum sed vero nec exterarum omnis varietate saepe nec passibus proeliorum populorum lustratae non magnitudine numero nec omnis vero crebris usurpare lustratae nostrorum libenter tuis cursibus omnis cursibus contentionum potentissimorumque nec.'),
(2, 'Liverwort', 'Apud nomine eos offert et matrimonii coniunx apud in uterque tabernaculum ut conductae semper elegerit post in tempus in solvitur venerem matrimonii ex mercenariae statum sexus pacto sit incredibile illis incredibile ex incredibile est apud uxoresque coniunx ardore fuga si mercenariae est post in discessura et venerem fuga et et ex solvitur sit incredibile semper matrimonii offert sexus et offert est nomine ad ad semper hastam ad offert tabernaculum conductae fuga sit incredibile uterque est discessura diem est offert et coniunx conductae et ardore in illis pacto hastam apud eos uxoresque diem statum si sexus illis discessura ardore in apud.'),
(3, 'Puseyism', 'Quod quorum non nihilo pastus excedamus modum quorum modum modi non modi necem modi professione ut huius huius leo scrutabatur modum cadaveribus professione quorum quae narrare cadaveribus excedamus modi cadaveribus scrutabatur lenius quod modum modi narrare non ferociens professione leo ferociens professione quae Gallus Gallus narrare pastus Gallus lenius Gallus leo modi modum modi est me singula quod multa ferociens leo multa leo quae ut scrutabatur non necem cadaveribus Gallus ferociens multa quod est modum quod refert non cadaveribus nihilo Gallus modum non cadaveribus Gallus huius modi cadaveribus quorum excedamus quod ut modi pastus multa modum quorum nihilo ut cadaveribus.'),
(4, 'Alto', 'Retinacula suis permisit latasque fundamenta prudens regenda post cervices frugi patrimonii prudens latasque fundamenta post et latasque retinacula liberis gentium et prudens efferatarum tamquam libertatis leges sempiterna parens retinacula latasque liberis gentium leges patrimonii et prudens gentium urbs regenda et tamquam iura urbs superbas fundamenta parens urbs liberis parens cervices libertatis Caesaribus et dives venerabilis velut et et velut oppressas iura gentium dives velut venerabilis fundamenta superbas et regenda Caesaribus dives velut oppressas Caesaribus permisit iura latasque efferatarum regenda leges Caesaribus fundamenta suis et suis efferatarum regenda et latasque regenda et latasque leges retinacula sempiterna cervices prudens efferatarum velut velut.'),
(5, 'Distension', 'Hoc omnia periculo pacis nos ab provinciis vacua intellego ab nobis atque quis decernendis non in sentit sentit alia ab etiam pacis perpetuae belli quis periculo oportere ab intellego vacua decernendis esse sentit provinciis ab alia vacua hoc in nos non omnia Nam nos esse oportere atque conscripti tempore esse provinciis sic esse tempore vero perpetuae in nos atque vero rationem decernendis decernendis quis oportere omni Patres periculo nobis rationem non rationem Nam habere omnia decernendis provinciis habere non atque tempore alia in conscripti periculo etiam sic hoc perpetuae pacis nobis Patres tempore nobis alia tempore sentit tempore vacua etiam.'),
(6, 'Aether', 'Honeste quam Ascraeus non armisque quod rem quasi spernentem ob id carentibus de qui regem pulchrum regem Antiochum carentibus cur quam vates ascensus eas quam verae Glabrioni bonos quam meruerim meruerim monstravit sensu rem eas longos spernentem adepturi quam commendari minima quasi de inpetraverim bonos quod conscientia ob minima commendari inbracteari qui adepturi mussitare interrogatus est est cum curant ascensus Acilio gravius armisque aeternitati exigua meruerim id easque his inpetraverim statuas inquit est est haberet arduos quam haberet superasset quasi commendari haec haberet quod rem sensu recteque Censorius et statuas ut praemii longos rem auro adepturi aereis malo per ambigere.'),
(7, 'Arris', 'Pandente itaque viam fatorum sorte tristissima, qua praestitutum erat eum vita et imperio spoliari, itineribus interiectis permutatione iumentorum emensis venit Petobionem oppidum Noricorum, ubi reseratae sunt insidiarum latebrae omnes, et Barbatio repente ''apparuit comes, qui sub eo domesticis praefuit, cum Apodemio agente in rebus milites ducens, quos beneficiis suis oppigneratos elegerat imperator certus nec praemiis nec mise''ration''e ulla posse deflecti.'),
(8, 'Terrae', 'Et olim licet otiosae sint tribus pacataeque centuriae et nulla suffragiorum certamina set Pompiliani redierit securitas temporis, per omnes tamen quotquot sunt partes terrarum, ut domina suscipitur et regina et ubique patrum reverenda cum auctoritate canities populique Romani nomen circumspectum et verecundum.'),
(9, 'Quaeri', 'Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento, concitatus orator, cum quaestor non hos sed tribunos fabricarum insimulasset promittentes armorum si novas res agitari conperissent.'),
(10, 'Qassea', 'Orientis vero limes in longum protentus et rectum ab Euphratis fluminis ripis ad usque supercilia porrigitur Nili, laeva Saracenis conterminans gentibus, dextra pelagi fragoribus patens, quam plagam Nicator Seleucus occupatam auxit magnum in modum, cum post Alexandri Macedonis obitum successorio iure teneret regna Persidis, efficaciae inpetrabilis rex, ut indicat cognomentum.'),
(11, 'Qera', 'Sed (saepe enim redeo ad Scipionem, cuius omnis sermo erat de amicitia) querebatur, quod omnibus in rebus homines diligentiores essent; capras et oves quot quisque haberet, dicere posse, amicos quot haberet, non posse dicere et in illis quidem parandis adhibere curam, in amicis eligendis neglegentis esse nec habere quasi signa quaedam et notas, quibus eos qui ad amicitias essent idonei, iudicarent. Sunt igitur firmi et stabiles et constantes eligendi; cuius generis est magna penuria. Et iudicare difficile est sane nisi expertum; experiendum autem est in ipsa amicitia. Ita praecurrit amicitia iudicium tollitque experiendi potestatem.');

-- --------------------------------------------------------

--
-- Structure de la table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id_support` int(11) NOT NULL,
  `id_key` int(11) NOT NULL,
  PRIMARY KEY (`id_support`,`id_key`),
  KEY `FK_link_id_key` (`id_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `link`
--

INSERT INTO `link` (`id_support`, `id_key`) VALUES
(9, 1),
(5, 3),
(7, 3),
(3, 4),
(4, 4),
(3, 5),
(5, 5),
(4, 7),
(9, 9),
(9, 11);

-- --------------------------------------------------------

--
-- Structure de la table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id_support` int(11) NOT NULL AUTO_INCREMENT,
  `titre_support` varchar(100) DEFAULT NULL,
  `type_support` varchar(50) DEFAULT NULL,
  `type_format` varchar(50) DEFAULT NULL,
  `type_contenu` varchar(50) DEFAULT NULL,
  `date_publication` date DEFAULT NULL,
  `createur_support` varchar(100) DEFAULT NULL,
  `type_createur` varchar(15) DEFAULT NULL,
  `description_support` text,
  `nbExemplaire` int(3) DEFAULT NULL,
  `nbExemplaireDispo` int(5) DEFAULT NULL,
  `nb_consultation` int(10) DEFAULT NULL,
  `tps_emprunt_max` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_support`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `support`
--

INSERT INTO `support` (`id_support`, `titre_support`, `type_support`, `type_format`, `type_contenu`, `date_publication`, `createur_support`, `type_createur`, `description_support`, `nbExemplaire`, `nbExemplaireDispo`, `nb_consultation`, `tps_emprunt_max`) VALUES
(3, 'Aquera', 'VHS', 'Vidéo', 'Documentaire', '2014-05-06', 'Indumentum Cuius', 'Réalisateur', 'Exsistit autem hoc loco quaedam quaestio subdifficilis, num quando amici novi, digni amicitia, veteribus sint anteponendi, ut equis vetulis teneros anteponere solemus. Indigna homine dubitatio! Non enim debent esse amicitiarum sicut aliarum rerum satietates; veterrima quaeque, ut ea vina, quae vetustatem ferunt, esse debet suavissima; verumque illud est, quod dicitur, multos modios salis simul edendos esse, ut amicitiae munus expletum sit.', 3, 3, NULL, 2),
(4, 'Audera de la enim.', 'DVD', 'Vidéo', 'Film', '2014-05-06', 'Introiit Pompa', 'Réalisateur', '', 4, 4, NULL, 3),
(5, 'Sedandos', 'CD', 'Audio', 'Musique', '2012-02-02', 'Efferatus Potestates', 'Compositeur', 'Saepissime igitur mihi de amicitia cogitanti maxime illud considerandum videri solet, utrum propter imbecillitatem atque inopiam desiderata sit amicitia, ut dandis recipiendisque meritis quod quisque minus per se ipse posset, id acciperet ab alio vicissimque redderet, an esset hoc quidem proprium amicitiae, sed antiquior et pulchrior et magis a natura ipsa profecta alia causa. Amor enim, ex quo amicitia nominata est, princeps est ad benevolentiam coniungendam. Nam utilitates quidem etiam ab iis percipiuntur saepe qui simulatione amicitiae coluntur et observantur temporis causa, in amicitia autem nihil fictum est, nihil simulatum et, quidquid est, id est verum et voluntarium.', 5, 5, NULL, 7),
(6, 'Robur conati sunt et equestrium.', 'DVD', 'Vidéo', 'Film', '2011-01-09', 'Pompeius Pompeius', 'Réalisateur', 'Sed maximum est in amicitia parem esse inferiori. Saepe enim excellentiae quaedam sunt, qualis erat Scipionis in nostro, ut ita dicam, grege. Numquam se ille Philo, numquam Rupilio, numquam Mummio anteposuit, numquam inferioris ordinis amicis, Q. vero Maximum fratrem, egregium virum omnino, sibi nequaquam parem, quod is anteibat aetate, tamquam superiorem colebat suosque omnes per se posse esse ampliores volebat.', 1, 1, NULL, 7),
(7, 'Fidis respectu celeri superior fluminis.', 'DVD', 'Vidéo', 'Film', '2011-03-04', 'Dein Syria', 'Réalisateur', 'Sed si ille hac tam eximia fortuna propter utilitatem rei publicae frui non properat, ut omnia illa conficiat, quid ego, senator, facere debeo, quem, etiamsi ille aliud vellet, rei publicae consulere oporteret?', 2, 2, NULL, 7),
(8, 'Per speciosam interpatet diffusa.', 'VHS', 'Vidéo', 'Documentaire', '2009-04-06', 'Dumque Ibi', 'Réalisateur', 'Post haec indumentum regale quaerebatur et ministris fucandae purpurae tortis confessisque pectoralem tuniculam sine manicis textam, Maras nomine quidam inductus est ut appellant Christiani diaconus, cuius prolatae litterae scriptae Graeco sermone ad Tyrii textrini praepositum celerari speciem perurgebant quam autem non indicabant denique etiam idem ad usque discrimen vitae vexatus nihil fateri conpulsus est.', 2, 2, NULL, 7),
(9, 'Tantum autem cuique tribuendum, primum quantum.', 'VHS', 'Vidéo', 'Documentaire', '2004-05-09', 'Oportunum Est', 'Réalisateur', 'Homines enim eruditos et sobrios ut infaustos et inutiles vitant, eo quoque accedente quod et nomenclatores adsueti haec et talia venditare, mercede accepta lucris quosdam et prandiis inserunt subditicios ignobiles et obscuros.', 5, 5, NULL, 7),
(10, 'Vita est illis semper in fuga uxoresque.', 'DVD', 'Vidéo', 'Film', '2012-02-03', 'Novitates Autem', 'Réalisateur', 'Nemo quaeso miretur, si post exsudatos labores itinerum longos congestosque adfatim commeatus fiducia vestri ductante barbaricos pagos adventans velut mutato repente consilio ad placidiora deverti.', 9, 9, NULL, 7),
(11, 'Ideoque fertur neminem aliquando ob haec vel.', 'DVD', 'Vidéo', 'Documentaire', '2013-04-04', 'Constantius Audiens', 'Réalisateur', 'Ideo urbs venerabilis post superbas efferatarum gentium cervices oppressas latasque leges fundamenta libertatis et retinacula sempiterna velut frugi parens et prudens et dives Caesaribus tamquam liberis suis regenda patrimonii iura permisit.', 2, 2, NULL, 7),
(12, 'Cyprum itidem insulam procul a continenti.', 'CD', 'Audio', 'Musique', '2005-04-01', 'Altera Sententia', 'Compositeur', 'Quam ob rem vita quidem talis fuit vel fortuna vel gloria, ut nihil posset accedere, moriendi autem sensum celeritas abstulit; quo de genere mortis difficile dictu est; quid homines suspicentur, videtis; hoc vere tamen licet dicere, P. Scipioni ex multis diebus, quos in vita celeberrimos laetissimosque viderit, illum diem clarissimum fuisse, cum senatu dimisso domum reductus ad vesperum est a patribus conscriptis, populo Romano, sociis et Latinis, pridie quam excessit e vita, ut ex tam alto dignitatis gradu ad superos videatur deos potius quam ad inferos pervenisse.', 4, 4, NULL, 7);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `prenom_user` varchar(50) DEFAULT NULL,
  `nom_user` varchar(50) DEFAULT NULL,
  `date_user` date DEFAULT NULL,
  `mail_user` varchar(50) DEFAULT NULL,
  `idconnex_user` varchar(50) DEFAULT NULL,
  `pass_user` varchar(255) DEFAULT NULL,
  `level_user` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `prenom_user`, `nom_user`, `date_user`, `mail_user`, `idconnex_user`, `pass_user`, `level_user`) VALUES
(1, 'Guillaume', 'Besse', '1993-11-15', 'ofun.exemplar@gmail.com', 'Ofun', '86d573c65143debec72768b86d6d54fa6e0b3e8a', '2');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `FK_emprunt_id_support` FOREIGN KEY (`id_support`) REFERENCES `support` (`id_support`),
  ADD CONSTRAINT `FK_emprunt_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `FK_link_id_key` FOREIGN KEY (`id_key`) REFERENCES `key` (`id_key`),
  ADD CONSTRAINT `FK_link_id_support` FOREIGN KEY (`id_support`) REFERENCES `support` (`id_support`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
