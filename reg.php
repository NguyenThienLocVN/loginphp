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
            <h1>REGISTER</h1>
            <?php include 'app/regAction.php'; ?>
            <form action='' method='post'>
                <input type="text" name="reg_user" placeholder="Username" class="input-form">
                <input type="password" name="reg_pass" placeholder="Password" class="input-form">
                <input type="password" name="reg_pass_2" placeholder="Retype Password" class="input-form">
                <input type="number" name="reg_phone" placeholder="Phone" class="input-form">
                <input type="submit" class="btn-login" name='register' value='Register' />
                
                <?php /* echo "<pre>"; var_dump($query) */ ?>
                
            </form>
            <p style="color:red;"> <?php echo $_SESSION['error']; ?> </p>
        </div>
        <footer>

        </footer>
    </div>
</body>
</html>