DOCKER_DIR = docker
COMPOSE_DEV = docker-compose  -f   docker-compose.dev.yml 
COMPOSE_PROD = docker-compose  -f  docker-compose.prod.yml
COMPOSE_PRE = docker-compose  -f  docker-compose.pre.yml

DOCKER_RUN = cd ${DOCKER_DIR} && ${COMPOSE_DEV} run php
DOCKER_EXEC = docker exec -i hexexample-php bash -c


#aux dev
sh:
	docker exec -it hexexample-php /bin/bash

#dev
build-dev:
	cd ${DOCKER_DIR} && ${COMPOSE_DEV} build
up-dev:
	cd ${DOCKER_DIR} && ${COMPOSE_DEV} up --build -d

deploy-dev:	build-dev up-dev composer-install migrations-migrate cache-clear


#pre
build-pre:
	cd ${DOCKER_DIR} && ${COMPOSE_PRE} build
up-pre:
	cd ${DOCKER_DIR} && ${COMPOSE_PRE} up --build -d

deploy-pre:	build-pre up-pre composer-install migrations-migrate cache-clear


#prod
build-prod:
	cd ${DOCKER_DIR} && ${COMPOSE_PROD} build
up-prod:
	cd ${DOCKER_DIR} && ${COMPOSE_PROD} up --build -d
deploy-prod:	build-prod up-prod composer-install migrations-migrate cache-clear


#migrations and fixtures
create-database:
	${DOCKER_EXEC} "cd app && php bin/console doctrine:database:create"
migrations-migrate:
	${DOCKER_EXEC} "cd app && php bin/console --no-interaction  doctrine:migrations:migrate"
migrations-create:
	${DOCKER_EXEC} "cd app && php bin/console make:migration"
load-fixtures:
	${DOCKER_EXEC} "cd app && bin/console hautelook:fixtures:load"

# symfomy cache
cache-clear:
	${DOCKER_EXEC} "cd app && php bin/console cache:clear"

# composer
composer-install:
	${DOCKER_EXEC} "cd app && composer install"


#testing
test-create-database:
	${DOCKER_EXEC} "cd app && APP_ENV=test php bin/console doctrine:database:create"
test-migrations-migrate:
	${DOCKER_EXEC} "cd app && APP_ENV=test php bin/console doctrine:migrations:migrate"
test-run-all:
	${DOCKER_EXEC} "cd app && php bin/phpunit"
test-run-one:
	${DOCKER_EXEC} "cd app && php bin/phpunit --filter ${test}"
test-load-fixtures:
	${DOCKER_EXEC} "cd app && APP_ENV=test bin/console hautelook:fixtures:load"
test-cache-clear:
	${DOCKER_EXEC} "cd app && APP_ENV=test php bin/console cache:clear"




