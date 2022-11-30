<?php
include_once("connect.php");

$select_db = "USE practical_task_evgrafova";

if (mysqli_query($link, $select_db)) {
    echo "Database selected successfully.";
} else {
    echo "ERROR: Could not able to execute $select_db. " . mysqli_error($link);
}
// Attempt create table query execution
$sql = "CREATE TABLE applicants(
    id INT(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    gender VARCHAR(10) NOT NULL,
    profession VARCHAR(70) NOT NULL,
    description TEXT(200),
    resume TEXT(200),
    agreement BOOLEAN NOT NULL
  )
";
if (mysqli_query($link, $sql)) {
    echo "Table created successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>