# Projet universitaire - Site web de colocations

Require: 
	- php 5.4
	- twig 2.0
	- composer
	- doctrine 

Pour déployer le site web en local :
- Avoir composer d'installé ;
- Cloner le repository sur votre serveur (pour Wamp par exemple --> wamp64/www/colocax)
- Ouvrir un terminal dans le dossier colocax/ et effectuer la commande :
	- composer update
- Pour générer la base de données, faire :
	- php bin/console doctrine:schema:create
	- php bin/console doctrine:schema:update --force

