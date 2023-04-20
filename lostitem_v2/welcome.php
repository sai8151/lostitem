<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

if(isset($_POST['itemlost']))
{
  header("location: itemlost.php");
}
if(isset($_POST['itemfound'])) 
{
  header("location: itemfound.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
<style>

</style>

    <title>PHP login system!</title>
      <div class="set">
      <div id="login"><a href=""><h4 id="fnt">Reload</h4></a></div>
            <div id="drag"><a href=logout.php><h3 id="fnt">logout</h3></a></div>            
            <div id="post"><a href=login.php><h3 id="fnt">Login</h3></a></div>
            <div id="hunt"><a href=register.php><h3 id="fnt">Register</h3></a></div>
            <div id="drag"><a href=adminlogin.php><h3 id="fnt">admin</h3></a></div>
            <div id="drag"><a href=itemfound.php><h3 id="fnt">Item found</h3></a></div>
            <div id="drag"><a href=itemlost.php><h3 id="fnt">Item lost</h3></a></div>
            <div id="chat"><a href=welcome.php><h3 id="fnt">Home</h3></a></div>
         
          </div>
  </head>
  <body>
<div class="">
<h3><?php echo "Welcome ". $_SESSION['username']?></h3>

<form method="post">
<div class="col-md-12 text-center">
        <input type="submit" id="form-submit-button" name="itemfound" class="btn btn-primary"
                value="ITEMFOUND"/>          
        <input type="submit" id="form-submit-button" name="itemlost" class="btn btn-primary"
                value="ITEMLOST"/>
</div>
    </form>
  </body>
</html>
