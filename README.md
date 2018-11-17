# NFA021 • Projet CatClinic

[![Deployment Goals](https://consistently.io/g/bastosh/nfa021/badge.svg)](https://consistently.io/g/bastosh/nfa021/)

Projet réalisé dans le cadre de la formation Programmation de sites web du CNAM (Aix-en-Provence).

Le projet est consultable à l’adresse suivante : http://nfa021.bastoche.fr/

## Installation
- Prérequis : avoir [Composer](https://getcomposer.org/doc/00-intro.md) installé globalement sur sa machine
- Télécharger ou cloner le repository
- Une fois dans le dossier, lancer la commande :
```
$ composer install
$ npm install
```

## Outils
- Compilation Foundation :
```
$ gulp sass
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

## En cours
- Mise en place de l’architecture MVC selon les principes vus en cours
- Création des mockups avec Balsamiq

Voir le fichier [CHANGELOG.md](https://github.com/bastosh/nfa021/blob/master/CHANGELOG.md) pour suivre l’avancée détaillée du projet.