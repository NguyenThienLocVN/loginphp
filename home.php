<?php echo "This is home page"; ?>

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
            <?php if(!isset($_SESSION['username'])){ ?>
                <h1>You must login to see data</h1>
                <a href="login.php" class="button-action">Login</a>
            <?php } else { ?>
                Data
            <?php } ?>
        </div>
        <footer>

        </footer>
    </div>
</body>
</html>