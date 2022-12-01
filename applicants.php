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

// GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $list_of_applicants = $mysqli->query("SELECT * FROM applicants");

  while($result = mysqli_fetch_array($list_of_applicants, MYSQLI_ASSOC)) {
    $applicants[] = $result;
  }
}
require 'applicants.html';

exit;
