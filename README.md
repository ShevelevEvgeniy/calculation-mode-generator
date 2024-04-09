# Генератор режимов расчета

Индекс пакета: `CLCMDGNRT`

## Описание

Проект предназначен для апгрейда наших hard skills в соответствии с корпоративными требованиями.

## Ссылки на документацию

- [Правила разработки](https://gitlab.efko.ru/web/dpd/manifest/-/blob/master/src/code-style/php.md)

## Окружение

- Docker 20.x.x
- Docker Compose 1.29.x

### Переменные окружения

|         Параметр          |                         Описание                          |     Default     |
|:-------------------------:|:---------------------------------------------------------:|:---------------:|
|       APP_WEB_PORT        |                     Порт веб-сервера                      |      8181       |
|     PHP_UPSTREAM_PORT     |                       upstream порт                       |      9000       |
|            ENV            |                      Режим окружения                      |   development   |
|        INDEX_NAME         |                      Индекс проекта                       |     calcgen     |
|      DOCKER_REGISTRY      |            Наименование регистра докер-образа             |    localhost    |
| DOCKER_PHP_FPM_IMAGE_NAME |               Наименование докер-образа fpm               |  calc-php-fpm   |
|  DOCKER_NGINX_IMAGE_NAME  |              Наименование докер-образа nginx              |   calc-nginx    |
|   DOCKER_CLI_IMAGE_NAME   |               Наименование докер-образа cli               |  calc-php-cli   |
|   DOCKER_IMAGE_VERSION    |                    Версия докер-образа                    |     latest      |
|        MYSQL_HOST         |                          Хост БД                          | calcgen-mariadb |
|        MYSQL_PORT         |                          Порт БД                          |      3306       |
|      MYSQL_DATABASE       |                      Наименование БД                      |   calcgen-db    |
|        MYSQL_USER         |                   Пользователь БД MySql                   |      user       |
|      MYSQL_PASSWORD       |                 Пароль пользователя MySql                 |     secret      |
|    MYSQL_ROOT_PASSWORD    |             Пароль от root пользователя MySql             |   rootsecret    |

## Установка

**PROJECT**
- Создать новую директорию для проекта. В консоли перейти в созданную директорию и написать:
   `git clone https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator.git`

**DOCKER**

*Сборка:*
- Скопировать файл .env.dist и переименовать в .env, настроить параметры окружения
   `cp .env.dist .env`
- Для разворачивания Генератора режимов расчета, запустите установку, выполнив команду ниже:
   `make install`

*Служебное:*
- `make migration` - Запуск миграций
- `make shell` - Подключение в контейнер с php
- `make test` - Запуск тестов

## Веб-приложение 

- [Генератор режимов расчета](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/)

  - Ветка: `master`
  - Предназначение: основная

  - Ветка: `develop`
  - Предназначение: тестирование нового функционала, знакомство с ситемой

## Дополнительно

- [История изменений](CHANGELOG.md)