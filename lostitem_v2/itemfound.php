<?php
session_start();
require_once "config.php";
                $con = mysqli_connect('localhost','id19960123_phpuser','8151968602@Sai');
                mysqli_select_db($con,'id19960123_loginphp');
if(isset($_POST['submit']))
{
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $category = $_POST['category'];
    $file = $_FILES['files'];
    $description = $_POST['description'];
    $user_id = $_SESSION['id'];
    $filename = $file['name'];
    $fileerror = $file['error'];
    $filetmp = $file['tmp_name'];

    $fileext = explode('.',$filename);
    $filecheck = strtolower(end($fileext));

    $fileextstored = array('png','jpg','jpeg');

    if(in_array($filecheck,$fileextstored))
    {
        $destinationfile = 'upload/'.$filename;
        move_uploaded_file($filetmp,$destinationfile);

        $q = "INSERT INTO `img_upload` ( `Address`, `state`, `city`, `Category`, `Img`, `Description`, `user_id`) 
        VALUES('$address','$state','$city','$category','$destinationfile','$description','$user_id')";
        
        $query = mysqli_query($con,$q);
    }
}

else{
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

<br>
    <title>Please enter the following details!</title>
  </head>
  <body>
<div class="container mt-4">
<h3>Please enter details Here:</h3>
<hr>
<form action="" method="post" enctype="multipart/form-data">
  
 

<div class="form-group">
    <label for="inputAddress2">Address where the item was found</label>
    <input type="text" class="form-control" name ="address" id="inputAddress2" placeholder="Address">
  </div>
  <div class="form-row">

  <div class="form-group col-md-4">
    <label for="inputState">State</label>
    <input type="text" class="form-control" name ="state" id="state" placeholder="Enter Ctate">
    </div>

    <div class="form-group col-md-4">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name ="city"  id="inputcity" placeholder="Enter City">
    </div>
  </div>

  
  <div action="">
    <label for="inputState">Category</label>
    <select id="inputState" name="category" class="form-control">
    <option selected>Choose...</option>
    <option value="Certificates">Certificates / Id</option>
    <option value="Consumer Electronics">Consumer Electronics</option>
    <option value="Jewellery">Jewellery</option>
    <option value="Keys">Keys</option>
    <option value="Mobile Phone">Mobile Phone</option>    
    <option value="Wallet">Wallet</option>
    <option value="Others">Others</option>

    </div> 

    
  <div class ="form-group">
    <label for="file"> Image </label>
  <input type="file" id="file" name="files" class="form-control">
</div>

    <br>
    <br>
    <div id='wrapper'>
   <div id='inner_div'>Description:</div>
   <textarea placeholder='Type here...' name="description" id="comment-box" cols="80" rows="7"></textarea>
    </div>
    
    <div class="form-group">
    
    </div>

  <button type="submit" id="form-submit-button" name="submit" value="submit" class="btn btn-primary">Submit</button>
</form>
</div>

  </body>
</html>


