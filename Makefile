include .env

# Variables
COMPOSE_FILE = compose.yaml
DOCKER_COMPOSE = docker-compose -f $(COMPOSE_FILE)
TIMESTAMP = $(shell date +%Y%m%d%H%M%S)
BACKUP_FILE = $(DATABASE_BACKUP_DIR)/backup_$(TIMESTAMP).sql
BACKUP_LATEST = $(DATABASE_BACKUP_DIR)/backup_latest.sql

build: down
	$(DOCKER_COMPOSE) build

reup: down up

up:
	$(DOCKER_COMPOSE) up -d

up-logs:
	$(DOCKER_COMPOSE) up

down:
	$(DOCKER_COMPOSE) down

start: build up

exec-app:
	$(DOCKER_COMPOSE) exec app bash

exec-db:
	$(DOCKER_COMPOSE) exec database mariadb -h 127.0.0.1 -u $(MYSQL_USER) -p$(MYSQL_PASSWORD) $(MYSQL_DATABASE)

exec-http:
	$(DOCKER_COMPOSE) exec http sh

clean: backup-db
	$(DOCKER_COMPOSE) down -v --rmi all

logs:
	$(DOCKER_COMPOSE) logs -f

restart:
	$(DOCKER_COMPOSE) restart

ps:
	$(DOCKER_COMPOSE) ps

fix-permissions:
	docker-compose exec app chown -R $(USER_UID):$(USER_GID) /var/www/app
	docker-compose exec app chmod -R 775 /var/www/app
	docker-compose exec app chmod -R 777 /var/www/app/var

backup-db:
	mkdir -p $(DATABASE_BACKUP_DIR)
	$(DOCKER_COMPOSE) exec database mariadb-dump -h 127.0.0.1 -u $(MYSQL_USER) -p$(MYSQL_PASSWORD) $(MYSQL_DATABASE) > $(BACKUP_FILE)
	ln -s $(BACKUP_FILE) $(BACKUP_LATEST)

restore-db:
	$(DOCKER_COMPOSE) exec -T database mariadb -h 127.0.0.1 -u $(MYSQL_USER) -p$(MYSQL_PASSWORD) $(MYSQL_DATABASE) < $(BACKUP_LATEST)
