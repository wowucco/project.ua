BIN_DOCKER = 'docker'
BIN_DOCKER_COMPOSE = 'docker-compose'

COMPOSE_FILE_UP_DEVELOPMENT = 'compose-up-dev.yml'
COMPOSE_FILE_MIGRATION = 'compose-dev-migration.yml'

CONTAINER_BACKUP = project-backup
CONTAINER_NGINX = project-nginx
CONTAINER_PHP70 = project-php

clear_all: clear_containers clear_images

stop_dev:
	$(BIN_DOCKER_COMPOSE) -f $(COMPOSE_FILE_UP_DEVELOPMENT) stop

remove_dev:
	$(BIN_DOCKER_COMPOSE) -f $(COMPOSE_FILE_UP_DEVELOPMENT) rm

apply_migration:
	$(BIN_DOCKER_COMPOSE) -f $(COMPOSE_FILE_UP_DEVELOPMENT) -f $(COMPOSE_FILE_MIGRATION) up

up_dev:
	$(BIN_DOCKER_COMPOSE) -f $(COMPOSE_FILE_UP_DEVELOPMENT) up -d

reload_nginx:
	$(BIN_DOCKER) exec -it $(CONTAINER_NGINX) service nginx reload

connect_nginx:
	$(BIN_DOCKER) exec -it $(CONTAINER_NGINX) bash

connect_php:
	$(BIN_DOCKER) exec -it $(CONTAINER_PHP70) bash
