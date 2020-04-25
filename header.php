<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">    

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Header CSS -->
    <link rel="stylesheet" href="css/header.css">  
    
  </head>
  
    <header>

    <?php require 'includes/db.inc.php'; ?>

    <!-- logout Alert! -->
    <script type="text/javascript">

      $(function(){
        $('a#logout').click(function(){

          alert("You have logged out!");

          return true;
        });
      });
    </script>

            <nav class="navbar navbar-expand-lg">
            
                <a class="navbar-brand" href="#"><img src="images/logo_sage.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars text-black"></i>
                </button>
                
                
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    
                       
                    <div class="navbar-nav right">
                        
                    
                        <a class="nav-item nav-link active text-center" href="#">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link text-center" href="#">Features</a>
                        <a class="nav-item nav-link text-center" href="#">Pricing</a>
                        <a class="nav-item nav-link text-center" href="#">Disabled</a>
                        
                        
                    </div>
                  <div class="navbar-nav ml-auto">

                    <?php
                    
                    if (!isset($_SESSION['UserID'])) {
                      echo '<a class="nav-item nav-link text-center" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                          <a class="nav-item nav-link text-center" href="signup.php"><i class="fas fa-user-plus"></i> Register</a>';
                    }
                    else {
                      echo '<a class="nav-item nav-link text-center" href="#"><i class="far fa-user"></i> My Acount</a>
                            <a class="nav-item nav-link text-center" href="includes/logout.inc.php" id="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>';
                    }
                    
                    ?>
                        
                        
                  </div>
                    
                </div>
                


             </nav>  
             
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </header>
  

</html>