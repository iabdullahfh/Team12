<?php

if (isset($_POST['signup-submit'])) {

  require 'db.inc.php';


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['pwd'];
$repeatPassword = $_POST['pwd-repeat'];



// check empty fields, send user back to signup
if(empty($username) || empty($email) || empty($password) || empty($repeatPassword)) {

  header("Location: ../signup.php?error=emptyfields&username=".$username."&email=".$email);
  exit();
}

// check email format
elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {

  header("Location: ../signup.php?error=invalidemail&username=".$username);
  exit();
}

// check username format
elseif (!preg_match("/^[A-Za-z0-9_-]{3,15}$/",$username)) {

  header("Location: ../signup.php?error=invalidusername&email=".$email);
  exit();
}

// check password
else if ($password !== $repeatPassword) {

  header("Location: ../signup.php?error=passwordcheck&username=".$username."&email=".$email);
  exit();
}

else {

  $sql = "SELECT Username FROM users WHERE Username=?";
  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt,$sql)) {

    header("Location: ../signup.php?error=sqlerror1");
    exit();
  }
  else {

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $resultCheck = mysqli_stmt_num_rows($stmt);

    if ($resultCheck > 0) {

      header("Location: ../signup.php?error=usertaken&email=".$email);
      exit();
    }
    else {

      $sql = "INSERT INTO users (Username, Pwd ,EmailAddress, Type) VALUES(?, ?, ?, 0)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {

        header("Location: ../signup.php?error=sqlerror2");
        exit();
      }
      else {

        $hashPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $username, $hashPwd, $email);
        mysqli_stmt_execute($stmt);
        header("Location: ../login.php?signup=success");
        exit();
      }
    }
  }
}
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

}
else {

  header("Location: ../signup.php");
  exit();
}


?>
