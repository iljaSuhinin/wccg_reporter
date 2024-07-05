Установка:
1) Склонировать пакет в дирректорию проекта
git clone git@gitlab.com:sip-projects/wccg_reporter.git packages/Reporter

2) Добавить в composer.json 
"repositories": [
    {
        "type": "path",
        "url": "./packages/Reporter"
    }
],

3) установить пакет
composer require packages/reporter:dev-master

4) установить конфиг
php artisan vendor:publish --tag=reporter 

5) конфигурация config/reporter.php:
наполнить массив reporters, классами реализующими интерфейс Packages\Reporter\Model\Reporter
'reporters' => [
    TasksCountReporter::class,
    TasksCountReporter2::class,
]

6) Добавить токен в .env
REPORTER_TOKEN=<your_token>

7) GET|POST /api/reporter?token=<your_token>
пример вызова:
http://joxi.ru/ZrJKn7GIevvaWm
