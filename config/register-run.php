<?php
    if(isset($_POST['submit'])){
        $name = $_POST['username'];
        $pwd = $_POST['password'];
        $pwd_confirm = $_POST['passwordconfirm'];

        require_once 'db_connect.php';
        require_once 'func.php';

        if(pwdMatch($pwd, $pwd_confirm) !== false){
            header("Location: ../register.php?error=pwdMatch");
            exit();
        }
        if(strlen($pwd) < 8){
            header("Location: ../register.php?error=shortPassword");
            exit();
        }
        if(!preg_match('/[A-Z]/', $pwd)){
            header("Location: ../register.php?error=noUpper");
            exit();
        }
        if(!preg_match('/[a-z]/', $pwd)){
            header("Location: ../register.php?error=noLower");
            exit();
        }
        if(!preg_match('/[0-9]/', $pwd)){
            header("Location: ../register.php?error=noDigit");
            exit();
        }
        if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pwd)){
            header("Location: ../register.php?error=noSpecChar");
            exit();
        }
        if(checkName($conn, $name) !== false){
            header("Location: ../register.php?error=nameTaken");
            exit();
        }
        if(checkNameEmp($conn, $name) !== false){
            header("Location: ../register.php?error=nameTaken");
            exit();
        }
        if(checkNameAdmin($conn, $name) !== false){
            header("Location: ../register.php?error=nameTaken");
            exit();
        }

        registerUser($conn, $name, $pwd);
    }
    else{
        header("Location: ../register.php");
        exit();
    }
?>
