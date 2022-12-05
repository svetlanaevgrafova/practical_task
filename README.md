# practical_task
Practical task for training at the Simtech school.

Инструкция. 
Подготовка окружения.
1. У вас должно быть настроено ваше окружение: сервер myDB, веб сервер apache2, интерпретатор языка php с версией не выше 8.0
2. Для поддержки загрузки файлов:
  1. cd /etc/php/выберите_свою_версию_php/apache2/php.ini изменим конфигурацию :
    1. upload_max_filesize = 10M
    2. file_uploads = On (если не установлено)
    3. post_max_size = 10M
  2. перезагрузите apache2: для ubuntu: sudo systemctl reload apache2

Использование приложения.
1. Введите свои данные в файле config.php:
  1. $servername = "127.0.0.1";
  2. $username = "имя_пользователя";
  3. $db_password = "пароль";
2. Запустите файл setup.php, чтобы создать базу данных practical_task_evgrafova и таблицу applicants, а также заполнить ее тестовыми пользователями.
3. Вы можете увидеть форму связи, перейдя по ссылке http://введите_ваш_хост/index-contact-form.php
4. Вы можете увидеть страницу со списком результатов, перейдя по ссылке http://введите_ваш_хост/index-applicants.php