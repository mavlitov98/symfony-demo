first-init:
	make up
	make composer-install

up:
	docker-compose up -d --build

composer-install:
	docker-compose exec symfony-demo-php composer install

php-bash:
	docker-compose exec symfony-demo-php bash

clear-cache:
	docker-compose exec symfony-demo-php ./bin/console cache:clear

psalm:
	docker-compose exec symfony-demo-php ./vendor/bin/psalm

csfix:
	docker-compose exec symfony-demo-php ./vendor/bin/php-cs-fixer fix