# Changelog

В этом файле ведется учет изменений проекта

Формат основан на [стандарте формата CHANGELOG](https://keepachangelog.com/en/1.0.0/),
и придерживается [правил версионирования](https://semver.org/spec/v2.0.0.html).

## [ [0.6.0](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.6.0) ] - 22.03.2024
- Реализовано:
  - Подключен фреймворк

## [ [0.5.5](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.5.5) ] - 20.03.2024
- Реализовано:
  - Реализовал Error Handlers 
- Изменено:
  - Изменил чейнжлог 
  - Изменил валидацию
- Исправлено:
  - Исправил форматирование
  - Исправил логику работы с плагинами
  - Исправил Router

## [ [0.5.4](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.5.4) ] - 14.03.2024
- Изменено:
  - Вынес валидацию из middleware в другой класс
- Исправлено
  - Исправил файл web.php
  - Исправил unit тесты для DIContainer
  - Исправил unit тесты для EventDispatcher
  - Убрал статические вызовы классов Render 
- Реализовано:
  - Добавил объект для рендера представлений View 
  - Покрыл EventDispatcher unit тестами 

## [ [0.5.3](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.5.3) ] - 24.02.2024
- Исправлено:
  - Исправил файловую структуру приложения
  - Исправил Handler
- Реализовано:
  - Покрыл DIContainer unit тестами

## [ [0.5.2](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.5.2) ] - 21.02.2024
- Изменено:
  - Убрал излишний метод в middleware
  - Изменил README
  - Изменил .env.dist
- Исправлено:
  - Исправил логирование маршрутов в файл
- Реализовано:
  - Создал таблицу хранения расчетов 

## [ [0.5.1](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.5.1) ] - 20.02.2024
- Изменено:
  - Изменил Dockerfile

## [ [0.5.0](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.5.0) ] - 20.02.2024
- Изменено:
  - Изменил структуру приложения

## [ [0.4.3](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.4.3) ] - 19.02.2024
- Изменено:
  - Изменил использование счетчика на свойство countAttempts
  - Изменил .gitignore
  - Изменил свойства DTO

## [ [0.4.2](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.4.2) ] - 16.02.2024
- Исправлено:
  - Исправил Handler
  - Исправил RoutesCollection
- Изменено:
  - Изменил конфиг для контейнера

## [ [0.4.1](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.4.1) ] - 14.02.2024
- Исправлено:
  - Исправил README
  - Исправил конфиг
  - Исправил форматирование phpdoc
- Изменено:
  - Изменил docker конфигурацию

## [ [0.4.0](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.4.0) ] - 08.02.2024
- Реализовано:
  - Реализовала middleware
- Исправлено:
  - Исправил CHANGELOG
  - Исправила вывод http

## [ [0.3.4](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.3.4) ] - 08.02.2024
- Реализовано:
  - Реализовал middlewares
- Исправлено:
  - Исправил CHANGELOG
  - Исправил README

## [ [0.3.3](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.3.3) ] - 05.02.2024
- Исправлено:
  - Исправил EventDispatcher

## [ [0.3.2](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.3.2) ] - 02.02.2024
- Исправлено:
  - Исправил структуру приложения

## [ [0.3.1](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.3.1) ] - 01.02.2024
- Исправлено:
  - Исправил конфигурацию контейнера
  - Исправил bin

## [ [0.3.0](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.3.0) ] - 28.01.2024
- Реализовано:
  - Реализовал HttpKernel

## [ [0.2.9](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.2.9) ] - 26.01.2024
- Реализовано:
  - Добавил Request
  - Добавил Response
- Исправлено:
  - Исправил контейнер зависимостей

## [ [0.2.8](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.2.8) ] - 23.01.2024
- Исправлено:
  - Исправил EventDispatcher
  - Исправил Handler

## [ [0.2.7](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.2.7) ] - 19.01.2024
- Реализовано:
  - Внедрил логику наблюдателя
  - Добавил enum

## [ [0.2.6](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.2.6) ] - 12.01.2024
- Исправлено:
  - Исправил вывод http/console
  - Исправил EventDispatcher

## [ [0.2.5](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.2.5) ] - 29.12.2023
- Реализовано:
  - Добавил исключения для http
- Исправлено:
  - Исправил bin

## [ [0.2.4](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.2.4) ] - 28.12.2023
- Реализовано:
  - Добавил контейнер зависимостей

## [ [0.2.3](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.2.3) ] - 27.12.2023
- Исправлено:
  - Исправил docker конфигурацию
- Изменено:
  - Изменил composer.json 
  
## [ [0.2.2](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.2.2) ] - 27.12.2023
- Исправлено:
  - Исправил docker конфигурацию

## [ [0.2.1](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.2.1) ] - 27.12.2023
- Исправлено:
  - Исправил структуру проекта
  - Исправил composer.json
  - Исправил DTO

## [ [0.2.0](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.2.0) ] - 21.12.2023
- Реализовано:
  - Добавил docker конфигурацию

## [ [0.1.1](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.1.1) ] - 21.12.2023
- Реализовано:
  - Реализовал стратегии
  - Добавил контроллер
  - Реализовал Handler
- Изменено:
  - Изменил структуру приложения

## [ [0.1.0](https://gitlab-dev.efko.ru/workshop/progers/backend/1-3-0/calculation-mode-generator/-/tags/0.1.0) ] - 20.12.2023
- Реализовано:
  - Добавил CHANGELOG.md
  - Добавил README.md