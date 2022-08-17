<?php
    if(isset($_POST['submit'])){
        $name = $_POST['username'];
        $pwd = $_POST['password'];
        $pwd_confirm = $_POST['passwordconfirm'];
    
        require_once 'db_connect.php';
        require_once 'func.php';
    //checks for admin
        if(pwdMatch($pwd, $pwd_confirm) !== false){
            header("Location: ../admin_create.php?error=pwdMatch");
            exit();
        }
        if(checkName($conn, $name) !== false){
            header("Location: ../admin_create.php?error=nameTaken");
            exit();
        }
        if(checkNameEmp($conn, $name) !== false){
            header("Location: ../admin_create.php?error=nameTaken");
            exit();
        }
        if(checkNameAdmin($conn, $name) !== false){
            header("Location: ../admin_create.php?error=nameTaken");
            exit();
        }

        registerUserSub($conn, $name, $pwd);
    }
    else{
        header("Location: ../admin_create.php");
        exit();
    } 
?>
