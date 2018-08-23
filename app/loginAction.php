<?php session_start();
include('./config/db.php');

$token =  password_hash($_POST['username'], PASSWORD_DEFAULT);
$_SESSION['token'] = $token;
if(isset($_POST['submit']))
{
  
  $_SESSION['error'] = "";
 if($_POST['username'] == '' || $_POST['password'] == '')
 {
  $_SESSION['error'] = "Please enter username or password<br>";
 }
 else
 {
  $u=$_POST['username'];
  $p=$_POST['password'];  

  
  $qr=mysqli_query($conn, "select * from users where username='$u' and password='".md5($p)."'");
  
  if(mysqli_num_rows($qr) == 0)
  {
    $_SESSION['error'] = "Username or password is not correct, please try again";
  }
  else
  {
    $_SESSION['loginStatus'] = 1;
    

    // $row = mysqli_fetch_array($qr);
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    

    if(isset($_POST['remember']))
    { 
      setcookie("remember", $_SESSION['remember'], time()+(86400));
      setcookie("remember_name", $_POST['username'], time()+(86400));
      setcookie("token", $_SESSION['token'], time()+(86400));
      
    }
    else
    {
      if(isset($_COOKIE['member_name']))
      {
        setcookie("member_name","");
      }
      if(isset($_COOKIE['member_pass']))
      {
        setcookie("member_pass","");
      }
    }
    
    header('location: index.php');
    
    // $insert = "insert into users (token) values ('$token')";
    $que = mysqli_query($conn,"update users set token='$token' where username='$u'");
    $select = mysqli_query($conn,"select * from users where token='$token' and username='$u'");

    // var_dump($select);
  }
 }
}



?>