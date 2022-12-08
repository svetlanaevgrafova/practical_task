<?php
require "connect-select-db.php";
require "test-input.php";
// debug
// error_reporting(-1);
// ini_set('display_errors', 'On');
 
// Переменные для Валидации
$first_name_err = $last_name_err = $email_err = $gender_err = $profession_err = $agreement_err = '';
$first_name = $last_name = $email = $gender = $profession = $agreement = '';
$first_name_class = $first_name_div_class = $last_name_class = $last_name_div_class = '';
$email_class = $email_div_class = $profession_class = $profession_div_class = $gender_class = $gender_div_class = '';
$check_validation = true;

// POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  // Валидация полей формы
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["first_name"])) {
      $check_validation = false;
      $first_name_err = "Введите имя";
      $first_name_class = 'is-invalid';
      $first_name_div_class = 'invalid-feedback';
    } else {
      $first_name = test_input($_POST["first_name"]);
      $first_name_class = 'is-valid';
      $first_name_div_class = 'valid-feedback';
      if (!preg_match("/^[a-яA-Я ]*$/",$first_name)) {
        $check_validation = false;
        $first_name_err = "Разрешены только буквы и пробелы";
        $first_name_class = 'is-invalid';
        $first_name_div_class = 'invalid-feedback';
      }
    }

    if (empty($_POST["last_name"])) {
      $check_validation = false;
      $last_name_err = "Введите фамилию";
      $last_name_class = 'is-invalid';
      $last_name_div_class = 'invalid-feedback';
    } else {
      $last_name = test_input($_POST["last_name"]);
      $last_name_class = 'is-valid';
      $last_name_div_class = 'valid-feedback';
      if (!preg_match("/^[a-яA-Я ]*$/",$last_name)) {
        $check_validation = false;
        $last_name_err = "Разрешены только буквы и пробелы";
        $last_name_class = 'is-invalid';
        $last_name_div_class = 'invalid-feedback';
      }
    }

    if (empty($_POST["email"])){
      $check_validation = false;
      $email_err = "Введите Email";
      $email_class = "is-invalid";
      $email_div_class = "invalid-feedback";
    } else {
      $email = test_input($_POST["email"]);
      $email_class = "is-valid";
      $email_div_class = "valid-feedback";
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $check_validation = false;
        $email_err = "Неверный формат электронной почты";
        $email_class = "is-invalid";
        $email_div_class = "invalid-feedback";
      }
    }

    if (empty($_POST["gender"])){
      $check_validation = false;
      $gender_err = "Выберите пол";
      $gender_class = "is-invalid";
      $gender_div_class = "invalid-feedback";
    } else {
      $gender = test_input($_POST["gender"]);
      $gender_class = "is-valid";
      $gender_div_class = "valid-feedback";
    }

    if (empty($_POST["profession"])) {
      $check_validation = false;
      $profession_err = "Выберите профессию";
      $profession_class = 'is-invalid';
      $profession_div_class = 'invalid-feedback';
    } else {
      $profession = test_input($_POST["profession"]);
      $profession_class = 'is-valid';
      $profession_div_class = 'valid-feedback';
    }

    if (empty($_POST["agreement"])) {
      $check_validation = false;
      $agreement_err = "Согласие обязательно";
    } else{
      $agreement = test_input($_POST["agreement"]);
    }
  }

  
  
  if ($check_validation == true) {
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

    if ($user_is_created = $link->query($query)) {
    } else {
      echo("Error description: " . $link -> error);
    }

    // Узнать id последнего сохраненного пользователя
    $last_id=$link->insert_id;
    
    // Создать директорию applicants
    $dir = "upload/applicants{$last_id}"; 
    if(!is_dir($dir)) {
      mkdir($dir, 0777, true);
    }

    // Загрузить файл
    if ($_FILES && $_FILES["filename"]["error"]== UPLOAD_ERR_OK){
      $path_file = "{$dir}/" . $_FILES["filename"]["name"];
      move_uploaded_file($_FILES["filename"]["tmp_name"], $path_file);

      // Обновить applicants(file)  
      $sql = "UPDATE applicants SET file = '{$path_file}' WHERE applicants.id = {$last_id}";

      if (mysqli_query($link, $sql)) {
      } else {
        echo "ERROR: Could not able to execute $sql." . mysqli_error($link);
      }
    }

    // Отправка почты
    $to  = $recipient_email;
    $subject = 'Added new applicants';
    $message = "Добавлен новый соискатель! <br> Имя: {$first_name} <br> Фамилия: $last_name <br> Email: $email <br> Профессия: $profession \r\n";
    $headers = implode("\r\n", ["MIME-Version: 1.0", "Content-type: text/html; charset=utf-8"]);;

    if (mail($to, $subject, $message, $headers)) {
      // echo "Электронное письмо успешно отправлено. \r\n";
    } else {
      // echo "Электронное письмо не отправлено. <br />";
  
    }

  }
}
require 'page-contact-form.html';

exit;
