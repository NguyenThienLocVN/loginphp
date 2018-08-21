<?php session_start();
    $conn=mysqli_connect("localhost","root","123456","test") or die("can't connect this database");
    // class MyDB{
    //     public $conn;
    //     public function __construct(){
    //         $this->conn = mysqli_connect("localhost","root","123456","test");
    //     }
    //     public function login(){
    //         $u = $_POST['username'];
    //         $p = $_POST['password'];
    //         $qr = "select * from users where username='$u' and password='$p'";
    //         $rs = mysqli_query($this->conn, $qr) or die('Tai khoan hoac mat khau khong dung');
    //         $_SESSION['login'] = 1;
    //         $_SESSION['user'] = "$u";
    //         $_SESSION['pass'] = "$p";
    //         $_SESSION['error'] = "";
    //         if(empty($u) || empty($p)  )
    //         {
    //             $_SESSION['error'] = "Please input";
    //         }
    //         else
    //         {
    //             if(isset($_SESSION['login'])){
    //                 if($_SESSION['user'] == 'admin' && $_SESSION['pass'] == 'adminpass'){
    //                     header('location: admin.php');
    //                     echo "<script lang='javascript'>alert('Dang nhap thanh cong');</script>";
    //                 } else if($_SESSION['user'] == 'user1' && $_SESSION['pass'] == 'user1pass'){
    //                     header('location: user.php');
    //                     echo "<script lang='javascript'>alert('Dang nhap thanh cong');</script>";
    //                 }
    //                 else {
    //                     echo "Dang nhap that bai";
    //                 }
    //             }
    //         }
            
    //     }
    // }
?>