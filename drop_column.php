<?php
require "connect-select-db.php";


/*DELETE COLUMN*/
$drop_column = "ALTER TABLE applicants
  DROP COLUMN resume
";

if (mysqli_query($link, $drop_column)) {
  echo "Column deleted successfully." . "<br>";
} else {
  echo "ERROR: Could not able to execute $drop_column." . mysqli_error($link);
  die;
}

// Close connection
mysqli_close($link);