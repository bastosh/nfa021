# Changelog
Tous les changements notables apportés à ce projet seront documentés dans ce fichier.

Le format adopté est celui proposé par [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
et ce projet adhère au [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 0.0.3 - 2018-11-17
### Added
- Ajout d’un fichier gulpfile.js pour compiler Foundation plus finement

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