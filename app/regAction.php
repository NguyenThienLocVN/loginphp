<?php
    session_start();




    $registerName = $_POST['reg_user'];
    $registerPass = $_POST['reg_pass'];
    $registerPass2 = $_POST['reg_pass_2'];
    $registerPhone = $_POST['reg_phone'];


    foreach($_POST as $key=>$value) {
        if(empty($_POST[$key])) {
        $_SESSION['error'] = "All fields are required";
        break;
        }
    }
    if($registerPass != $registerPass2){ 
        $_SESSION['error'] = 'Passwords should be same<br>'; 
    }



    include('config/db.php');
    $qr=mysqli_query($conn, "select * from users where username='".$registerName."'") or die ("Loi truy van");

    $user = mysqli_fetch_assoc($qr);


    if($user)
    {
        if($registerName == $user['username'])
        {
            $_SESSION['error'] = "Username already exists";
        }
        if($user['phone'] === $registerPhone)
        {
            $_SESSION['error'] = "Phone already exists";
        }
    }
    
    else if(isset($_POST['register']) || empty($_SESSION['error']) )
    {
        include('config/db.php');
        $query=mysqli_query($conn, "insert into users (username,password,phone) values ('".$registerName."','".$registerPass."','".$registerPhone."')");
        
    $_SESSION['error'] = 'Register success';

    }
    
?>