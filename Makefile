include .env

install:
	@$(MAKE) -s down
	@$(MAKE) -s docker-build
	@$(MAKE) -s up
	@$(MAKE) -s composer-install
	@$(MAKE) -s wait-db
	@$(MAKE) -s migrate
	@echo --- Application installed ---

up: docker-up
down: docker-down
restart: down up

ps:
	@docker-compose -p ${INDEX_NAME} ps

logs:
	@docker-compose -p ${INDEX_NAME} logs

docker-up:
	@docker-compose -p ${INDEX_NAME} up -d

docker-down:
	@docker-compose -p ${INDEX_NAME} down --remove-orphans

docker-build: \
	docker-build-app-php-cli \
	docker-build-app-php-fpm \
	docker-build-app-nginx

docker-build-app-php-fpm:
	@docker build --target=fpm \
	--build-arg USER=1000 \
	--build-arg GROUP=1000 \
	-t ${DOCKER_REGISTRY}/${DOCKER_PHP_FPM_IMAGE_NAME}:${DOCKER_IMAGE_VERSION} -f ./docker/Dockerfile .

docker-build-app-nginx:
	@docker build --target=nginx \
	-t ${DOCKER_REGISTRY}/${DOCKER_NGINX_IMAGE_NAME}:${DOCKER_IMAGE_VERSION} -f ./docker/Dockerfile .

docker-build-app-php-cli:
	@docker build --target=cli \
	--build-arg USER=1000 \
	--build-arg GROUP=1000 \
	-t ${DOCKER_REGISTRY}/${DOCKER_CLI_IMAGE_NAME}:${DOCKER_IMAGE_VERSION} -f ./docker/Dockerfile .

shell:
	@docker exec -it ${DOCKER_PHP_FPM_IMAGE_NAME} /bin/sh

app-php-cli-exec:
	@docker-compose -p ${INDEX_NAME} run --rm php-cli $(cmd)

composer-install:
	$(MAKE) app-php-cli-exec cmd="composer install"

composer-update:
	$(MAKE) app-php-cli-exec cmd="composer update"

composer-require:
	$(MAKE) app-php-cli-exec cmd="composer require $(pkg)"

composer-remove:
	$(MAKE) app-php-cli-exec cmd="composer remove $(pkg)"

migrate:
	$(MAKE) app-php-cli-exec cmd="vendor/robmorgan/phinx/bin/phinx migrate"

migrate-down:
	$(MAKE) app-php-cli-exec cmd="vendor/robmorgan/phinx/bin/phinx rollback"

migrate-create:
	$(MAKE) app-php-cli-exec cmd="vendor/robmorgan/phinx/bin/phinx create $(name)"
	@$(MAKE) chown

#рекурсивное изменение доступа ко всему проекту
chown:
	@$(MAKE) app-php-cli-exec cmd="chown -R 1000:1000 ./"

#вызов производить в формате make run-calculate arguments="700 300"
run-calculate:
	$(MAKE) app-php-cli-exec cmd="./bin calculator:calculate-modes $(arguments)"

test:
	$(MAKE) app-php-cli-exec cmd="vendor/bin/codecept run unit"

wait-db:
	@$(MAKE) app-php-cli-exec cmd="./docker/common/wait-for $(DOCKER_SERVICE_DB):3306 -t 650"
