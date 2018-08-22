<?php session_start();
if(isset($_POST['ok']))
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

  include('config/db.php');
  $qr=mysqli_query($conn, "select * from users where username='".$u."' and password='".$p."'") or die ("Loi truy van");
  
  if(mysqli_num_rows($qr) == 0)
  {
    $_SESSION['error'] = "Username or password is not correct, please try again";
  }
  else
  {
    $_SESSION['loginStatus'] = 1;

    $row = mysqli_fetch_array($qr);
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    if(isset($_POST['remember']))
    { 
      setcookie("remember", $_SESSION['remember'], time()+(86400));
      setcookie("remember_name", $_POST['username'], time()+(86400));
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
  }
 }
}
?>