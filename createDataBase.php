<?php
include_once("connectDataBase.php");


$sql = "CREATE DATABASE practical_task_evgrafova CHARACTER SET utf8 COLLATE utf8_general_ci";
if (mysqli_query($link, $sql)) {
    echo "Database created successfully";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);

