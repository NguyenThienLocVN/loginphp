<?php
    session_start();


    if(isset($_POST['register']))
    {

    $registerName = $_POST['reg_user'];
    $registerPass = $_POST['reg_pass'];
    $registerPass2 = $_POST['reg_pass_2'];
    $registerPhone = $_POST['reg_phone'];


    if(empty($registerName) || empty($registerPass) || empty($registerPass2) || empty($registerPhone))
    {
        $_SESSION['error'] = 'All fields are required'; 
    }

    if($registerPass != $registerPass2){ 
        $_SESSION['error'] = 'Passwords should be same<br>'; 
    }



    include('config/db.php');
    $qr=mysqli_query($conn, "select * from users where username='".$registerName."'") or die ("Loi truy van");

    $user = mysqli_fetch_assoc($qr);


    if($user)
    {
        if($user['username'] == $registerName )
        {
            $_SESSION['error'] = "Username already exists";
        }
        if($user['phone'] === $registerPhone)
        {
            $_SESSION['error'] = "Phone already exists";
        }
    }
    

    else if(!isset($_SESSION['error']))
    {
        include('config/db.php');
        $query=mysqli_query($conn, "insert into users (username,password,phone) values ('".$registerName."','".$registerPass."','".$registerPhone."')");

        $_SESSION['error'] = "Register success";
    }

}
?>