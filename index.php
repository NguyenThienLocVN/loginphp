<?php session_start();

    include('config/db.php');
    $t = $_COOKIE['token'];
    $qr = mysqli_query($conn, "select * from users where token='$t'") or die('loi truy van');
    $rs = mysqli_fetch_array($qr);

    // var_dump($_SESSION['loginStatus']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Please login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="wrapper">
        <header>
            
        </header>
        <div class="content">
            <?php if($_SESSION['loginStatus'] == "done") {
                echo 'Welcome, <b>'.$_SESSION['username'].'</b>';
                echo '<a href="logout.php" class="button-action">Logout</a>';
                echo '<a href="home.php" class="button-action">Home</a>';
            } else if(isset($_COOKIE['remember_name']) ) {
               echo "You are login as <b>".$_COOKIE['remember_name']."</b>.";
               echo "Click <a href='home.php'>Continue</a> to comfirm.";
            } else if( is_null($_COOKIE['remember_name']) || is_null($_COOKIE['remember_name']) ) { 
                echo '<a href="login.php" class="button-action">Login</a>';
                echo '<a href="reg.php" class="button-action">Register</a>';
            }
            ?>


            <?php /* var_dump($rs['token']) */ ?>
        </div>
        <footer>

        </footer>
    </div>
</body>
</html>