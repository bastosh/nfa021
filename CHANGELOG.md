# Changelog
Tous les changements notables apportés à ce projet seront documentés dans ce fichier.

Le format adopté est celui proposé par [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
et ce projet adhère au [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Release 1.0.0 - 2018-11-20

## 0.1.1 - 2018-11-20
### Added
- Protection de la page d’administration par un mot de passe
- Session administrateur

## 0.1.0 - 2018-11-20
### Changed
- Mise à jour README

## 0.0.9 - 2018-11-20
### Added
- session_start() et messages flash
- Mise à disposition d’un fichier mvc.sql pour démo

## 0.0.8 - 2018-11-20
### Added
- Namespace
- Méthode delete dans QueryBuilder.php
- Méthode destroy() dans FeaturesController.php
- Route POST features/{id}/delete
- Méthode update dans QueryBuilder.php
- Méthode edit() dans FeaturesController.php
- Méthode update() dans FeaturesController.php
- Route POST features/{id}

## 0.0.7 - 2018-11-20
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

## 0.0.5 - 2018-11-19
### Added
- app/controllers
- Création d’une classe Router pour gérer le routing
- Création d’une classe Request pour gérer la requête (uri)
- Création d’une méthode insert générique

## 0.0.4 - 2018-11-19
### Added
- app/models
- core/database
- config.php
- classe Connection
- classe QueryBuilder avec méthode générique selectAll($table, $model)

## 0.0.3 - 2018-11-17
### Added
- Ajout d’un fichier gulpfile.js pour compiler Foundation plus finement
- Ajout gulp task 'purgecss' pour supprimer toutes les classes inutilisées
- Ajout gulp task 'watch' et 'default'
- Ajout script npm 'serve' (browsersync)

### Removed
- Suppression des scripts dans le fichier package.json
- Suppression du fichier postcss.config.js

## 0.0.2 - 2018-11-17
### Added
- Ajout script npm cssnano (via postcss-cli)

## 0.0.1 - 2018-11-16
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