# Site de Carte

*  C'est un site pour trouver les restos les plus proches.
*  On peut trouver les informations à partir des point sur la carte (nom, adress, site pour contacter, horaire de la resto)
*  En plus, les administrators peuvent voir et modifier les informations ou supprimer les données dans le base de donné.


## Les informations du group
#### Étudiants de l'université Claude Bernard Lyon 1 ####
1. Student 1: 11520021, Nguyễn Phan Minh Phú
2. Student 2: 11520027, Nguyễn Xuân Hoàng Tú

## Installation
### Environnement
* [Laravel](https://laravel.com/) - Framework de web utilisé
* [Google Api](https://developers.google.com/apis-explorer/) - Génération des coordonnées des restos
* [GraphQL](https://graphql.org/) - Exporter les données dans la base de donnée pour les autres applications (mobile, web, ...)
* [GPS](#) - Trouver les coordonnées du client
* [Bootstrap](https://getbootstrap.com/) - Améliorer de l'interface du site
* [Gulp](https://gulpjs.com/) - Compiler Sass

### Installation
* Télécharger le code source
```cmd
git clone https://github.com/HoangTu97/carte.git
```
* Migrer les donnés
```cmd
php artisan migration
php artisan db:seed
```
* Installer les packages
```cmd
npm install
composer install
```
* Utiliser
```cmd
php artisan serve
```

## Fonctionnalité

### Fonction a été implémentée
 - S'inscrire un compte (pour client)
 - Se connecter (pour administrator)
 - Trouver les coordonnées des restos les plus proches dans un zone (exporter par GraphQL)
 - Chercher les informations des restos par nom, adress
 - Voir les infos des restos (nom, adress, site pour contacter, horarire)
 - Voir les infos des autres clients (administrator seulement)
 - Gérer les donnés dans la base de donnée (supprimer, ajouter, éditer)

### Les comptes dans la base de donnée
* (username - password)
* admin - 123 (administrator)
* user1 - 123 (client)
* user2 - 123 (client)

## Demo

* [Heroku](https://map-stores.herokuapp.com/)
* [Lien de carte pour client](https://map-stores.herokuapp.com/)
* [Lien pour administrator](https://map-stores.herokuapp.com/admin)