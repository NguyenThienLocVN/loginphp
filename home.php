<?php echo "This is home page"; ?>

<?php session_start();
    include('config/db.php');
    
    $_SESSION['loginStatus'] = "done";
    $u = $_SESSION['username'];
    $t = $_COOKIE['token'];
    $qr = mysqli_query($conn, "select * from users where token='$t'") or die('loi truy van');
    $rs = mysqli_fetch_assoc($qr);

    $que = mysqli_query($conn, "select * from users where username='$u'") or die('loi truy van');
    $res = mysqli_fetch_array($que);

    // var_dump($_SESSION['username']);
    // var_dump($_COOKIE['remember_name']);
    // var_dump($res['username']);
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

        <?php 
            if(isset($_SESSION['username']) && $_SESSION['loginStatus'] == "done") { 
                if($_SESSION['username'] == $res['username']){
                    echo "Data of ". $_SESSION['username'];
                }
            }
            else if ( empty($_SESSION['username']) && isset($_COOKIE['remember_name'])){
                if( ($_COOKIE['remember_name'] != $rs['username']) || ($_COOKIE['token'] != $rs['token']) || is_null($_COOKIE['remember_name']) || is_null($_COOKIE['token']) ){
                    echo "Not found";
                }
                else
                {
                    echo "data of ". $_COOKIE['remember_name'];
                }
            }
            else if(empty($_SESSION['username']) ){
                echo "Cannot authenticate user, please login again";
                echo '<a href="login.php" class="button-action">Login</a>';
            }

        ?>

        </div>
        <footer>
        </footer>
    </div>
</body>
</html>

<!-- ($_COOKIE['token'] != $rs['token']) || is_null($_COOKIE['token']) || is_null($_COOKIE['remember_name'])  -->