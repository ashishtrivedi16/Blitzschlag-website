<?php

if(isset($_GET['passkey'])){
  session_start();
  $_SESSION['id']=session_id();
  include('mydbconnect.php');

$passkey=$_GET['passkey'];

$sql="UPDATE registration SET status=1 WHERE confirm_code='$passkey'";
$result=mysqli_query($conn,$sql);

// If successfully queried
if($result){
  $sql1 = "SELECT id,email from registration where confirm_code='$passkey'";
  $result1 = mysqli_query($conn,$sql1);

  if ($result1 === false)
      die("Server Overloaded. Please try after sometime.");

  if(mysqli_num_rows($result1) == 1){
  $row = mysqli_fetch_array($result1);
  $reg_id=$row['id'];
  $email=$row['email'];
  }
  else {
    echo "<h1>Unauthorised Access</h1>";
    echo "<title>Blitzschlag'17</title>redirecting to main page..";
    echo "<meta http-equiv=\"refresh\" content=\"4;url=http://www.blitzschlag.org/\" />";
    exit;
  }

  $_SESSION['email']=$email;

     $host = $_SERVER["HTTP_HOST"];
         $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
          //echo $reg_id;
        // echo $email;
         header("Location: http://$host$path/registered.php?id=$reg_id");
           exit;
}
else {
echo "Wrong Confirmation code";
}



}
else {

echo "<title>Blitzschlag'17</title><h1>Error 404</h1>redirecting to main page..";
echo "<meta http-equiv=\"refresh\" content=\"4;url=http://www.blitzschlag.org/\" />";

}
?>
