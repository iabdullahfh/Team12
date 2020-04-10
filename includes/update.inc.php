<?php

require 'db.inc.php';

if (isset($_POST['details-btn'])) {
    
    $currentUsername = $_SESSION['Username'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];

    if(empty($username) || empty($email)){
        header("Location: ../account.php?account=details&error=emptyfields");
        exit();
    }
    // check username format
    elseif (!preg_match("/^[A-Za-z0-9_-]{3,15}$/",$username)) {

    header("Location: ../account.php?account=details&error=invalidusername");
    exit();
    }
    // check email format
    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {

        header("Location: ../account.php?account=details&error=invalidemail");
        exit();
    }
    else{

        $sql = $conn->prepare("UPDATE users SET Username =? WHERE UserID=".$_SESSION['UserID'])."";
        $sql->bind_param('s',$username);
        $sql->execute();

        if ($sql->error) {
                header("Location: ../account.php?error=sql");
                exit();
            }
            else{
                header("Location: ../account.php?update=success");
                exit();
            } 
    }

}