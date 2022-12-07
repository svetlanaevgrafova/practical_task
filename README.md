# practical_task
Practical task for training at the Simtech school.
Описание приложения
Приложение состоит из:
  1. Страницы формы соискателей, которые заполняют ее своими данными, прикрепляют файл-резюме. Поля формы валидированы, поэтому соискатель не сможет отправить форму с пустым полем.
  При отправке формы на почтовый адрес администратора направляется письмо с данными нового соискателя.
  2. Страница результатов с постраничной навигацией, возможностью скачать файл соискателя


Использование приложения.
1. Введите свои данные в файле config.php:
  1. $servername = "127.0.0.1";
  2. $username = "имя_пользователя";
  3. $db_password = "пароль";
2. Запустите файл setup.php, чтобы создать базу данных practical_task_evgrafova и таблицу applicants, а также заполнить ее тестовыми пользователями.
3. Вы можете увидеть форму связи, перейдя по ссылке http://введите_ваш_хост/index-contact-form.php
4. Вы можете увидеть страницу со списком результатов, перейдя по ссылке http://введите_ваш_хост/index-applicants.php


Инструкция. 
Подготовка окружения.
1. У вас должно быть настроено ваше окружение: сервер mysqlDB, веб сервер apache2, интерпретатор языка php с версией не выше 8.0
2. Для поддержки загрузки файлов:
  1. cd /etc/php/выберите_свою_версию_php/apache2/php.ini изменим конфигурацию :
    1. upload_max_filesize = 10M
    2. file_uploads = On (если не установлено)
    3. post_max_size = 10M
  2. перезагрузите apache2: для ubuntu: sudo systemctl reload apache2

Настроим окружение linux ubuntu для отправки почты
1. Создадим 2 тестовых почтовых ящика на рамблере и разрешим получение писем для сторонних сайтов во вкладке программы:
  1. логин practicaltaskevgrafova2@rambler.ru 
  пароль PracticalTaskEvgrafova2
  2. логин practicaltaskevgrafova@rambler.ru 
  пароль PracticalTaskEvgrafova1
2. sudo apt-get install msmtp установим пакет msmtp и 
sudo nano /etc/msmtprc создадим файл конфигурации
3. запишем в него посту пользователя,ее пароль и почту кому будем отправлять: 
    defaults

    tls on

    tls_starttls on

    tls_trust_file /etc/ssl/certs/ca-certificates.crt

    tls_certcheck off

    protocol smtp

    account default

    host smtp.rambler.ru

    port 587

    auth on

    user practicaltaskevgrafova2@rambler.ru

    password PracticalTaskEvgrafova2

    from practicaltaskevgrafova2@rambler.ru
4. sudo chown minada /etc/msmtprc установим владельца
5. sudo chmod 0600 /etc/msmtprc установим права владения
6. в /etc/php/выберите_свою_версию_php/apache2/php.ini  и 
/etc/php/выберите_свою_версию_php/cli/php.ini изменим для работы через апач и через консоль соответственно:
    SMTP=smtp.rambler.ru

    smtp_port=587

    sendmail_path = "/usr/bin/msmtp -t -i"
7. sudo systemctl reload apache2
