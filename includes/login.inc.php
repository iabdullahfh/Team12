<?php

if (isset($_POST['login-submit'])) {

  require 'db.inc.php';

  $username = $_POST['username'];
  $password = $_POST['pwd'];

  if (empty($username) || empty($password)) {

    header("Location: ../login.php?error=emptyfields");
    exit();
  }
  else {

    $sql = "SELECT * FROM users WHERE Username=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: ../login.php?error=sqlerror");
      exit();
    }
    else {

      mysqli_stmt_bind_param($stmt,"s",$username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password,$row['Password']);
        if ($pwdCheck == false) {
          header("Location: ../login.php?error=worngaccess");
          exit();
        }
        else if ($pwdCheck == true) {

          session_start();
          $_SESSION['UserID'] = $row['UserID'];
          $_SESSION['Username'] = $row['Username'];
          $_SESSION['Email'] = $row['EmailAddress'];
          header("Location: ../index.php?login=success");
          exit();
        }
        else {

          header("Location: ../login.php?error=worngaccess");
          exit();
        }
      }
      else {
        header("Location: ../login.php?error=nouser");
        exit();
      }

    }
  }

}
else {

  header("Location: ../login.php?noaccess");
  exit();
}
 ?>
