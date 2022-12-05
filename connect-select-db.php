<?php
require "connect-data-base.php";

if (mysqli_query($link, $db)) {
} else {
  echo "ERROR: Could not able to execute $db. " . mysqli_error($link);
}