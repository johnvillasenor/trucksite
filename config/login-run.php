<?php
    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $pwd = $_POST["password"];

        require_once 'db_connect.php';
        require_once 'func.php';

        loginUser($conn, $username, $pwd);
    }
    else{
        header("Location: ../login.php?error=didntwork");
        exit();
    }
?>