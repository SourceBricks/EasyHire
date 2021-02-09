# vim: set tabstop=8 softtabstop=8 noexpandtab:
build:
	@docker-compose build

up:
	@docker-compose up -d

stop:
	@docker-compose stop

destroy:
	@docker-compose down --rmi local

enter:
	@docker-compose exec --user="php" easy_hire /bin/sh

enter-as-root:
	@docker-compose exec symfony /bin/sh