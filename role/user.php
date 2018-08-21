
<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Please login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="wrapper">
        <header>
        <?php 
            session_start();

            echo "<p class='welcome'>Welcome, <b>".$_SESSION['user']."</b></p>";
        ?>
        <a href="../logout.php" class="logout">Logout</a>
        </header>
        <div class="content">
        
        </div>
        <footer>

        </footer>
    </div>
</body>
</html>