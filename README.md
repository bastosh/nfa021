# Simple MVC

Simple MVC est un micro-framework PHP. Documentation à venir.

http://simple.bastoche.fr/

## Installation
- Prérequis : avoir [Composer](https://getcomposer.org/doc/00-intro.md) installé globalement sur sa machine

### 1. Téléchargement
- Télécharger ou cloner le repository :
```
$ git clone https://github.com/simple-mvc/simple.git my-new-project
$ cd my-new-project
```
- Démarrer un nouveau projet Git :
```
$ rm -rf .git && git init
```
- Installer les dépendances :
```
$ composer install
$ npm install
```
- Compiler le CSS :
```
$ gulp sass
```

### 2. Base de données
- Créer une base de données
- Utiliser le fichier simple.sql pour alimenter la base avec la table fournie en exemple

### 3. Configuration
- Adapter le fichier config.php en fonction de sa propre configuration
    - Renseigner les champs requis pour l’accès à la base de données
    - Renseigner identifiant et mot de passe pour l’accès à l’administration (par défaut, entrée libre)

### 4. Browsersync (optionnel)
- Adapter le script npm du package.json en fonction de sa configuration :
```
browser-sync start --proxy 'my-new-project.test' --files 'public'
```
- Lancer Browsersync :
```
$ npm run serve
```

## Outils
- Browsersync (nécessite configuration proxy):
```
$ npm run serve
```
- Compilation CSS principal :
```
$ gulp sass
```
- Surveillance scss et compilation automatique :
```
$ gulp watch
```
- Compilation et surveillance :
```
$ gulp
```
- Compilation CSS administration :
```
$ gulp sass-admin
```
- Suppression des classes inutilisées :
```
$ gulp purgecss
```
- Minification du css :
```
$ gulp nano
```

## Changelog
Détails des évolutions dans le fichier [CHANGELOG.md](https://github.com/simple-mvc/simple/blob/master/CHANGELOG.md).

## Licence ISC
Copyright (c) 2018, Sébastien Pereda

Permission to use, copy, modify, and/or distribute this software for any
purpose with or without fee is hereby granted, provided that the above
copyright notice and this permission notice appear in all copies.

THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.