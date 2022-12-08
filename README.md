
# Practical task for training at the Simtech school.

## Описание приложения

### Приложение состоит из:
1. Страницы c формой-связи для соискателей, которые заполняют ее своими данными, прикрепляют файл-резюме. 
2. Страница результатов с постраничной навигацией, возможностью скачать файл соискателя. 

## Использование приложения:
1. http://введите_ваш_хост/index-contact-form.php Вводим URL в браузере и попадаем на страницу-вакансию заглушку сайта компании.
  - Видим возможные вакансии, выбираем интересующую нас и заполняем форму:
  - Обязательные поля формы валидированы, поэтому соискатель не сможет отправить форму с пустым или некорректным полем. Его перенаправит на эту же страницу с сообщением об ошибке в заполнении.
  - Форма адаптирована под разные размеры экрана.
  - При успешной отправке соискатель увидит эту страницу без формы с выводом сообщения об отправленной заявке. Данные сохранятся в базе данных, а на почтовый адрес администратора направляется письмо-уведомление с данными о добавлении нового соискателя. 
  - Пользователи не могут через браузер зайти в папку на сервере и посмотреть файлы других соискателей. В этом случае их перенаправит на страницу с ошибкой 403, с которой по ссылке можно вернуться на основную страницу формы.
2. http://введите_ваш_хост/index-applicants.php Вводим URL в браузере и попадаем на страницу-результатов. Здесь находится таблица с соискателями с постраничной навигацией и возможностью скачивания файла-резюме. 

 
## Сборка
1. Ubuntu 20.04.5 LTS
2. PHP 8.0.25
3. Apache/2.4.41 (Ubuntu)
4. mysql  Ver 15.1 Distrib 10.3.37-MariaDB, for debian-linux-gnu
5. msmtp version 1.8.6 


## Инструкция

### Подготовка приложения
1. Введите свои данные для СУБД mysql в файле config.php:

```
  $servername = "127.0.0.1";
  $username = "имя_пользователя";
  $db_password = "пароль";
```
2. Запустите файл setup.php, чтобы создать базу данных practical_task_evgrafova и таблицу applicants, а также заполнить ее тестовыми пользователями.
3. Вы можете увидеть форму связи, перейдя по ссылке http://введите_ваш_хост/index-contact-form.php
4. Вы можете увидеть страницу со списком результатов, перейдя по ссылке http://введите_ваш_хост/index-applicants.php

### Подготовка окружения

У вас должно быть настроено ваше окружение: сервер mysqlDB, веб сервер apache2, интерпретатор языка php с версией не выше 8.0.

Проверьте, что apache2 имеет права на запись на папку upload.
#### Для поддержки загрузки файлов:
  - изменим конфигурацию php.ini по пути /etc/php/выберите_свою_версию_php/apache2/ :
  
  ``` 
    upload_max_filesize = 10M
    file_uploads = On
    post_max_size = 10M
  ```
  - перезагрузите apache2: для ubuntu: ```sudo systemctl reload apache2```

#### Настроим окружение linux ubuntu для отправки почты
1. Создадим 2 тестовых почтовых ящика на рамблере и разрешим получение писем для сторонних сайтов во вкладке программы:

  - для отправителя ```логин practicaltaskevgrafova2@rambler.ru пароль PracticalTaskEvgrafova2```
  - для получателя ```логин practicaltaskevgrafova@rambler.ru пароль PracticalTaskEvgrafova1```
2. ```sudo apt-get install msmtp``` установим пакет msmtp 
3. ```sudo nano /etc/msmtprc``` создадим файл конфигурации
4. запишем в него почту пользователя,ее пароль и почту кому будем отправлять: 
    ```
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
    ```
5. ```sudo chown minada /etc/msmtprc``` установим владельца
6. ```sudo chmod 0600 /etc/msmtprc``` установим права владения
7. в ```/etc/php/выберите_свою_версию_php/apache2/php.ini``` и ```/etc/php/выберите_свою_версию_php/cli/php.ini``` изменим для работы через апач и через консоль соответственно:
  ```
    SMTP=smtp.rambler.ru
    smtp_port=587
    sendmail_path = "/usr/bin/msmtp -t -i"
  ```
8. перезапустим apache2 ```sudo systemctl reload apache2```
