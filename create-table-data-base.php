<?php
include_once("connect-select-db.php");

// Attempt create table query execution
$sql = "CREATE TABLE applicants(
    id INT(8) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    gender VARCHAR(10) NOT NULL,
    profession VARCHAR(70) NOT NULL,
    description TEXT(200),
    file TEXT(200),
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