<?php

?>

<!DOCTYPE html>
<html>
    <?php include('templates/header.php'); ?>
    <?php
        if(!isset($_SESSION["username"])){
            if(isset($_SERVER['HTTP_REFERER'])){
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            else{
                header("Location: index.php");
                exit();
            }
        }
    ?>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <style type="text/css">
            ul {
                text-align: center;
                font-size: 2vh;
                padding-bottom: 50vh;
            }
        </style>
    </head>
    <body>
    <header id="main-header">
        <div class="container">
            <h1>Profile</h1>
        </div>
    </header>
    <div class="container">
       <ul>
            <?php
                echo "<h2>Hello, {$_SESSION['username']}</h2>";
                echo "<li>Account Type: {$_SESSION['account']}</li>";
                echo "<li><a href='change_pwd.php'>Change Password</a></li>";
            ?>

      </ul>
    </div>
    </body>

    <?php include('templates/footer.php'); ?>

</html>