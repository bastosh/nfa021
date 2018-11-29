# Changelog
Tous les changements notables apportés à ce projet seront documentés dans ce fichier.

Le format adopté est celui proposé par [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
et ce projet adhère au [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 1.0.0 - 2018-11-29
### Added
- Intégration de Twig en alternative pour le rendu des vues (front-end seulement : pas de gestion des notifications)

### Fixed
- Toutes les images n’étaient pas supprimées lors de la suppression d’un article

## 1.0.0-beta - 2018-11-27
### Added
- Ajout d’actions publish/unpublish au niveau du dashboard
- Ajout d’une ressource Post (routes, modèle, vues, contrôleur)
- Mise en place CKEditor pour la mise en forme des articles
- Mise en place de l’upload/suppression d’images
- Redimensionnement automatique des images
- Protection csrf
- Timestamps
- Action delete depuis le formulaire d’édition
- Debug bar

### Changed
- Modification des libellés au niveau de la barre de navigation : admin changé pour dashboard si connecté, login sinon)
- Organisation du dashboard pour la gestion de plusieurs ressources

## 0.9.0 - 2018-11-26
### Added
- Validation formulaire côté client
- Validation formulaire côté serveur

## 0.8.2 - 2018-11-24
### Added
- Route pour consulter un item depuis le site et route pour consulter un item depuis l’administration

## 0.8.1 - 2018-11-24
### Added
- Mise en forme administration

## 0.8.0 - 2018-11-24
### Added
- Ajout d’un fichier robots.txt dans le dossier public/

### Changed
- Séparation du sytle principal et du style de l’adminisatration pour optimisation des fichiers CSS
- Amélioration visuelle des messages flash

## 0.7.2 - 2018-11-23
### Added
- Ajout d’une fenêtre de confirmation lors de la suppression d’items

## 0.7.1 - 2018-11-22
### Added
- Ajout sécurisation de la page edit
- Ajout de contrôle au moment du login
- Renvoi vers une page d’erreur lorsque la route n’existe pas

## 0.7.0 - 2018-11-20
### Added
- Protection de la page d’administration par un mot de passe
- Session administrateur
- Configurations prod et dev dans le fichier config.php

## 0.6.0 - 2018-11-20
### Added
- session_start() et messages flash
- Mise à disposition d’un fichier mvc.sql pour démo

## 0.5.0 - 2018-11-20
### Added
- Namespace
- Méthode delete dans QueryBuilder.php
- Méthode destroy() dans FeaturesController.php
- Route POST features/{id}/delete
- Méthode update dans QueryBuilder.php
- Méthode edit() dans FeaturesController.php
- Méthode update() dans FeaturesController.php
- Route POST features/{id}

## 0.4.0 - 2018-11-20
### Added
- Ajout d’une méthode select() dans le QueryBuilder
- Ajout d’une page 404
- Création d’un dossier dédié dans les vues pour les features pour mise en place d’un CRUD d’exemple
- Création de la vue features/show.view.php

### Changed
- Amélioration du router (gestion de l’id pour les méthodes show)
- Vue pages/features.view.php changée en features/show.view.php

## 0.0.6 - 2018-11-19
### Added
- core/App.php (dependency injection container)
- fonction redirect($path) dans core/helpers.php

### Changed
- Passage à des classes Controller

## 0.3.0 - 2018-11-19
### Added
- app/controllers
- Création d’une classe Router pour gérer le routing
- Création d’une classe Request pour gérer la requête (uri)
- Création d’une méthode insert générique

## 0.2.0 - 2018-11-19
### Added
- app/models
- core/database
- config.php
- classe Connection
- classe QueryBuilder avec méthode générique selectAll($table, $model)

## 0.1.2 - 2018-11-17
### Added
- Ajout d’un fichier gulpfile.js pour compiler Foundation plus finement
- Ajout gulp task 'purgecss' pour supprimer toutes les classes inutilisées
- Ajout gulp task 'watch' et 'default'
- Ajout script npm 'serve' (browsersync)

### Removed
- Suppression des scripts dans le fichier package.json
- Suppression du fichier postcss.config.js

## 0.1.1 - 2018-11-17
### Added
- Ajout script npm cssnano (via postcss-cli)

## 0.1.0 - 2018-11-16
### Changed
- Remplacement de la classe VHtml par une fonction view() pour renvoyer des vues directement depuis le contrôleur sans instanciation dans la vue (séparation des responsabilités)
- Passage des variables à la vue via les fonctions natives de PHP (compact(), extract()) pour éviter les variables globales
- Routing basé sur $_SERVER['REQUEST_URI'] plutôt que sur un paramètre passé dans l’url (pour des url plus «propres»)

### Added
- Ajout du composant var-dumper de Symfony pour faciliter le debug
- Ajout d’un autoload via composer pour le fichier helpers.php
- Ajout d’un fichier README.md
- Ajout d’un fichier .htaccess dans le dossier public
- Ajout documentation de la fonction view()
- Installation de Foundation via npm