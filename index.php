<?php


require 'db.php';

  $sql = "SELECT * FROM products";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      echo $row["ProductID"] . ", " . $row["ProductName"] . ", " . $row["Price"] . ", " . $row["Type"];

    }
} else {
    echo "0 results";
}
?>
