# vim: set tabstop=8 softtabstop=8 noexpandtab:
COMPOSE_FILE := '../EasyInfra/docker-compose.yml'
WORKSPACE := 'EasyHire'

init:
	echo "WORKSPACE=EasyHire" > ../EasyInfra/.env

build: init
	@docker-compose --file=${COMPOSE_FILE} build

run: init
	@docker-compose --file=${COMPOSE_FILE} up -d

stop:
	@docker-compose --file=${COMPOSE_FILE} stop

enter:
	@docker-compose --file=${COMPOSE_FILE} exec --user="php" -e WORKSPACE=${WORKSPACE} php-cli /bin/sh

install:
	@docker-compose --file=${COMPOSE_FILE} exec php-cli /bin/sh -c 'chown -R php:php /home/php/.composer/cache'
	@docker-compose --file=${COMPOSE_FILE} exec --user="php" php-cli composer install

destroy: init
	@docker-compose --file=${COMPOSE_FILE} down --rmi local
	@docker-compose --file=${COMPOSE_FILE} down --volumes