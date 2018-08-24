<?php
    session_start();

    $errors = array();

    include('config/db.php');

    if(isset($_POST['register']))
    {
        $registerName = $_POST['reg_user'];
        $registerPass = $_POST['reg_pass'];
        $registerPass2 = $_POST['reg_pass_2'];
        $registerPhone = $_POST['reg_phone'];

        if (empty($registerName) || empty($registerPass) || empty($registerPass2) ||  empty($registerPhone)) {
             array_push($errors, "All fields are required"); 
        }
        if ($registerPass != $registerPass2) {
            array_push($errors, "The two passwords do not match");
        }

        $result = mysqli_query($conn, "select * from users WHERE username='".$registerName."' ");
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            if ($user['username'] === $registerName) {
                array_push($errors, "Username already exists");
            }
        
            if ($user['phone'] === $registerPhone) {
                array_push($errors, "Phone already exists");
            }
        }

        if (count($errors) == 0) {
            $password = md5($registerPass);
      
            $query = "insert into users (username, password, phone) 
                      values ('".$registerName."', '".$password."', '".$registerPhone."')";
            mysqli_query($conn, $query);
            $_SESSION['username'] = $registerName;
            $_SESSION['success'] = "Success";

            var_dump($query);
        }
    }









//     if(isset($_POST['register']))
//     {

//     $registerName = $_POST['reg_user'];
//     $registerPass = $_POST['reg_pass'];
//     $registerPass2 = $_POST['reg_pass_2'];
//     $registerPhone = $_POST['reg_phone'];


//     if(empty($registerName) || empty($registerPass) || empty($registerPass2) || empty($registerPhone))
//     {
//         $_SESSION['error'] = 'All fields are required'; 
//     }

//     else if($registerPass != $registerPass2){ 
//         $_SESSION['error'] = 'Passwords should be same<br>'; 
//     }



//     include('config/db.php');
//     $qr=mysqli_query($conn, "select * from users where username='".$registerName."'") or die ("Loi truy van");

//     $user = mysqli_fetch_assoc($qr);



//     if($user)
//     {
//         if($user['username'] == $registerName )
//         {
//             $_SESSION['error'] = "Username already exists";
//         }
//         if($user['phone'] === $registerPhone)
//         {
//             $_SESSION['error'] = "Phone already exists";
//         }
//     }


//     else
//     {
//         $registerEncryptPass = md5($_POST['password']);

//         include('config/db.php');
//         $query=mysqli_query($conn, "insert into users (username,password,phone) values ('".$registerName."','".$registerEncryptPass."','".$registerPhone."')");

//         $_SESSION['error'] = "Register success";
//     }

// }
?>