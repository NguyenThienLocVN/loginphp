<?php session_start();
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
            <?php if($_SESSION['loginStatus'] == 1) {?>
                <?php echo 'Welcome, <b>'.$_SESSION['username'].'</b>'; ?>
                <a href="logout.php" class="button-action">Logout</a>
                <a href="reg.php" class="button-action">Register</a>
            <?php } else if(isset($_COOKIE['token'])) { ?>
               <?php echo 'You are login as <b>'.$_COOKIE['remember_name']. '</b>. Click <a href="home.php">Continue</a> to comfirm' ?>
            <?php } else { ?>
                <a href="login.php" class="button-action">Login</a>
                <a href="reg.php" class="button-action">Register</a>
            <?php } ?>


            <?php /* var_dump(isset($_COOKIE['token'])) */ ?>
        </div>
        <footer>

        </footer>
    </div>
</body>
</html>