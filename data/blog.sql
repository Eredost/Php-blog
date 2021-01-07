-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 07 jan. 2021 à 08:48
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `isValidated` tinyint(1) NOT NULL,
  `postId` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_comment` (`postId`),
  KEY `user_comment` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `isValidated`, `postId`, `userId`, `createdAt`, `updatedAt`) VALUES
(1, 'Excellent article !', 1, 1, 2, '2021-01-04 12:18:33', NULL),
(2, 'Ce retour d\'expérience ma beaucoup aidé dans le choix de ma formation.', 1, 1, 3, '2021-01-04 12:18:33', NULL),
(3, 'Très bon choix de reconversion.', 1, 2, 2, '2021-01-04 12:20:21', NULL),
(4, 'Bon courage dans ton parcours.', 1, 2, 3, '2021-01-04 12:20:21', NULL),
(5, 'J\'avais quelques doutes sur cet organisme, mais finalement elle me botte beaucoup !', 1, 3, 2, '2021-01-04 12:23:45', NULL),
(6, 'J\'ai également pu me former avec cet organisme et j\'en garde également de très bon souvenirs.', 1, 3, 3, '2021-01-04 12:23:45', NULL),
(7, 'Je me suis aussi posé beaucoup de questions sur la voie que je souhaitais prendre, j\'ai beaucoup de mal à me décider.', 0, 2, 2, '2021-01-04 12:30:07', NULL),
(8, 'Je suis pour le moment toujours dans l\'attente de recevoir mon diplôme, ils prennent beaucoup de temps...', 0, 3, 3, '2021-01-04 12:30:07', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(160) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_post` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `summary`, `image`, `content`, `userId`, `createdAt`, `updatedAt`) VALUES
(1, 'Mon expérience sur le parcours Python d\'OpenClassrooms', 'Cette expérience m\'a grandement initié avec les principaux concepts du monde du développement.', 'http://localhost/blog-php/public/uploads/openclassrooms.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce finibus tincidunt augue, quis facilisis nunc aliquet quis. Curabitur nec ante urna. Vestibulum ac libero imperdiet, tristique ex ut, porta purus. Maecenas varius ultricies accumsan. Mauris pharetra scelerisque nibh ut condimentum. Morbi lacus arcu, aliquet non eleifend non, condimentum quis odio. Aliquam auctor ultrices ex, at pellentesque urna fringilla a. Nullam quis porta enim. Aliquam eu molestie urna, vel efficitur ante. Donec finibus nisi ut gravida elementum. Etiam vulputate leo a lorem ullamcorper, non vehicula sem malesuada. Cras id interdum nunc. Nullam at eros magna.\r\n\r\nInteger a diam eu lectus dignissim molestie a quis ex. Sed vitae faucibus arcu. Sed vehicula elit mi, ullamcorper malesuada ex dignissim at. Vestibulum tristique purus ut ultricies tempor. Praesent varius molestie libero, non imperdiet leo ultrices eget. Donec congue justo et magna posuere porta. Vestibulum scelerisque lectus in erat tempus pretium. Aliquam leo augue, luctus a blandit non, semper ut urna. Proin ut sem leo. Aenean justo purus, pellentesque ut neque tristique, placerat cursus sapien. Pellentesque a lorem vel lectus aliquet faucibus. Nullam id ex sagittis, facilisis ligula a, mattis metus. Vestibulum lobortis sed mi tempus semper.\r\n\r\nUt sed ligula vel mi pulvinar vehicula et nec ante. Sed interdum dignissim lorem sed euismod. Duis tincidunt faucibus urna, in pulvinar tellus sagittis quis. Integer in molestie velit, a pulvinar eros. Nullam ac augue sollicitudin, vehicula purus ut, ultricies magna. Etiam finibus, massa eu pulvinar tristique, felis massa accumsan lorem, nec commodo purus elit non ex. Vestibulum fermentum at purus in scelerisque. Donec varius id ante eu mollis. Donec lacus eros, molestie a ultricies non, convallis rutrum libero. Etiam rutrum tortor lectus, auctor molestie dolor imperdiet vitae. Etiam tristique leo eros, ut commodo augue ultrices nec. Curabitur erat est, blandit et volutpat sit amet, semper finibus risus. ', 1, '2021-01-04 11:50:37', NULL),
(2, 'Le choix d\'une reconversion', 'Dans le but de choisir une voie professionnelle plus gratifiant, j\'ai décidé de mon reconvertir dans le monde de l\'informatique.', 'http://localhost/blog-php/public/uploads/developpement-web.jpg', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in rhoncus lacus. Mauris nunc massa, tempor quis neque iaculis, venenatis aliquet ante. Praesent a posuere dui. Integer tincidunt dictum dolor vel varius. Etiam vel lacinia turpis. Ut mollis mi ante, ac cursus libero varius et. Donec tincidunt condimentum ipsum, non semper ligula dignissim ut. Etiam malesuada ante ut eros finibus faucibus. Donec venenatis justo ut rutrum rhoncus. Vivamus ultricies nulla vitae metus imperdiet ultrices. Phasellus tellus magna, mattis eu velit in, viverra ultricies dolor. Integer in fermentum magna, vestibulum pulvinar nisi. Nam ornare in dui ut porttitor. Pellentesque in consequat nisl. Mauris sed accumsan lectus.\r\n\r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent eget cursus magna. Nullam fringilla scelerisque velit, rhoncus cursus purus commodo nec. In ipsum orci, molestie in sem id, laoreet molestie ex. Aenean at facilisis est. Duis magna sapien, vehicula finibus tellus eu, cursus bibendum orci. Morbi ut imperdiet ante. Nam vestibulum dolor eros, ut pharetra libero elementum nec. Aenean placerat purus vel fringilla pellentesque. Sed condimentum diam lectus, id ullamcorper purus condimentum sit amet. Suspendisse potenti. Cras id nulla ac nulla tincidunt hendrerit. Mauris cursus diam ex, sit amet molestie nulla accumsan sit amet. ', 1, '2021-01-04 11:47:00', NULL),
(3, 'Mon parcours avec l\'organisme de formation O\'Clock', 'J\'ai pu développer de nombreuses nouvelles compétences dont relationnelles avec le projet de fin de formation.', 'http://localhost/blog-php/public/uploads/oclock.png', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc finibus lobortis felis vitae aliquet. In iaculis, ex et ultrices accumsan, nibh augue interdum purus, maximus sagittis nibh purus in lacus. Nulla justo erat, rutrum id efficitur vitae, fringilla eget est. Ut porta facilisis elit nec tristique. Quisque id diam nec quam euismod accumsan. Nam tincidunt lacinia metus interdum viverra. Suspendisse non aliquet sem, vel luctus justo. Integer ac aliquet lacus, eu molestie dui. Fusce sit amet eros et nisi pulvinar varius at sed turpis. Duis vel est at tortor pharetra porttitor. Donec volutpat vitae ante in sagittis. Integer vehicula nibh vel porttitor ornare. Aenean consectetur urna nisi, ut semper lacus sollicitudin a. Nulla dignissim mi mauris, ac vestibulum mauris cursus sit amet. Quisque sed erat in felis lobortis porta. Nam mattis libero ac massa pretium aliquet.\r\n\r\nQuisque leo tellus, tempor nec risus dapibus, dapibus molestie eros. Maecenas fermentum erat eros, vitae sodales orci bibendum vel. Morbi enim nisl, efficitur facilisis dapibus ac, cursus vel elit. Suspendisse rutrum ligula massa, id tincidunt velit euismod at. Aliquam erat volutpat. Sed accumsan aliquam congue. Donec a mauris sed purus hendrerit viverra vehicula iaculis sapien.\r\n\r\nAenean mi erat, tincidunt eu ante nec, gravida rhoncus ex. Nam ut odio a nunc auctor pharetra et sed justo. Quisque nibh augue, ornare vitae feugiat bibendum, euismod et dolor. Quisque molestie est turpis, vitae tristique ex tincidunt non. Vivamus sapien ante, varius ut quam at, aliquam tempor eros. Nulla suscipit mollis nisi vel vestibulum. Aliquam nec felis id magna cursus bibendum. Praesent consectetur sem eget odio venenatis maximus ac at nibh. Curabitur facilisis, ante quis volutpat varius, enim augue gravida nibh, vel lacinia augue purus eget tortor. Donec ultricies maximus ex in facilisis. Suspendisse luctus sem quam. Cras tellus lacus, consequat vitae vulputate sit amet, congue id eros. Phasellus molestie diam vel malesuada tristique. Etiam vestibulum arcu at nibh porttitor aliquam. In sed posuere nisi.\r\n\r\nSed a porttitor turpis. Duis faucibus sapien nisl, a rhoncus justo faucibus eget. Nunc eget lectus finibus, luctus odio a, scelerisque nunc. Etiam dapibus sagittis lacus, id vehicula arcu congue quis. Suspendisse tristique eleifend molestie. Donec eget augue tincidunt, ultrices lacus vel, laoreet nisi. Phasellus lacus nibh, luctus eu posuere vel, pharetra vitae elit. Quisque ut volutpat lectus. Fusce et ante at dui rhoncus fringilla. Cras vehicula, ante vel aliquet sollicitudin, sem urna porttitor elit, vel finibus augue libero at ligula. Cras accumsan leo vitae aliquam aliquet. Sed elit ipsum, imperdiet eu eros vel, pretium ultrices ligula. Aliquam sit amet purus odio. Aenean vel porttitor odio, in lacinia dui. Donec fringilla massa mi, a auctor nunc ultricies vel. ', 1, '2021-01-04 12:10:14', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` json NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `role`, `password`, `createdAt`, `updatedAt`) VALUES
(1, 'Michael', 'admin@michael-blog.fr', '[\"ROLE_ADMIN\"]', '$2y$10$OGC3u9oykPmh3m.2QxbNEOirkXd8P.ad7KtMWLtngdBILhe1916Dy', '2021-01-04 11:10:12', NULL),
(2, 'MoonBear', 'user1@gmail.com', '[\"ROLE_USER\"]', '$2y$10$WEtdLfQV9S6D9gWO86GYhugRE6AqjW3aqyRl66FdiGze9NfxskUxC', '2021-01-04 11:12:09', NULL),
(3, 'PythonLover', 'user2@gmail.com', '[\"ROLE_USER\"]', '$2y$10$PTXT5PPE79v2hvOZAtCWHeCVNfe3H/aQ/G2VCWbtrJ4GkIQNWil.i', '2021-01-04 11:14:03', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `post_comment` FOREIGN KEY (`postId`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_comment` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `user_post` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
