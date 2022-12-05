<?php
// Connect db
require "config.php";

$link = mysqli_connect($servername, $username, $db_password);

if ($link === false) {
    die("Ошибка: Не можем подключиться. " . mysqli_connect_error());
}
