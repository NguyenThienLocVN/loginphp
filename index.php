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
        <?php if(isset($_SESSION['username'])){ echo "<p class='welcome'>Welcome, <b>".$_SESSION['username']."</b></p><br>"; } ?> 
        <?php if(isset($_COOKIE['remember_name']) && !isset($_SESSION['username'])) { echo "<p class='welcome'>Welcome, <b>".$_COOKIE['remember_name']."</b></p><br>"; } ?> 
        <?php if(isset($_COOKIE['remember_name']) || isset($_SESSION['username'])) {?>
            <a href='logout.php' class="button-action">Logout</a>
        <?php } else if ($_COOKIE['remember_name'] = "" || empty($_SESSION['username'])) { ?>
            <a href='login.php' class="button-action">Login</a>
            <a href="reg.php" class="button-action">Register</a>
        <?php } ?> 
        
        </div>
        <footer>

        </footer>
    </div>
</body>
</html>