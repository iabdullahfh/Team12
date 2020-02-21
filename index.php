<?php

require 'db.php';

  mysqli_connect("localhost", "root", "root") or
      die("Could not connect: " . mysqli_error());
  mysqli_select_db("Feedback");

  $result = mysqli_query("SELECT * FROM products");

  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
      printf ($row["ProductID"]."," . $row["ProductName"] . ", " . $row["Price"] . " " . $row["Type"]);
  }

  mysqli_free_result($result);
?>
