# vim: set tabstop=8 softtabstop=8 noexpandtab:
COMPOSE_FILE := '../EasyInfra/docker-compose.yml'
WORKSPACE := 'EasyHire'

run:
	@docker-compose --file=${COMPOSE_FILE} up -d
	@docker-compose --file=${COMPOSE_FILE} run -e WORKSPACE=${WORKSPACE} -d php-cli

stop:
	@docker-compose --file=${COMPOSE_FILE} stop
