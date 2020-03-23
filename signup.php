<?php include 'Header.php' ?>
<head>
  <meta charset="utf-8">
  <title>Sign up</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/signup.css">

</head>

<main>
<script type="text/javascript">

function validateForm(){

/*
  if (document.signup.uid.value == "") {

    document.getElementById("uidlable").innerHTML = "Please provide your username";
    document.signup.uid.focus();
    return false;
  }
  */
  return (true);
}

</script>

<div class="main">

  <div class="signup">

    <h2>Sign up</h2>
    <form action="includes/signup.inc.php" name="signup" method="post" onsubmit="return(validateForm());">

      <label id="uidlable"></label>
      <input type="text" name="uid" placeholder="Username" value="<?php echo $_GET["uid"]; ?>"><br>
      <input type="text" name="email" placeholder="E-mail" value="<?php echo $_GET["email"]; ?>"><br>
      <input type="password" name="pwd" placeholder="Password"><br>
      <input type="password" name="pwd-repeat" placeholder="Repeat password"><br>
      <button type="submit" name="signup-submit">Sign up</button>


    </form>

  </div>

</div>



  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</main>
<!-- footer page -->
<?php include 'footer.html' ?>
