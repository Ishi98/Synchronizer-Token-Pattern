<?php
session_start();
$r=session_id();

if (isset($_POST['username']) && isset($_POST['password'])){
    if($_POST['username'] == "admin" && $_POST['password']=="admin"){
        $_SESSION['ssdUsr']=$_POST['username'];
        $r=session_id();
        setcookie("CSRF-Token", $r, time() + (86400 * 0.5), "/"); 
        header('Location: result.php');
        exit();
    }else { ?>
                <div class="alert alert-warning alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> Incorrect Username and Password !
                </div>
            <?php }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Cross Site Request Forgery Protection</title>
  </head>
  <body>
    <?php if (!isset($_COOKIE['CSRF-Token'])){ ?>
    <center><h1>Synchronizer Token Pattern </h1></center>
        <div class="login-form">
            <form action="" method="post">

                <div class="form-group">
                                <label for="username" class="text-white">Username:</label><br>
                <input id="ssd-username" type="text" class="form-control" name="username" value="" placeholder="Username" required>
                </div>
                <div class="form-group">
                                <label for="password" class="text-white">Password:</label><br>
                    <input id= "ssd-password" type="password" class="form-control" name =" password" value="" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Log in</button>
                </div> 
            </form>
        </div>
    <?php } else{  ?>
        <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong> Wait a second !
                </div>
        <?php header('Location: result.php'); }
    ?>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html> 
