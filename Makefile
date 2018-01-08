.PHONY: help install cache-clear permissions create-database reload-database install server deploy proxy 
.DEFAULT_GOAL= help

APACHE_USER?=www-data

help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-10s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

vendor: composer.json ## Installe les dépendances
	composer install

composer.lock: composer.json ## Update dépendances
	composer update

cache-clear: var/cache ## Vide le cache
	@sudo chmod -R 777 var/cache
	@php bin/console cache:clear --no-debug --no-warmup
	@php bin/console cache:clear --env=prod --no-debug --no-warmup
	@php bin/console cache:warmup --env=prod
	@sudo chmod -R 777 var/cache

permissions: var/ web/assets/database_files ## Donne les permissions au serveur d'écrire dans le cache et dans les fichiers de la DB
	@sudo chown -R $(APACHE_USER) var/
	@sudo chown -R $(APACHE_USER) web/assets/database_files

create-database: ## Créer la base de données, les tables, et garni les tables
	php bin/console doctrine:database:create
	php bin/console doctrine:schema:update --force
	php bin/console doctrine:fixtures:load -n

reload-database: ## Supprime et recrée la base de données, les tables, et garni les tables
	php bin/console doctrine:database:drop --force
	make create-database

install: ## Installe le projet
	make vendor
	make cache-clear
	make create-database
	make permissions

server: ## Lance le serveur
	make cache-clear
	php bin/console server:run




deploy: ## Déploiement 
	composer install --no-dev --optimize-autoloader
	make install
	
proxy: ## Lance browser-sync (live reload)
	browser-sync start --proxy "websiteperso.local/app_dev.php/" --files="web/assets/css/*.css, web/assets/js/*.js, src/**/**/*.php, src/**/Resources/views/**/*.twig, app/Resources/FOSUserBundle/views/Security/*.twig, app/Resources/SonataAdminBundle/views/*.twig, app/Resources/views/*.twig" --no-notify

