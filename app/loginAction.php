<?php session_start();
include('./config/db.php');


$_SESSION['loginStatus'] = "error";
$token =  md5($_POST['username']);
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

  
  $queryLogin=mysqli_query($conn, "select * from users where username='$u' and password='".md5($p)."'");
  
  if(mysqli_num_rows($queryLogin) == 0)
  {
    $_SESSION['error'] = "Username or password is not correct, please try again";
  }
  else
  {
    
    
    

    // $row = mysqli_fetch_array($qr);
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['loginStatus'] = "done";

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
    $updateToken = mysqli_query($conn,"update users set token='$token' where username='$u'");

    // $insertToken = mysqli_query($conn,"insert into product(username, token) values ('".$_POST['username']."', '$token')");

    // var_dump($_SESSION['username']);;
  }
 }
}



?>