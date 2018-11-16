# Changelog
Tous les changements notables apportés à ce projet seront documentés dans ce fichier.

Le format adopté est celui proposé par [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
et ce projet adhère au [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 0.0.1 - 2018-11-15
### Changed
- Remplacement de la classe VHtml par une fonction view() pour renvoyer des vues directement depuis le contrôleur sans instanciation dans la vue (séparation des responsabilités).
- Passage des variables à la vue via les fonctions natives de PHP (compact(), extract()) pour éviter les variables globales.
