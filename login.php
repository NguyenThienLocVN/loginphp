<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Please login</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <a href="index.php" class="back">Back</a>
        </header>
        <div class="content">
            <h1 style="margin:0;padding: 20px;">PLEASE LOGIN FORM BELOW</h1>
            <?php include 'app/loginAction.php'; ?>
            <form action='' method='post'>
                <input type='text' name='username' class="username"  placeholder="Username" value="<?php if(isset($_COOKIE['remember_name'])){ echo $_COOKIE['remember_name']; }  ?>" /><br />
                <input type='password' name='password' class="password" placeholder="Password" value="<?php if(isset($_COOKIE['remember_pass'])){ echo $_COOKIE['remember_pass']; } ?>" /><br />
                <input type="checkbox" name="remember" class="remember" <?php if(isset($_COOKIE["remember"])) { ?> checked <?php } ?> > Remember me <br>
                <input type="submit" class="btn-login" name='ok' value='Log In' />
                
                <p style="color:red;"> <?php echo $_SESSION['error'] ?> </p>
            </form>
            <?php 
            // if(isset($_POST['ok'])){
            //     $db = new MyDB();
            //     $db->login();
            //     }
                ?>
        </div>
        <footer>
            user: admin | pass:adminpass
        </footer>
    </div>
</body>
</html>