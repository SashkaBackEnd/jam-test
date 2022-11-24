
## Установка проекта с нуля

Переименовать `.env.example` в `.env`.
Использовать скрипт: `project-install.sh`
Скрипт запускать root директории проекта.
Команда для запуска: `bash project-install.sh`

ALERT: Если у вас windows и получаете ошибку "the input device is not a TTY.
If you are using mintty, try prefixing the command with 'winpty'".
В таком случае выполните команду: `alias docker="winpty docker"`

## Обновление проекта

Использовать скрипт: `project-update.sh`

## Обязательно запускать линтеры и тесты перед git push

Запуск тестов: `vendor/bin/codecept run`
Проверка кодстайла: `vendor/bin/phpcs . --report=xml --report-file=phpcs-report.xml`

### Запуск psalm (в разработке)

`vendor/bin/psalm --report=psalm-checkstyle.xml`

### Запуск grumphp
Cоздание базового файла конфигурации:
`php vendor/bin/grumphp configure`