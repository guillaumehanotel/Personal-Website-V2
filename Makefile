.PHONY: install cache-clear help
.DEFAULT_GOAL= help


help:
	@grep -E '(^[a-zA-Z_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[32m%-10s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

vendor: composer.json ## Installe les dépendances
	composer install

composer.lock: composer.json ## Update dépendances
	composer update

cache-clear: var/cache ## 'Vide' le cache
	@sudo chmod -R 777 var/cache
	@php bin/console cache:clear
	@sudo chmod -R 777 var/cache

install: cache-clear vendor composer.lock ## Installe le projet

proxy: ## Lance browser-sync (live reload)
	browser-sync start --proxy "websiteperso.local/app_dev.php/" --files="web/assets/css/*.css, web/assets/js/*.js, src/**/**/*.php, src/**/Resources/views/**/*.twig, app/Resources/FOSUserBundle/views/Security/*.twig, app/Resources/SonataAdminBundle/views/*.twig, app/Resources/views/*.twig" --no-notify
