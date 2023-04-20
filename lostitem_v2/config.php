<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','id19960123_phpuser');
define('DB_PASSWORD','8151968602@Sai');
define('DB_NAME','id19960123_loginphp');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($conn == false)
{
    dir('Error: Cannot Connect');
}
?>
</html>
<link rel="stylesheet" href="style.css">
   <div class="set">
      <div id="login"><a href=""><h4 id="fnt">Reload</h4></a></div>
            <div id="drag"><a href=logout.php><h3 id="fnt">logout</h3></a></div>            
            <div id="post"><a href=login.php><h3 id="fnt">Login</h3></a></div>
            <div id="hunt"><a href=register.php><h3 id="fnt">Register</h3></a></div>
            <div id="drag"><a href=adminlogin.php><h3 id="fnt">admin</h3></a></div>
            <div id="drag"><a href=itemfound.php><h3 id="fnt">Item found</h3></a></div>
            <div id="drag"><a href=itemlost.php><h3 id="fnt">Item lost</h3></a></div>
            <div id="chat"><a href=welcome.php><h3 id="fnt">Home</h3></a></div>
         
          </div></html>