<?php
// Connect db
$link = mysqli_connect("127.0.0.1", "minada", "fktrctqr");

if ($link === false) {
    die("Ошибка: Не можем подключиться. " . mysqli_connect_error());
}
