<?php 
session_start();

if(!isset( $_SESSION['loggedin']))
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

#error_reporting(0);
#ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html>
<head>
    <style>

    </style>
    <title></title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="container">
        <br>
        <div class="table-responsive">
        
        <table class="table table-bordered table-hover text-center" style="position:absolute;max-width:90%;top:1rem;">
          <thead>
             <th>user number</th>
            <th> Item Picture </th>
            <th> Location</th>
            <th> Category</th>
            <th> Description</th>
            <?php
                require_once "config.php";
                $con = mysqli_connect('localhost','id19960123_phpuser','8151968602@Sai');
                mysqli_select_db($con,'id19960123_loginphp');

                $displayquery = "SELECT 'id',`Address`, `Category`, `Img`, `Description` , `user_id` FROM `img_upload`";
                $querydisplay = mysqli_query($con,$displayquery);

                //$row = mysqli_num_rows($displayquery);
                
                while($result = mysqli_fetch_array($querydisplay))
                {
                  
                  ?>

                  <tr>
                      <td> <?php echo "\tfrom user : "; echo $result['user_id']; ?> </td>
                      <td> <img src ="<?php echo $result['Img']; ?>" height="120px" width="200px"> </td>
                      <td><?php echo $result['Address'];  ?>  </td>
                      <td><?php echo $result['Category'];  ?>  </td>
                      <td><?php echo $result['Description'];  ?>  </td>
                      
                     <td>  <?php 
                     if($_SESSION['username']=="db_vaecontech"){
                        $temp=$result['id'];
                        if(isset($_POST['delete_btn'])) {
    
                            $displayquery = "DELETE FROM `img_upload` WHERE 'id' = $temp";
                            $querydisplay = mysqli_query($con,$displayquery);
                                                    }
                         ?>
                         <form method="post">
                             
                    <input type="submit" id="form-submit-button" name="delete_btn" class="btn btn-primary"value="DELETE"/>
                    
                    </form>
                    <?php 
                }
                ?></td>
                
                </tr>

                  <?php

                
              }

                ?>


          </thead>
        </table>
    </div>
</body>

</html>