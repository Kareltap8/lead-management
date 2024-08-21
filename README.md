Проект "Lead Menegement"

Инструкция по развёртыванию

Установка:
1) Клонируйте репозиторий:
    git clone https://github.com/Kareltap8/lead-management.git
2) Перейдите в папку проекта:
    cd lead_management
3) Установите зависимости:
    composer install
4) В файле .env изменить настройки для вашей базы данных:
    DB_CONNECTION=mysql
    DB_HOST=хост бд
    DB_PORT=порт бд
    DB_DATABASE=название бд
    DB_USERNAME=имя пользователя бд
    DB_PASSWORD=пароль 
5) Выполните миграцию в командной строке:
    php artisan migrate
6) В файле .env изменить настройки для вашего почтового сервиса. Пример для почтового сервиса Gmail:
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=адрес электронной почты
    MAIL_PASSWORD=пароль от учётной записи
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=адрес электронной почты #должен совпадать с MAIL_USERNAME
    MAIL_FROM_NAME="${APP_NAME}"
    В качестве пароля использовать сгенерированный пароль для приложения. Его можно создать в аккаунте Google в разделе "Безопасность"->"Пароли приложений". Пароль прописать в строку MAIL_PASSWORD= без пробелов.
7) Запустите сервер:
    php artisan serve

Теперь вы можете перейти по адресу http://localhost:8000, чтобы начать использовать приложение.