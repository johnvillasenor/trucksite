<?php
    if(isset($_POST['submit'])){
        $oldpwd = $_POST['oldpassword'];
        $newpwd = $_POST['newpassword'];
        $pwd_confirm = $_POST['newpasswordconfirm'];
        $name = $_POST['username'];
        $acc = $_POST['account'];

        require_once 'db_connect.php';
        require_once 'func.php';
    
        if(checkPwd($conn, $oldpwd, $name, $acc) === false){
            header("Location: ../change_pwd.php?error=wrongOldPwd");
            exit();
        }
        if(pwdMatch($newpwd, $pwd_confirm) !== false){
            header("Location: ../change_pwd.php?error=pwdMatch");
            exit();
        }
        if(strlen($newpwd) < 8){
            header("Location: ../change_pwd.php?error=shortPassword");
            exit();
        }
        if(!preg_match('/[A-Z]/', $newpwd)){
            header("Location: ../change_pwd.php?error=noUpper");
            exit();
        }
        if(!preg_match('/[a-z]/', $newpwd)){
            header("Location: ../change_pwd.php?error=noLower");
            exit();
        }
        if(!preg_match('/[0-9]/', $newpwd)){
            header("Location: ../change_pwd.php?error=noDigit");
            exit();
        }

        changePwd($conn, $newpwd, $name, $acc);
    }
    else{
        header("Location: ../admin_create.php");
        exit();
    } 
?>