<?php

    // Code inspired by Dani Krossings' php tutorial on php, databases, and starting a login system
    // https://www.youtube.com/watch?v=gCo6JqGMi30&ab_channel=DaniKrossing

    function pwdMatch($pwd, $pwd_confirm){
        $result;
        if($pwd !== $pwd_confirm){
            $result = true;
        }
        else{
            $result = false;
        }

        return $result;
    }

    function checkPwd($conn, $pwd, $name, $acc){
        if($acc === "Customer"){
            $sql = "SELECT * FROM users WHERE user_uid = ?;";
        }
        else if($acc === "Subcontractor"){
            $sql = "SELECT * FROM employees WHERE emp_uid = ?;";
        }
        else if($acc === "Admin"){
            $sql = "SELECT * FROM admin WHERE adm_uid = ?;";
        }
        else{
            header("Location: ../change_pwd.php?register=stmtFailed");
            exit();
        }

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../change_pwd.php?register=stmtFailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if($acc === "Customer"){
            $pwdHash = $user["user_pwd"];
        }
        else if($acc === "Subcontractor"){
            $pwdHash = $user["emp_pwd"];
        }
        else if($acc === "Admin"){
            $pwdHash = $user["adm_pwd"];
        }

        $passwordCheck = password_verify($pwd, $pwdHash);
                    
        if($passwordCheck === false){
            return false;
        }
        else{
            return true;
        }
    }

    function changePwd($conn, $pwd, $name, $acc){
        if($acc === "Customer"){
            $sql = "UPDATE users SET user_pwd = ? WHERE user_uid = ?;";
        }
        else if($acc === "Subcontractor"){
            $sql = "UPDATE employees SET emp_pwd = ? WHERE emp_uid = ?;";
        }
        else if($acc === "Admin"){
            $sql = "UPDATE admin SET adm_pwd = ? WHERE adm_uid = ?;";
        }
        else{
            header("Location: ../change_pwd.php?register=stmtFailed");
            exit();
        }

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../register.php?register=stmtFailed");
            exit();
        }

        $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ss", $pwdHash, $name);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: ../change_pwd.php?error=none");
        exit();
    }

    function checkName($conn, $name){
        $sql = "SELECT * FROM users WHERE user_uid = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../register.php?register=stmtFailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }

        mysqli_stmt_close($stmt);
    }

    function checkNameEmp($conn, $name){
        $sql = "SELECT * FROM employees WHERE emp_uid = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../register.php?register=stmtFailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }

        mysqli_stmt_close($stmt);
    }

    function checkNameAdmin($conn, $name){
        $sql = "SELECT * FROM admin WHERE adm_uid = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../register.php?register=stmtFailed");
            exit();
        }
        
        mysqli_stmt_bind_param($stmt, "s", $name);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($result)){
            return $row;
        }
        else{
            return false;
        }

        mysqli_stmt_close($stmt);
    }


    function registerUser($conn, $name, $pwd){
        $sql = "INSERT INTO users (user_uid, user_pwd) VALUES (?, ?)";
        
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../register.php?register=stmtFailed");
            exit();
        }

        $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
        
        mysqli_stmt_bind_param($stmt, "ss", $name, $pwdHash);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: ../register.php?error=none");
        exit();
    }

    function registerUserSub($conn, $name, $pwd){
        $sql = "INSERT INTO employees (emp_uid, emp_pwd) VALUES (?, ?)";
        
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../register.php?admin_create=stmtFailed");
            exit();
        }

        $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
        
        mysqli_stmt_bind_param($stmt, "ss", $name, $pwdHash);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: ../admin_create.php?error=none");
        exit();
    }

    function loginUser($conn, $name, $pwd){
        $user = checkName($conn, $name);

        if($user === false){
            $user = checkNameEmp($conn, $name);

            if($user === false){
                $user = checkNameAdmin($conn, $name);

                if($user === false){
                    header("Location: ../login.php?error=wronglogin");
                    exit();
                }
                else{
                    $pwdHash = $user["adm_pwd"];

                    $passwordCheck = password_verify($pwd, $pwdHash);
                    
                    if($passwordCheck === false){
                        header("Location: ../login.php?error=wronglogin");
                    }
                    else{
                        session_start();
                        $_SESSION["userid"] = $user["id"];
                        $_SESSION["username"] = $user["adm_uid"];
                        $_SESSION["account"] = "Admin";
            
                        header("Location: ../index.php");
                        exit();
                    }
                }
            }
            else{
                $pwdHash = $user["emp_pwd"];

                $passwordCheck = password_verify($pwd, $pwdHash);
                
                if($passwordCheck === false){
                    header("Location: ../login.php?error=wronglogin");
                }
                else{
                    session_start();
                    $_SESSION["userid"] = $user["id"];
                    $_SESSION["username"] = $user["emp_uid"];
                    $_SESSION["account"] = "Subcontractor";
        
                    header("Location: ../index.php");
                    exit();
                }
            }
        }
        else{
            $pwdHash = $user["user_pwd"];

            $passwordCheck = password_verify($pwd, $pwdHash);

            if($passwordCheck === false){
                header("Location: ../login.php?error=wronglogin");
            }
            else{
                
                session_start();
                $_SESSION["userid"] = $user["id"];
                $_SESSION["username"] = $user["user_uid"];
                $_SESSION["account"] = "Customer";
    
                header("Location: ../index.php");
                exit();
            }

        }
    }
?>
