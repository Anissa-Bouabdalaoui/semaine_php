# Netfoot

Netfoot est un site permettant à un chef cuisinier d'exposer ses recettes.
Chaque utilisateurs peut s'inscrire et donc poster des commentaires sur des recettes tester.

## SiteMap
![SiteMap](https://www.noelshack.com/2018-07-4-1518710981-site-map.png)

### SQL

--
-- Base de données :  `semaine_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mdp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `pseudo`, `email`, `mdp`, `admin`) VALUES
(12, 'AZERTY', 'AZE@RTY.FR', 'DADlOaHK+Vl1pLlrhsVCNw==', 1),

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text CHARACTER SET latin1 NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `pseudo`, `comment`) VALUES
(id, 'Pseudo test', 'commentaires Test');

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
CREATE TABLE IF NOT EXISTS `recettes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) CHARACTER SET latin1 NOT NULL,
  `nom` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id`, `img`, `nom`) VALUES
(6, 'avocat', 'Avocat assaisonnÃ©'),

COMMIT;
### Site
##### Inscription.php

Page permettant de s'inscrire sur le site via un pseudo, une email et un mot de passe.

Récupère le pseudo, l'email et le mot de passe et sa confirmation.
Si tout tout correspond aux critères de /function/inscription.class.php
Puis crée le compte en question en démarrant une session avec un session_start();

##### Connexion.php

Page permettant de se connecter sur le site via un pseudo et un mot de passe si l'on possède un compte au préalable.

Récupère le pseudo et le mot de passe
Si tout tout correspond aux critères du compte via /function/connexion.class.php
Puis crée le compte en question en démarrant une session avec un session_start();

##### Index.php

Page sur laquelle on se situe une fois que l'on est connecter au site.
On récupère les éléments id, nom et image de la table recette pour les afficher.
via un */SELECT -- FROM /*

##### pageArticle.php

Page sur laquelle on a la possibilité d'écrire / éditer ou supprimer un commentaire.
On récupère les éléments id, pseudo et le commentaire de la table comments pour les afficher.
via un */SELECT -- FROM /*


### Ecriture d'un commentaire

##### addComment.php

Page permettant d'écrire un commentaire.

##### doaddComment.php

Page d'execution de la requête pour le  commentaire écrit dans la page 'addComment.php'.
Change les élements comment et pseudo ainsi que leur valeurs
via un */INSERT INTO -- VALUES/*

##### editComment.php

On récupère les valeurs de id, pseudo et comments dans la table comments lorsque les id sont identiques avec la table
via un */ SELECT -- FROM --WHERE/*

##### doeditComment.php

Page d'execution de la requête pour le  commentaire édité dans la page 'editComment.php'.
On met à jour la valeur de comment lorque les id correspondent.

##### deleteComment.php

On récupère les valeurs de id, pseudo et comments dans la table comments lorsque les id sont identiques avec la table
via un */ SELECT -- FROM --WHERE/*

##### dodeleteComment.php

Page d'execution de la requête pour le  commentaire édité dans la page 'deleteComment.php'.
On suprrime alors la valeur de comment.

### Espace Administration

#### admin.php

Page sur laquelle peut acceder l'admin via un login spécial prédéfini.
Si ce login est erronée alors on est redirigé vers une page h4ck3rz.php

##### adminAccount.php

Page que laquelle l'admin peut gérer les comptes de chaque utilisateurs.
On récupère alors les valeurs de id, pseudo, email, mot de passe et admin de la table clients
via un */SELECT -- FROM /*

##### doDeleteAdminAccount.php

Page d'execution de la requête pour la  suppression de compte utilisateurs dans la page 'adminAccount.php'.
On suprrime alors la valeur de l'id de la table clients


##### adminRecette.php

Page que laquelle l'admin peut gérer l'ajout / suppression chaque recette.
On récupère alors les valeurs de id, nom et l'image de la table recettes
via un */SELECT -- FROM /*

##### addRecette.php

Page permettant d'ajouter une recette.
On récupère alors les valeurs de id, nom et l'image de la table recettes
via un */SELECT -- FROM /*

##### doaddRecette.php

Page d'execution de la requête pour la  recette ajouté dans la page 'addRecette.php'.
Change les élements nom et img ainsi que leur valeurs
via un */INSERT INTO -- VALUES/*


##### editRecette.php

On récupère les valeurs de id, img et nom dans la table recette lorsque les id sont identiques avec la table recette
via un */ SELECT -- FROM --WHERE/*

##### doeditRecette.php

Page d'execution de la requête pour la  recette édité dans la page 'editRecette.php'.
Change les élements nom et img ainsi que leur valeurs lorsque les id sont identiques avec la table recette
via un */UPDATE -- SET -- WHERE/*


##### doDeleteRecette.php

Page d'execution de la requête pour la  suppression d'une recette dans la page 'adminRecette.php'.
On suprrime alors la valeur de l'id de la table recette.


### Espace Hacker

##### h4ck3rz.php

C'est une page de redirection pour tout utilisateurs voulant se connecter à l'espace Admin mais que celui-ci s'est trompé.


### Technologies utilisées

PHP 7.1.14
MYSQL 5.7
APACHE 2.4
