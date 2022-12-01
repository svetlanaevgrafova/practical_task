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
  $resume = trim($_REQUEST['resume']);
  $agreement = trim($_REQUEST['agreement']) == "on";
  

  $query = "INSERT INTO applicants (first_name, last_name, email, gender, profession, description, resume, agreement) 
  VALUES ('$first_name', '$last_name', '$email', '$gender', '$profession', '$description', '$resume', '$agreement')";

  if ($user_is_created = $mysqli->query($query)) {
  } else {
    echo("Error description: " . $mysqli -> error);
  }

// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";

// echo "<pre>";
// print_r($mysqli);
// echo "</pre>";

// echo "<pre>";
// print_r($query);
// echo "</pre>";

}
// $list_of_users = $mysqli->query("SELECT * FROM users");

// while($result = mysqli_fetch_array($list_of_users, MYSQLI_ASSOC)) {
//   $users[] = $result;
// }

require 'index.html';

exit;
