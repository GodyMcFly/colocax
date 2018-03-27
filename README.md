# Colocax
Projet universitaire - Site web d'annonces de colocations

## Etape 0
S'assurer que vous disposez de toutes ces technologies :
- php 5.4
- twig 2.0
- composer
- doctrine 
	
## Etape 1
Dans le dossier mis à diposition par votre serveur web, cloner le repository depuis l'adresse : https://github.com/GodyMcFly/colocax

## Etape 2
Dans la racine du projet (pour Wamp par exemple: wamp/www/colocax), installé les dépendances du projet en effectuant la commande :
- composer update

## Etape 3
Générez la base de données avec les commandes :
- php bin/console doctrine:schema:create
- php bin/console doctrine:schema:update --force

## Etape 4
Vous pouvez désormais utiliser l'application Colocax via votre navigateur :
- localhost/colocax/web/app_dev.php/fr/
Il est possible de créer un compte administrateur avec la commande :
- php bin/console fos:user:create leNomUtilisateur --super-admin
