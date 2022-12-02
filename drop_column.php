<?php

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

/*DELETE COLUMN*/


$drop_column = "ALTER TABLE applicants
  DROP COLUMN resume
";

if (mysqli_query($mysqli, $drop_column)) {
  echo "Column deleted successfully." . "<br>";
} else {
  echo "ERROR: Could not able to execute $drop_column." . mysqli_error($link);
  die;
}

// Close connection
mysqli_close($mysqli);