<?php
// $password = password_hash(trim($_REQUEST['password']));
error_reporting(-1);
ini_set('display_errors', 'On');
  
$servername = "localhost";
$username = "minada";
$db_password = "fktrctqr";
$db = "practical_task_evgrafova";

// Create connection
$mysqli = mysqli_connect($servername, $username, $db_password, $db);
 
// Check connection
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}


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
$amount_applicants = mysqli_query($mysqli, $count_sql);
// Получаем результат
$total_rows = mysqli_fetch_array($amount_applicants)[0];
// Вычисляем количество страниц
$total_pages = ceil($total_rows / $size_page);
// Создаём SQL запрос для получения данных
$sql = "SELECT * FROM applicants LIMIT $offset, $size_page";
// Отправляем SQL запрос
$res_data = mysqli_query($mysqli, $sql);
// Цикл для вывода строк
while($row = mysqli_fetch_array($res_data, MYSQLI_ASSOC)){
  // Выводим логин пользователя
  $applicants[] = $row;
  
}
require 'page-applicants.html';


