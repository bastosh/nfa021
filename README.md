# Simple MVC

[![Deployment Goals](https://consistently.io/g/bastosh/nfa021/badge.svg)](https://consistently.io/g/bastosh/nfa021/)

Projet réalisé dans le cadre de la formation Programmation de sites web du CNAM (Aix-en-Provence).

Une démo est consultable à l’adresse suivante : http://nfa021.bastoche.fr/

## Installation
- Prérequis : avoir [Composer](https://getcomposer.org/doc/00-intro.md) installé globalement sur sa machine
- Télécharger ou cloner le repository

### Base de données
- Créer une base de données
- Utiliser le fichier mvc.sql pour alimenter la base avec la table fournie en exemple
- Adapter le fichier config.php en fonction de sa propre configuration

### Projet
- Une fois dans le dossier depuis le Terminal, lancer les commandes :
```
$ composer install
$ npm install
$ gulp
```
Et dans une autre fenêtre
```
$ npm run serve
```

## Outils
- Browsersync (nécessite configuration proxy):
```
$ npm run serve
```
- Compilation Foundation :
```
$ gulp sass
```
- Surveilance scss et compilation automatique :
```
$ gulp watch
```
- Compilation et surveillance :
```
$ gulp
```
- Suppression des classes inutilisées :
```
$ gulp purgecss
```
- Minification du css :
```
$ gulp nano
```
- Déploiement (nécessite dploy installé globalement et un fichier de configuration dploy.yaml – non versionné)
```
$ dploy
```

## Changelog
Détails des évolutions dans le fichier [CHANGELOG.md](https://github.com/bastosh/nfa021/blob/master/CHANGELOG.md).