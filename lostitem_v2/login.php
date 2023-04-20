<?php
session_start();
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
    exit;
}
require_once "config.php";
$username = $password = "";
$err = "";
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }
}
if(empty($err))
{
    $sql = "SELECT id, username, password FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if(!$stmt) {
        die("Error preparing statement: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    if(mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
            if(mysqli_stmt_fetch($stmt)) {
                if(password_verify($password, $hashed_password)) {
                    $_SESSION["username"] = $username;
                    $_SESSION["id"] = $id;
                    $_SESSION["loggedin"] = true;
                    header("location:welcome.php");
                    exit;
                }
                else {
                    $err = "Invalid login credentials.";
                }
            }
        }
        else {
            $err = "Invalid login credentials.";
        }
    }
    else {
        die("Error executing statement: " . mysqli_stmt_error($stmt));
    }
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
 
</div>

    <title>PHP login system!</title>
  </head>
  <body>

<div class="container mt-4">
<h3>Please Login Here:</h3>
<hr>
<div class="form-group col-md-6">
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  </div>

  <button type="submit" id="form-submit-button" class="btn btn-primary">Submit</button>
</form>
</div>


  </body>
</html>

