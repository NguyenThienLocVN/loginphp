<?php session_start();
if(isset($_POST['ok']))
{
  $u = $_POST['username'];
  $p = $_POST['password'];
  $_SESSION['error'] = "";
 if($u == '' || $p == '')
 {
  $_SESSION['error'] = "Please enter username or password<br>";
 }

 if($u && $p)
 {
  include('config/db.php');
  $qr=mysqli_query($conn, "select * from users where username='".$u."' and password='".$p."'") or die ("Loi truy van");
  

  if(isset($_POST['remember']))
  {
    setcookie("member_name", $u, time()+(3600));
    setcookie("member_pass", $p, time()+(3600));
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
  
  if(mysqli_num_rows($qr) == 0)
  {
    $_SESSION['error'] = "Username or password is not correct, please try again";
  }
  else
  {
    $_SESSION['login'] = 1;
    $_SESSION['user'] = $u;
    if($_SESSION['user'] == 'admin')
    {
      header('location:role/admin.php');
    }
    if($_SESSION['user'] == 'user')
    {
      header('location:role/user.php');
    }
  }
 }
}
?>