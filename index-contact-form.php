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



// Переменнная для определения пути, с которого мы попали на страницу

// POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  // declare variables from query

  $first_name = trim($_REQUEST['first_name']);
  $last_name = trim($_REQUEST['last_name']);
  $email = trim($_REQUEST['email']);
  $gender = trim($_REQUEST['gender']);
  $profession = trim($_REQUEST['profession']);
  $description = trim($_REQUEST['description']);
  $agreement = trim($_REQUEST['agreement']) == "on";

  // сохранить в db
  $query = "INSERT INTO applicants (first_name, last_name, email, gender, profession, description, agreement) 
  VALUES ('$first_name', '$last_name', '$email', '$gender', '$profession', '$description', '$agreement')";

  if ($user_is_created = $mysqli->query($query)) {
  } else {
    echo("Error description: " . $mysqli -> error);
  }

  // Узнать id последнего сохраненного пользователя
  $last_id=$mysqli->insert_id;
  
  // Создать директорию applicants
  $dir = "upload/applicants{$last_id}"; 
  if(!is_dir($dir)) {
    mkdir($dir, 0777, true);
  }

  // Загрузить файл
  $path_file = NULL;
  if ($_FILES && $_FILES["filename"]["error"]== UPLOAD_ERR_OK){
    $path_file = "{$dir}/" . $_FILES["filename"]["name"];
    move_uploaded_file($_FILES["filename"]["tmp_name"], $path_file);
  }

  // Обновить applicants(file)  

  // UPDATE `applicants` SET `file` = 'upload/applicants19/ozero-gory-kamni-ogon-koster.png' WHERE `applicants`.`id` = 18
  $sql = "UPDATE applicants SET file = '{$path_file}' WHERE applicants.id = {$last_id}";

  if (mysqli_query($mysqli, $sql)) {
  } else {
    echo "ERROR: Could not able to execute $sql." . mysqli_error($mysqli);
  }
}
require 'page-contact-form.html';

exit;
