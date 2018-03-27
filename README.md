# Projet universitaire - Site web de colocations

Require: 
	- php 5.4
	- twig 2.0
	- composer
	- doctrine 

Pour d�ployer le site web en local :
- Avoir composer d'install� ;
- Cloner le repository sur votre serveur (pour Wamp par exemple --> wamp64/www/colocax)
- Ouvrir un terminal dans le dossier colocax/ et effectuer la commande composer update
- Pour g�n�rer la base de donn�es, faire :
	- php bin/console doctrine:schema:create
	- php bin/console doctrine:schema:update --force

