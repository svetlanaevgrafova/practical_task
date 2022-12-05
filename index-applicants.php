<?php
require "connect-select-db.php";

// debug
error_reporting(-1);
ini_set('display_errors', 'On');

// create pagination
// Поверка, есть ли GET запрос
if (isset($_GET['page'])) {
  // Если да то переменной $page присваиваем его
  $page = $_GET['page'];
} else { // Иначе
  // Присваиваем $page один
  $page = 1;
}
// Назначаем количество данных на одной странице
$size_page = 5;
// Вычисляем с какого объекта начать выводить
$offset = ($page-1) * $size_page;
// SQL запрос для получения количества элементов
$count_sql = "SELECT COUNT(*) FROM applicants";
// Отправляем запрос для получения количества элементов
$amount_applicants = mysqli_query($link, $count_sql);
// Получаем результат
$total_rows = mysqli_fetch_array($amount_applicants)[0];
// Вычисляем количество страниц
$total_pages = ceil($total_rows / $size_page);
// Создаём SQL запрос для получения данных
$sql = "SELECT * FROM applicants LIMIT $offset, $size_page";
// Отправляем SQL запрос
$res_data = mysqli_query($link, $sql);
// Цикл для вывода строк
while($row = mysqli_fetch_array($res_data, MYSQLI_ASSOC)){
  // Выводим логин пользователя
  $applicants[] = $row;
  
}
require 'page-applicants.html';


